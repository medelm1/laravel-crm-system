@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Contacts', 'url' => route('contacts.index')],
    ['label' => 'Détails', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <div class="max-w-sm">
    	<div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $contact->name }}" disabled />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $contact->email }}" disabled />
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}" disabled />
        </div>
        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address }}" disabled />
        </div>
        <div class="mb-5">
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entreprise</label>
            <input type="text" id="company" name="company" class="form-control" value="{{ $contact->company }}" disabled />
        </div>
        <div class="flex">
            <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier le contact</a>
        </div>
    </div>
</div>
@endsection
