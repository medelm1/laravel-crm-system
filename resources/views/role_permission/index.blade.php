@extends('layouts.app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Rôles & permissions', 'url' => route('role_permission.index')],
    ['label' => 'Gestion', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <form action="{{ route('role_permission.index') }}" method="GET" class="mb-3 max-w-sm">
        @csrf
        <div class="form-group">
            <label for="roles">Rôles</label>
            <select name="role" id="roles" class="form-control" onchange="this.form.submit()">
                <option value="">Sélectionnez un rôle</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ request()->role == $role->id ? 'selected' : '' }}>{{ $role->label }}</option>
                @endforeach
            </select>
        </div>
    </form>

    @if($selectedRole)
    <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 max-w-sm" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Attention</span>
        <div>
            <span class="font-medium">Attention</span>
            <p class="mt-1.5">Veuillez vérifier les permissions à attribuer au rôle, puis cliquez sur <span class="font-medium">"Soumettre"</span> pour enregistrer les modifications.</p>
        </div>
    </div>
    <form action="{{ route('role_permission.update', $selectedRole) }}" method="POST" class="max-w-sm">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            @foreach($permissions as $permission)
                <div class="flex items-center mb-4">
                    <input id="permission_{{ $permission->id }}" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $selectedRole->permissions->contains($permission->id) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="permission_{{ $permission->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->label }}</label>
                </div>
            @endforeach
        </div>
        <div class="flex">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Soumettre</button>
        </div> 
    </form>
    @endif
</div>
@endsection
