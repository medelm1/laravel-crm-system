@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[ 
    ['label' => 'Interactions', 'url' => route('interactions.index')], 
    ['label' => 'Modifier', 'url' => null] 
]" />

<div class="bg-white border border-gray-200 rounded-md p-4">
    <div class="max-w-sm">
        <div class="mb-5">
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="type" name="type" class="form-control" disabled>
                <option value="call" {{ $interaction->type == 'call' ? 'selected' : '' }}>Appel</option>
                <option value="email" {{ $interaction->type == 'email' ? 'selected' : '' }}>Email</option>
                <option value="meeting" {{ $interaction->type == 'meeting' ? 'selected' : '' }}>Réunion</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Détails</label>
            <textarea id="details" name="details" class="form-control" placeholder="Détails de l'interaction" disabled>{{ $interaction->details }}</textarea>
        </div>
        <div class="mb-5">
            <label for="contact_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
            <select id="contact_id" name="contact_id" class="form-control" disabled>
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}" {{ $interaction->contact_id == $contact->id ? 'selected' : '' }}>
                        {{ $contact->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisateur</label>
            <select id="user_id" name="user_id" class="form-control" disabled>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $interaction->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="interaction_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de l'interaction</label>
            <input type="date" id="interaction_date" name="interaction_date" class="form-control" value="{{ \Carbon\Carbon::parse($interaction->interaction_date)->format('d/m/Y') }}" disabled />
        </div>
        <div class="flex">
            <a href="{{ route('interactions.edit', ['id' => $interaction->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier l'interaction</a>
        </div>
    </div>
</div>
@endsection
