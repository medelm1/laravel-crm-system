@extends('layouts/app')

@section('content')

<x-breadcrumb :items="[
    ['label' => 'Tâches', 'url' => route('tasks.index')],
    ['label' => 'Détails', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">
    <div class="max-w-sm">
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $task->title }}" disabled />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" class="form-control" placeholder="Description" disabled >{{ $task->description }}</textarea>
        </div>
        <div class="mb-5">
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Utilisateur</label>
            <select id="user_id" name="user_id" class="form-control" disabled>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statut</label>
            <select id="status" name="status" class="form-control" disabled>
                <option value="to_do" {{ $task->status == 'to_do' ? 'selected' : '' }}>À faire</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>
        <div class="flex">
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier la tache</a>
        </div>
    </div>
</div>
@endsection
