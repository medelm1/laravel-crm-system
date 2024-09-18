<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InteractionController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');
        if ($searchTerm) {
            $interactions = Interaction::where('type', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('details', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('interaction_date', 'LIKE', "%{$searchTerm}%")
                            ->get();
        } else {
            $interactions = Interaction::all();
        }
        return view('interactions.index', compact('interactions'));
    }

    public function archivedInteractions()
    {
        $archivedInteractions = Interaction::onlyTrashed()->get();
        return view('interactions.archived', compact('archivedInteractions'));
    }

    public function create()
    {
        $contacts = Contact::all();
        $users = User::all();
        return view('interactions.create', compact('contacts', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_id' => 'required|exists:contacts,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:255',
            'details' => 'nullable|string',
            'interaction_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Interaction::create([
            'contact_id' => $request->contact_id,
            'user_id' => $request->user_id,
            'type' => $request->type,
            'details' => $request->details,
            'interaction_date' => $request->interaction_date,
        ]);

        return redirect()->route('interactions.index')->with('success', 'Interaction créée avec succès');
    }

    public function show($id)
    {
        $interaction = Interaction::findOrFail($id);
        $contacts = Contact::all();
        $users = User::all();
        return view('interactions.details', compact('interaction', 'contacts', 'users'));
    }

    public function edit($id)
    {
        $interaction = Interaction::findOrFail($id);
        $contacts = Contact::all();
        $users = User::all();
        return view('interactions.edit', compact('interaction', 'contacts', 'users'));
    }

    public function update(Request $request, $id)
    {
        $interaction = Interaction::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'contact_id' => 'required|exists:contacts,id',
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:255',
            'details' => 'nullable|string',
            'interaction_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $interaction->update([
            'contact_id' => $request->contact_id,
            'user_id' => $request->user_id,
            'type' => $request->type,
            'details' => $request->details,
            'interaction_date' => $request->interaction_date,
        ]);

        return redirect()->route('interactions.index')->with('success', 'Interaction mise à jour avec succès');
    }

    public function softDelete($id)
    {
        $interaction = Interaction::findOrFail($id);
        $interaction->delete();

        return redirect()->route('interactions.index')->with('success', 'Interaction supprimée avec succès');
    }

    public function forceDelete($id)
    {
        $interaction = Interaction::onlyTrashed()->findOrFail($id);
        $interaction->forceDelete();

        return redirect()->route('interactions.archived')->with('success', 'Interaction définitivement supprimée avec succès');
    }

    public function restore($id)
    {
        $interaction = Interaction::onlyTrashed()->findOrFail($id);
        $interaction->restore();

        return redirect()->route('interactions.archived')->with('success', 'Interaction restaurée avec succès');
    }
}
