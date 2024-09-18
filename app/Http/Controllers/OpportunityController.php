<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');
        if ($searchTerm) {
            $opportunities = Opportunity::where('title', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('status', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('value', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('close_date', 'LIKE', "%{$searchTerm}%")
                            ->get();
        } else {
            $opportunities = Opportunity::all();
        }
        return view('opportunities.index', compact('opportunities'));
    }

    public function archivedOpportunities()
    {
        $archivedOpportunities = Opportunity::onlyTrashed()->get();
        return view('opportunities.archived', compact('archivedOpportunities'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'nullable|numeric',
            'close_date' => 'required|date',
            'status' => 'required|in:in_progress,won,lost',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opportunity = Opportunity::create([
            'title' => $request->title,
            'description' => $request->description,
            'value' => $request->value,
            'close_date' => $request->close_date,
            'status' => $request->status,
        ]);

        return redirect()->route('opportunities.index')->with('success', 'Opportunity created successfully');
    }

    public function show($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.details', compact('opportunity'));
    }

    public function edit($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, $id)
    {
        $opportunity = Opportunity::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'nullable|numeric',
            'close_date' => 'required|date',
            'status' => 'required|in:in_progress,won,lost',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opportunity->update([
            'title' => $request->title,
            'description' => $request->description,
            'value' => $request->value,
            'close_date' => $request->close_date,
            'status' => $request->status,
        ]);

        return redirect()->route('opportunities.index')->with('success', 'Opportunity updated successfully');
    }

    public function softDelete($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();

        return redirect()->route('opportunities.index')->with('success', 'Opportunity deleted successfully');
    }

    public function forceDelete($id)
    {
        $opportunity = Opportunity::onlyTrashed()->findOrFail($id);
        $opportunity->forceDelete();

        return redirect()->route('opportunities.archived')->with('success', 'Opportunity permanently deleted successfully');
    }

    public function restore($id)
    {
        $opportunity = Opportunity::onlyTrashed()->findOrFail($id);
        $opportunity->restore();

        return redirect()->route('opportunities.archived')->with('success', 'Opportunity restored successfully');
    }
}
