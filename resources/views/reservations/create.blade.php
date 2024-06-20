<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservar Vuelo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4">Reservar Vuelo ID: {{ $flight->id }}</h1>

                    @if (session()->has('error'))
                    <div>
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Detalles del Vuelo</h5>
                            <p class="card-text">Aerolínea: {{ $flight->airline->name }}</p>
                            <p class="card-text">Origen: {{ $flight->route->origin }}</p>
                            <p class="card-text">Destino: {{ $flight->route->destination }}</p>
                            <p class="card-text">Fecha de Salida: {{ $flight->departure_date_time }}</p>
                            <p class="card-text">Fecha de Llegada: {{ $flight->arrival_date_time }}</p>
                            <p class="card-text">Asientos Disponibles: {{ $flight->available_seats }}</p>
                        </div>
                    </div>

                    <form action="{{ route('reservations.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="seat_number" class="form-control" placeholder="Número de Asiento" required>
                                @error('seat_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <select name="status" class="form-control" required>
                                    <option value="pending">Pendiente</option>
                                    <option value="confirmed">Confirmado</option>
                                    <option value="canceled">Cancelado</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
