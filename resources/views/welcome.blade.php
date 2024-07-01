<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RESERVASYA</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-500 bg-opacity-50 fixed w-full z-10">
        <div class="container mx-auto flex justify-between items-center px-4 py-4">
            <!-- Logo y nombre -->
            <div class="flex justify-between items-center w-full lg:w-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center mx-auto lg:mx-0">
                    <span class="sr-only">Inicio</span>
                    <x-application-logo class="h-8 w-auto fill-current text-white mx-auto lg:mx-0" />
                    <span class="text-white text-lg font-semibold ml-2 hidden lg:block">RESERVASYA</span>
                </a>

                <!-- Botón de menú para dispositivos móviles -->
                <div class="lg:hidden ml-4">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menú de navegación -->
            <nav class="hidden lg:flex items-center space-x-4">
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-white hover:text-gray-200">Reservas</a></li>
                    <li><a href="#" class="text-white hover:text-gray-200">Metodos de Pago</a></li>
                </ul>
            </nav>

            <!-- Menú de usuario -->
            @if (Route::has('login'))
                <nav class="hidden lg:flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white hover:text-gray-200">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-200">Registrarse</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>

        <!-- Menú desplegable para dispositivos móviles -->
        <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-blue-500 bg-opacity-90 hidden z-50">
            <div class="flex justify-end p-4">
                <button id="mobile-menu-close-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex justify-start">
                <ul class="text-white text-sm text-left py-2 space-y-2 w-full">
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-600">Reservas</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-600">Metodos de Pago</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}" class="block py-2 px-4 hover:bg-blue-600">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="block py-2 px-4 hover:bg-blue-600">Iniciar Sesión</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="block py-2 px-4 hover:bg-blue-600">Registrarse</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </header>

    <!-- Imagen -->
    <section class="relative w-full pt">
        <img src="{{ asset('img/img1.jpeg') }}" alt="Imagen" class="w-full h-96 object-cover">
    </section>

    <!-- Main Content -->
    <main class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center sm:flex-row">
                <div class="text-center sm:text-left sm:ml-auto lg:ml-64">
                    <h1 class="text-4xl font-bold text-blue-500 mb-4">RESERVASYA</h1>
                    <p class="text-lg text-gray-700">¡Bienvenido a nuestra plataforma de reservas!</p>
                    <div class="mt-4">
                        <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 block w-full sm:inline-block sm:w-auto">Regístrate ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <div class="">
                <a href="https://wa.me/1234567890" class="text-white mx-auto hover:text-green-600">
                    <img width="40" height="40" src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp--v1.png" alt="WhatsApp" class="inline-block">
                </a>
            </div>
            <p class="mt-4 text-sm sm:text-base">&copy; 2024 RESERVASYA. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
