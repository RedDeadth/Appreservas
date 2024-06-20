<!-- resources/views/flights/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vuelos Disponibles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4">Opciones de Vuelos</h1>

                    @foreach($flights as $flight)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Vuelo ID: {{ $flight->id }}</h5>
                                <p class="card-text">Aerolinea: {{ $flight->airline->name }}</p>
                                <p class="card-text">Ruta: {{ $flight->route->name }}</p>
                                <p class="card-text">Fecha de Salida: {{ $flight->departure_date_time }}</p>
                                <p class="card-text">Fecha de Llegada: {{ $flight->arrival_date_time }}</p>
                                <p class="card-text">Asientos Disponibles: {{ $flight->available_seats }}</p>
                                <a href="{{ route('reservations.create', $flight->id) }}" class="btn btn-primary">Reservar</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
