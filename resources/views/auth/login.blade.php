@extends('layouts.auth')
@section('content')
<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-xl dark:text-white">
    Connectez-vous à votre compte
</h1>
<form class="space-y-4 md:space-y-6" action="{{ route('login.post') }}" method="POST">
    @csrf
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
    <!--
    <div class="flex items-center justify-between">
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="text-gray-500 dark:text-gray-300">Se souvenir de moi</label>
            </div>
        </div>
        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Mot de passe oublié?</a>
    </div>
    -->
    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Se connecter</button>
    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Vous n'avez pas encore de compte ? <a href="{{ route('register.get') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Inscrivez-vous</a>
    </p>
</form>
@endsection
