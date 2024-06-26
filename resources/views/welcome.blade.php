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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 558 447" class="h-14 w-auto fill-current text-gray-800 dark:text-gray-200 ">
                        <g transform="translate(0.000000,447.000000) scale(0.100000,-0.100000)" fill="#FFFFFF" stroke="none">
                          <path d="M2380 3540 c19 -6 20 -8 6 -9 -16 -1 -17 -3 -5 -18 12 -14 12 -16 -1 -11 -8 3 -27 1 -43 -3 -20 -6 -26 -4 -21 4 3 7 0 5 -8 -3 -7 -9 -24 -17 -38 -17 -14 -1 -56 -8 -95 -14 l-70 -12 125 -32 c138 -35 353 -114 415 -152 22 -13 80 -49 128 -80 88 -56 90 -56 190 -65 138 -11 223 -30 219 -48 -3 -11 0 -11 13 0 12 10 19 10 27 2 9 -9 7 -12 -7 -12 -18 -1 -19 -2 -3 -13 14 -11 16 -35 15 -177 l-1 -165 -6 155 -6 155 -2 -150 c-1 -110 1 -155 11 -164 10 -11 10 -14 0 -18 -16 -6 -17 -35 -3 -49 13 -13 2 -94 -12 -94 -6 0 -7 -7 -4 -16 4 -10 -1 -22 -11 -30 -16 -12 -14 -13 12 -3 54 19 190 97 272 156 96 69 251 209 259 235 4 13 -14 44 -59 101 -272 348 -735 560 -1211 556 -71 -1 -102 -4 -86 -9z"/>
                          <path d="M2328 3523 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z"/>
                          <path d="M2078 3463 c7 -3 16 -2 19 1 4 3 -2 6 -13 5 -11 0 -14 -3 -6 -6z"/>
                          <path d="M1886 3362 c5 -5 53 -44 107 -86 88 -71 124 -108 237 -247 19 -24 33 -50 32 -59 -2 -8 -19 -37 -37 -65 -41 -63 -100 -179 -86 -170 6 3 11 3 12 -2 0 -4 2 -24 4 -43 15 -142 16 -164 6 -150 -9 11 -10 5 -5 -25 5 -35 -1 -54 -44 -140 -53 -106 -78 -163 -148 -339 -45 -113 -52 -151 -13 -74 70 140 217 357 342 506 132 157 370 379 497 463 l25 16 -30 42 c-103 150 -425 311 -723 361 -120 21 -192 26 -176 12z m280 -619 c-10 -10 -19 5 -10 18 6 11 8 11 12 0 2 -7 1 -15 -2 -18z"/>
                          <path d="M2112 2696 c-17 -37 -15 -45 4 -18 8 12 14 27 12 33 -2 6 -9 -1 -16 -15z"/>
                          <path d="M3020 2425 c-67 -29 -273 -79 -390 -96 -47 -6 -143 -14 -214 -18 l-128 -6 93 -62 c285 -187 610 -283 912 -270 124 5 307 33 307 47 0 4 -24 17 -52 29 -148 60 -319 191 -399 305 -27 38 -49 75 -49 83 0 18 -15 15 -80 -12z m280 -619 c-10 -10 -19 5 -10 18 6 11 8 11 12 0 2 -7 1 -15 -2 -18z"/>
                          <path d="M1200 1680 c-22 -5 -26 -14 -42 -110 -10 -58 -21 -128 -24 -156 -6 -50 -6 -51 21 -58 36 -9 43 -1 52 64 7 46 12 56 30 58 18 3 24 -6 40 -55 17 -50 24 -59 52 -67 46 -13 52 0 33 70 -15 59 -15 61 6 90 13 16 25 52 28 79 9 70 -13 88 -104 90 -37 1 -78 -1 -92 -5z m112 -85 c9 -21 8 -28 -7 -45 -10 -11 -31 -20 -47 -20 -31 0 -36 18 -18 64 13 35 56 36 72 1z"/>
                          <path d="M1553 1682 c-13 -2 -23 -5 -23 -7 0 -1 -11 -71 -25 -155 -14 -84 -24 -155 -21 -157 2 -2 49 -6 104 -9 93 -4 102 -3 111 15 24 44 16 51 -59 51 l-70 0 0 30 0 30 60 0 c56 0 61 2 70 26 16 41 13 44 -51 44 l-60 0 3 33 3 32 73 3 c66 3 74 5 84 27 6 14 9 28 5 31 -6 7 -168 11 -204 6z"/>
                          <path d="M1914 1680 c-41 -13 -64 -40 -71 -84 -8 -52 14 -79 84 -103 51 -18 61 -26 61 -45 0 -43 -70 -51 -96 -11 -18 28 -55 33 -74 10 -19 -23 5 -71 42 -84 72 -25 176 -1 197 45 27 60 3 116 -56 130 -54 13 -84 34 -81 56 7 48 82 50 94 2 5 -21 11 -25 38 -22 28 3 31 7 34 39 2 25 -3 40 -16 53 -24 21 -113 30 -158 16z"/>
                          <path d="M2298 1683 c-71 -4 -78 -6 -83 -26 -20 -93 -46 -254 -43 -275 l3 -27 98 0 c55 0 102 2 107 5 4 3 10 16 11 30 4 24 2 25 -68 28 -61 2 -73 6 -73 20 0 32 16 41 75 44 60 3 60 3 63 36 l3 32 -54 0 c-29 0 -56 2 -59 5 -2 3 -3 18 0 35 l4 30 74 0 c70 0 74 1 80 24 8 34 -2 46 -34 44 -15 -1 -62 -4 -104 -5z"/>
                          <path d="M2573 1682 c-16 -2 -23 -10 -23 -27 0 -12 -9 -67 -19 -121 -33 -173 -34 -174 -16 -180 8 -3 26 -3 40 0 20 5 25 14 31 55 3 27 10 54 14 61 15 25 39 1 55 -55 9 -30 22 -55 28 -56 7 0 19 -2 28 -4 37 -7 44 10 27 70 -16 56 -15 58 7 90 31 46 40 111 20 141 -12 19 -25 24 -58 25 -23 0 -58 1 -77 2 -19 1 -45 1 -57 -1z m117 -81 c10 -21 4 -51 -14 -63 -6 -4 -23 -8 -38 -8 -24 0 -28 4 -28 29 0 16 3 36 6 45 9 23 61 21 74 -3z"/>
                          <path d="M2894 1682 c-7 -5 -8 -60 -5 -167 l6 -159 57 -2 c31 -1 64 3 72 10 15 11 131 304 124 311 -2 3 -19 6 -38 7 l-35 3 -27 -80 c-48 -138 -59 -165 -69 -165 -5 0 -9 53 -9 119 0 99 -3 120 -16 125 -21 8 -47 7 -60 -2z m77 -121 c0 -58 -12 -77 -47 -77 -28 0 -29 18 -7 83 11 34 21 47 35 47 16 0 19 -8 19 -53z"/>
                          <path d="M3309 1683 c-24 -4 -31 -18 -83 -160 -31 -86 -53 -160 -48 -165 18 -18 67 3 82 35 13 35 20 38 55 35 33 -3 37 -6 40 -33 5 -40 14 -48 51 -40 l31 7 0 157 0 158 -37 7 c-59 9 -100 7 -110 -6z m52 -133 c-4 -66 -6 -70 -36 -70 -33 0 -36 10 -20 64 18 60 23 68 43 64 14 -3 16 -13 13 -58z"/>
                          <path d="M3634 1680 c-41 -13 -64 -40 -71 -84 -8 -52 14 -80 84 -103 53 -18 58 -22 58 -49 0 -26 -4 -29 -37 -32 -30 -3 -40 1 -54 22 -11 18 -25 26 -45 26 -36 0 -46 -20 -29 -60 19 -46 97 -63 182 -39 42 11 68 48 68 97 0 41 -18 59 -85 85 -70 27 -86 58 -41 79 34 15 76 -3 76 -32 0 -18 5 -21 33 -18 29 3 32 6 35 39 2 25 -3 40 -16 53 -24 21 -113 30 -158 16z"/>
                          <path d="M3905 1681 c-2 -5 10 -52 29 -105 30 -86 32 -101 24 -147 -12 -67 -6 -83 29 -74 34 8 39 16 47 75 5 36 22 70 75 148 l69 100 -30 4 c-33 5 -36 3 -88 -69 -16 -24 -34 -43 -38 -43 -5 0 -16 25 -26 55 -9 30 -20 55 -24 56 -4 0 -19 2 -34 4 -15 2 -30 0 -33 -4z"/>
                          <path d="M4293 1678 c-9 -13 -31 -70 -91 -236 -32 -88 -30 -97 20 -90 15 2 29 16 41 41 16 35 20 38 55 35 33 -3 37 -6 40 -33 5 -40 14 -48 51 -40 l31 7 0 157 0 158 -37 7 c-59 9 -100 7 -110 -6z m77 -121 c0 -58 -12 -77 -47 -77 -28 0 -29 18 -7 83 11 34 21 47 35 47 16 0 19 -8 19 -53z"/>
                        </g>
                      </svg>
                      
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
