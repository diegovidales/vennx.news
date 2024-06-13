<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Vennx News' }}</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        {{-- Fonts --}}
        <link rel="stylesheet" id="google-fonts-1-css" href="https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=6.5.3" type="text/css" media="all">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://unpkg.com/@alpinejs/ui@3.13.2-beta.0/dist/cdn.min.js"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="h-full bg-slate-200">
        <div class="min-h-full">
            <livewire:layouts.navigation-menu />
            <main>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                            @if (isset($header))
                                <div class="flex flex-col md:flex-row justify-between gap-2 md:items-center mb-4">
                                    <div class="flex flex-col gap-1">
                                        <h1 class="font-semibold text-3xl text-gray-800">{{ $header }}</h1>
                                    </div>
                                </div>
                            @endif
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @livewireScripts
    </body>
</html>
