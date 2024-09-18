@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Utilisateurs', 'url' => route('users.index')],
    ['label' => 'Modifier', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Information</span>
        <div>
            <span class="font-medium">Remarque :</span>
            <p class="mt-1.5">Vous pouvez laisser le champ du <span class="font-medium">mot de passe</span> vide si vous ne souhaitez pas mettre à jour le mot de passe en même temps que les autres informations de l'utilisateur.</p>
        </div>
    </div>
    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" class="max-w-sm">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <input type="text" id="name" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ $user->name }}" placeholder="John Doe" />
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{ $user->email }}" placeholder="nom@exemple.com" />
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
                    <option value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) selected @endif>{{ $role->label }}</option>
                @endforeach
            </select>
            @error('roles')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="flex">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer les modifications</button>
        </div>
    </form>
</div>
@endsection
