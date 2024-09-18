@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Tâches', 'url' => route('tasks.index')],
    ['label' => 'Modifier', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST" class="max-w-sm">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input type="text" id="title" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{ $task->title }}" placeholder="Titre de la tâche" />
            @error('title')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Description">{{ $task->description }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisateur</label>
            <select id="user_id" name="user_id" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}">
                <option value="">Sélectionnez un utilisateur</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut</label>
            <select id="status" name="status" class="form-control {{$errors->has('status') ? 'is-invalid' : ''}}">
                <option value="to_do" {{ $task->status == 'to_do' ? 'selected' : '' }}>À faire</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Terminée</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="flex">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer les modifications</button>
        </div>
    </form>
</div>
@endsection
