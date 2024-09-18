@extends('layouts/app')
@section('content')

<x-breadcrumb :items="[
    ['label' => 'Utilisateurs', 'url' => route('users.index')],
    ['label' => 'Liste', 'url' => route('users.index')],
    ['label' => 'Archivés', 'url' => null]
]" />

<div class="bg-white border border-gray-200 rounded rounded-md p-4">

	@include('components/user-navbar')

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nom de l'utilisateur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Adresse e-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rôle
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivedUsers as $user)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        Admin
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <form action="{{ route('users.restore', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Restaurer</button type="submit">
                        </form>
                        <form action="{{ route('users.forceDelete', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer définitivement</button type="submit">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
