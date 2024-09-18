@extends('layouts.auth')
@section('content')
<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-xl dark:text-white">
    Inscrivez-vous à votre compte
</h1>
<form class="space-y-4 md:space-y-6" action="{{ route('register.post') }}" method="POST">
    @csrf
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre nom</label>
        <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ old('name') }}" placeholder="Votre nom" />
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
        <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{ old('email') }}" placeholder="nom@compagnie.com" />
        @error('email')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="••••••••" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" />
        @error('password')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmez le mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" />
        @error('password_confirmation')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">S'inscrire</button>
    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Vous avez déjà un compte ? <a href="{{ route('login.get') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Connectez-vous</a>
    </p>
</form>
@endsection
