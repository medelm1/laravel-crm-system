@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Utilisateurs', 'url' => route('users.index')],
    ['label' => 'Ajouter', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <form action="{{ route('users.store') }}" method="POST" class="max-w-sm">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" id="name" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ old('name') }}" placeholder="John Doe" />
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{ old('email') }}" placeholder="nom@exemple.com" />
            @error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="••••••••" />
            @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rôles</label>
            <select id="roles" name="roles[]" class="form-control {{$errors->has('roles') ? 'is-invalid' : ''}}" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->label }}</option>
                @endforeach
            </select>
            @error('roles')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="flex">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Créer l'utilisateur</button>
        </div>
    </form>
</div>
@endsection
