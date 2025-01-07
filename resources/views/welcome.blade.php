<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Flight booking system') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

<div class="min-h-screen flex flex-col items-center justify-center">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"/>
    </div>

    <!-- Page Heading -->
    <header class="text-center mb-6">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Welcome to Flight Booking System</h1>
    </header>

    <!-- Buttons -->
    <div class="space-x-4 flex">
        <a href="{{ route('login') }}"
           class="w-48 px-6 py-3 bg-gray-800 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-center">
            Login
        </a>
        <a href="{{ route('register') }}"
           class="w-48 px-6 py-3 bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 transition duration-300 text-center">
            Register
        </a>
    </div>
</div>

</body>
</html>
