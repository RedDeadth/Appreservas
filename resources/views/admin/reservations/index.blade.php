<!-- resources/views/admin/reservations/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Información de Reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Listado de Reservas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Iterar sobre las reservas --}}
                        @foreach ($reservations as $reservation)
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold mb-2">Reserva ID: {{ $reservation->id }}</h4>
                                <p class="mb-2"><strong>Usuario:</strong> {{ $reservation->user->name }}</p>
                                <p class="mb-2"><strong>Aerolínea:</strong> {{ $reservation->flight->airline->name }}</p>
                                <p class="mb-2"><strong>Ruta:</strong> {{ $reservation->flight->route->origin }} - {{ $reservation->flight->route->destination }}</p>
                                <p class="mb-2"><strong>Salida:</strong> {{ $reservation->flight->departure_date_time }}</p>
                                <p class="mb-2"><strong>Llegada:</strong> {{ $reservation->flight->arrival_date_time }}</p>
                                <p class="mb-2"><strong>Asiento:</strong> {{ $reservation->seat_number }}</p>
                                <p class="mb-2"><strong>Estado:</strong> {{ $reservation->status }}</p>
                                <p class="mb-2"><strong>Método de Pago:</strong> {{ $reservation->paymentMethod->Name ?? 'N/A' }}</p>
                            </div>
                        @endforeach
                    </div>
                    @if ($reservations->isEmpty())
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay reservas registradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
