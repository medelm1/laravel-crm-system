@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Contacts', 'url' => route('contacts.index')],
    ['label' => 'Modifier', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <form action="{{ route('contacts.update', ['id' => $contact->id]) }}" method="POST" class="max-w-sm">
    	@csrf
        @method('PUT')
    	<div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" id="name" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ $contact->name }}" />
        	@error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{ $contact->email }}" />
        	@error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
            <input type="text" id="phone" name="phone" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" value="{{ $contact->phone }}" />
            @error('phone')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse</label>
            <input type="text" id="address" name="address" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" value="{{ $contact->address }}" />
            @error('address')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entreprise</label>
            <input type="text" id="company" name="company" class="form-control {{$errors->has('company') ? 'is-invalid' : ''}}" value="{{ $contact->company }}" />
            @error('company')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="flex">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer les modifications</button>
        </div>
    </form>
</div>
@endsection
