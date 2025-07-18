<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilingual Form Website</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-blue-600 text-white p-4">
        @include('partials.language-toggle')
    </header>
    <main class="container mx-auto p-6">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center">
        <a href="{{ route('privacy') }}">{{ trans('forms.privacy') }}</a>
    </footer>
</body>
</html>