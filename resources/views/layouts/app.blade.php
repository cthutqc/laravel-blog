<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! Meta::toHtml() !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-100">
    <header>

    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>

    </footer>
</body>
</html>
