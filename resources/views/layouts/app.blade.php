<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        <footer class="bg-gray-800 text-gray-200 mt-12">
            <div class="container mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h2 class="text-2xl font-bold mb-2">EduPlatform</h2>
                    <p class="text-gray-400">Навчайся онлайн з найкращими курсами. Здобувай нові знання та навички зручно та швидко.</p>
                </div>

                <div>
                    <h3 class="text-xl font-semibold mb-2">Корисні посилання</h3>
                    <ul>
                        <li><a href="#" class="hover:text-white transition-colors">Про нас</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Контакти</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Політика конфіденційності</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-gray-700 mt-6 py-4 text-center text-gray-500">
                &copy; {{ date('Y') }} EduPlatform. Всі права захищені.
            </div>
        </footer>
    </body>
</html>
