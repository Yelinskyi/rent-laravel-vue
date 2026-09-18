<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @routes
    @vite('resources/js/app.js')
    <x-inertia::head/>
</head>

<body class="bd-white dark:bg-gray-900 text-gray-800 dark:text-gray-300">
<x-inertia::app/>
</body>
</html>
