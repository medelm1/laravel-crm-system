<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');
        if ($searchTerm) {
            $contacts = Contact::where('name', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('phone', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('address', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('company', 'LIKE', "%{$searchTerm}%")
                            ->get();
        } else {
            $contacts = Contact::all();
        }
        return view('contacts.index', compact('contacts'));
    }

    public function archivedContacts()
    {
        $archivedContacts = Contact::onlyTrashed()->get();
        return view('contacts.archived', compact('archivedContacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:64',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:24',
            'address' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company' => $request->company,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.details', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:64',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:24',
            'address' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company' => $request->company,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact mis à jour avec succès.');
    }

    public function softDelete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès.');
    }

    public function forceDelete($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->forceDelete();

        return redirect()->route('contacts.archived')->with('success', 'Contact définitivement supprimé avec succès.');
    }

    public function restore($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();

        return redirect()->route('contacts.archived')->with('success', 'Contact restauré avec succès.');
    }

    public function interactions($id)
    {
        $contact = Contact::with('interactions')->findOrFail($id);
        return view('contacts.interactions', compact('contact'));
    }
}
