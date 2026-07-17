<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BlastMail') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-10 bg-[radial-gradient(circle_at_18%_18%,_rgba(16,185,129,0.22),_transparent_28%),radial-gradient(circle_at_82%_8%,_rgba(37,99,235,0.22),_transparent_30%),linear-gradient(145deg,_#f8fafc,_#e2e8f0)]">
            <div class="mb-8">
                <a href="/" class="inline-flex items-center gap-3">
                    <x-application-logo class="h-12 w-12 drop-shadow-lg" />
                    <span class="text-2xl font-semibold tracking-tight text-slate-950">BlastMail</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md overflow-hidden rounded-2xl border border-white/80 bg-white/85 px-7 py-8 shadow-2xl shadow-slate-300/50 backdrop-blur-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
