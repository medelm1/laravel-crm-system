@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[ 
    ['label' => 'Interactions', 'url' => route('interactions.index')], 
    ['label' => 'Modifier', 'url' => null] 
]" />

<div class="bg-white border border-gray-200 rounded-md p-4">
    <form action="{{ route('interactions.update', ['id' => $interaction->id]) }}" method="POST" class="max-w-sm">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select id="type" name="type" class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}">
                <option value="">Sélectionnez un type</option>
                <option value="call" {{ $interaction->type == 'call' ? 'selected' : '' }}>Appel</option>
                <option value="email" {{ $interaction->type == 'email' ? 'selected' : '' }}>Email</option>
                <option value="meeting" {{ $interaction->type == 'meeting' ? 'selected' : '' }}>Réunion</option>
            </select>
            @error('type')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Détails</label>
            <textarea id="details" name="details" class="form-control {{$errors->has('details') ? 'is-invalid' : ''}}" placeholder="Détails de l'interaction">{{ $interaction->details }}</textarea>
            @error('details')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="contact_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
            <select id="contact_id" name="contact_id" class="form-control {{$errors->has('contact_id') ? 'is-invalid' : ''}}">
                <option value="">Sélectionnez un contact</option>
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}" {{ $interaction->contact_id == $contact->id ? 'selected' : '' }}>
                        {{ $contact->name }}
                    </option>
                @endforeach
            </select>
            @error('contact_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisateur</label>
            <select id="user_id" name="user_id" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}">
                <option value="">Sélectionnez un utilisateur</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $interaction->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="interaction_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de l'interaction</label>
            <input type="date" id="interaction_date" name="interaction_date" class="form-control {{$errors->has('interaction_date') ? 'is-invalid' : ''}}" value="{{ \Carbon\Carbon::parse($interaction->interaction_date)->format('d/m/Y') }}" />
            @error('interaction_date')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="flex">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer les modifications</button>
        </div>
    </form>
</div>
@endsection
