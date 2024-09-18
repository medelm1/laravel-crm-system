@extends('layouts/app')
@section('content')

<x-breadcrumb :items="[
    ['label' => 'Utilisateurs', 'url' => route('users.index')],
    ['label' => 'Détails', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <div class="max-w-sm">
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" disabled />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{  $user->email }}" disabled />
        </div>
        <div class="flex">
        	<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier l'utilisateur</a>
        </div>
    </div>
</div>
@endsection
