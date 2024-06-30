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
                    <h3 class="text-lg font-semibold mb-2">Detalles del Vuelo</h3>
                    <form action="{{ route('admin.flights.update', $flight->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <div class="mb-4">
                                    <label for="airline_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Aerolínea</label>
                                    <select name="airline_id" id="airline_id" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($airlines as $airline)
                                            <option value="{{ $airline->id }}" {{ $airline->id == $flight->airline_id ? 'selected' : '' }}>{{ $airline->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('airline_id')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="route_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ruta</label>
                                    <select name="route_id" id="route_id" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}" {{ $route->id == $flight->route_id ? 'selected' : '' }}>{{ $route->origin }} - {{ $route->destination }}</option>
                                        @endforeach
                                    </select>
                                    @error('route_id')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="departure_date_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de Salida</label>
                                    <input type="datetime-local" name="departure_date_time" id="departure_date_time" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('departure_date_time', date('Y-m-d\TH:i', strtotime($flight->departure_date_time))) }}">
                                    @error('departure_date_time')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="arrival_date_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de Llegada</label>
                                    <input type="datetime-local" name="arrival_date_time" id="arrival_date_time" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('arrival_date_time', date('Y-m-d\TH:i', strtotime($flight->arrival_date_time))) }}">
                                    @error('arrival_date_time')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="available_seats" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Asientos Disponibles</label>
                                    <input type="number" name="available_seats" id="available_seats" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('available_seats', $flight->available_seats) }}">
                                    @error('available_seats')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</label>
                                    <input type="numeric" name="price" id="price" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-indigo-300 dark:focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('price', $flight->price) }}" placeholder="Ingrese el precio del vuelo">
                                    @error('price')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="mt-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Actualizar Vuelo
                                    </button>
                                    <a href="{{ route('admin/dashboard') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
