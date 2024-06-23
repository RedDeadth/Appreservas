<!-- flights/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Vuelo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('flights.update', $flight->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="airline_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Aerolínea</label>
                            <select name="airline_id" id="airline_id" class="form-select mt-1 block w-full">
                                @foreach ($airlines as $airline)
                                    <option value="{{ $airline->id }}" {{ $flight->airline_id == $airline->id ? 'selected' : '' }}>{{ $airline->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="route_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ruta</label>
                            <select name="route_id" id="route_id" class="form-select mt-1 block w-full">
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}" {{ $flight->route_id == $route->id ? 'selected' : '' }}>{{ $route->origin }} - {{ $route->destination }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="departure_date_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de Salida</label>
                            <input type="datetime-local" name="departure_date_time" id="departure_date_time" class="form-input mt-1 block w-full" value="{{ $flight->departure_date_time->format('Y-m-d\TH:i') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="arrival_date_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de Llegada</label>
                            <input type="datetime-local" name="arrival_date_time" id="arrival_date_time" class="form-input mt-1 block w-full" value="{{ $flight->arrival_date_time->format('Y-m-d\TH:i') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="available_seats" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Asientos Disponibles</label>
                            <input type="number" name="available_seats" id="available_seats" class="form-input mt-1 block w-full" value="{{ $flight->available_seats }}" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Actualizar Vuelo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
