<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vuelos disponibles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @forelse($flights as $flight)
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $flight->route->destination }}</h5>
                                        
                                        <p class="card-text">Aerolínea: {{ $flight->airline->name }}</p>
                                        <p class="card-text">Duración del vuelo: {{ $flight->duration }} horas</p>
                                        <p class="card-text">Asientos Disponibles: {{ $flight->available_seats }}</p>
                                        <a href="{{ route('reservations.create', $flight->id) }}" class="btn btn-danger w-full">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No hay vuelos disponibles.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
