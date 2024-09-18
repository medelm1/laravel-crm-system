<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/laravel-crm-favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Admin Layout</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        @include('components/navbar')
        @include('components/sidebar')
        <main class="p-4 md:ml-64 h-auto pt-20">
            @include('components/success-alert')
            @include('components/error-alert')
            @yield('content')
        </main>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
