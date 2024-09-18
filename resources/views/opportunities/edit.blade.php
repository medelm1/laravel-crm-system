@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Opportunités', 'url' => route('opportunities.index')],
    ['label' => 'Modifier', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <form action="{{ route('opportunities.update', ['id' => $opportunity->id]) }}" method="POST" class="max-w-sm">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input type="text" id="title" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{ $opportunity->title }}" placeholder="Titre de l'opportunité" />
            @error('title')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Description">{{ $opportunity->description }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valeur</label>
            <input type="number" step="0.01" id="value" name="value" class="form-control {{$errors->has('value') ? 'is-invalid' : ''}}" value="{{ $opportunity->value }}" placeholder="Valeur de l'opportunité" />
            @error('value')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="close_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de clôture</label>
            <input type="date" id="close_date" name="close_date" class="form-control {{$errors->has('close_date') ? 'is-invalid' : ''}}" value="{{ $opportunity->close_date }}" />
            @error('close_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut</label>
            <select id="status" name="status" class="form-control {{$errors->has('status') ? 'is-invalid' : ''}}">
                <option value="in_progress" {{ $opportunity->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                <option value="won" {{ $opportunity->status == 'won' ? 'selected' : '' }}>Gagnée</option>
                <option value="lost" {{ $opportunity->status == 'lost' ? 'selected' : '' }}>Perdue</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer les modifications</button>
    </form>
</div>
@endsection
