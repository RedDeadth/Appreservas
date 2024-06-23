<!-- flights/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin - Vuelos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Listado de Vuelos</h3>
                        <a href="{{ route('flights.create') }}" class="btn btn-primary">Crear Vuelo</a>
                    </div>
                    
                    @if ($flights->isEmpty())
                        <p class="text-center">No hay vuelos registrados.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700">
                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700">
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">#</th>
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Aerolínea</th>
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Ruta</th>
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Salida</th>
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Llegada</th>
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Asientos Disponibles</th>
                                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($flights as $flight)
                                        <tr>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $flight->id }}</td>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $flight->airline->name }}</td>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $flight->route->origin }} - {{ $flight->route->destination }}</td>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $flight->departure_date_time }}</td>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $flight->arrival_date_time }}</td>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $flight->available_seats }}</td>
                                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                                <a href="{{ route('flights.edit', $flight->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                                <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
