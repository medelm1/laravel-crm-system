@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Opportunités', 'url' => route('opportunities.index')],
    ['label' => 'Détails', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <div class="max-w-sm">
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $opportunity->title }}" disabled />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" class="form-control" disabled >{{ $opportunity->description }}</textarea>
        </div>
        <div class="mb-5">
            <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valeur</label>
            <input type="number" step="0.01" id="value" name="value" class="form-control" value="{{ $opportunity->value }}"disabled />
        </div>
        <div class="mb-5">
            <label for="close_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de clôture</label>
            <input type="date" id="close_date" name="close_date" class="form-control" value="{{ $opportunity->close_date }}" disabled />
        </div>
        <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut</label>
            <select id="status" name="status" class="form-control" disabled >
                <option value="in_progress" {{ $opportunity->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                <option value="won" {{ $opportunity->status == 'won' ? 'selected' : '' }}>Gagnée</option>
                <option value="lost" {{ $opportunity->status == 'lost' ? 'selected' : '' }}>Perdue</option>
            </select>
        </div>
        <div class="flex">
            <a href="{{ route('opportunities.edit', ['id' => $opportunity->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier l'opportunité</a>
        </div>
    </div>
</div>
@endsection
