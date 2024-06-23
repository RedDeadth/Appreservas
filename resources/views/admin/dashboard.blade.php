<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ __("Iniciaste sesión como Administrador!") }}</p>
                    <p><a href="{{ route('admin/dashboard') }}" class="btn btn-primary">Volver al Dashboard</a></p>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-2">Listado de Vuelos</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aerolínea</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ruta</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha y Hora de Salida</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha y Hora de Llegada</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duración</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asientos Disponibles</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                @foreach ($flights as $flight)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->airline->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->route->origin }} - {{ $flight->route->destination }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->departure_date_time }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->arrival_date_time }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->duration }} horas</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $flight->available_seats }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('admin.flights.edit', $flight->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <form action="{{ route('admin.flights.destroy', $flight->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($flights->isEmpty())
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay vuelos registrados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
