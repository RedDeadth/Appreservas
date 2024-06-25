<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestionar Aerolíneas, Vuelos y Rutas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-wrap gap-4">
                    <p><a href="{{ route('admin.airline.create') }}" class="btn btn-primary">Añadir Aerolínea</a></p>
                    <p><a href="{{ route('admin.offers.index') }}" class="btn btn-primary">Gestionar Ofertas</a></p>
                    <p><a href="{{ route('admin.flights.create') }}" class="btn btn-primary">Añadir Vuelos</a></p>
                    <p><a href="{{ route('admin.routes.create') }}" class="btn btn-primary">Añadir Rutas</a></p>
                    <p><a href="" class="btn btn-primary">Ver informacion de reservas</a></p>
                </div>
                <div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Iterar sobre las rutas --}}
                        @foreach ($routes as $route)
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Listado de Rutas</h3>
                                <h4 class="text-lg font-semibold mb-2">{{ $route->origin }} - {{ $route->destination }}</h4>
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('admin.routes.destroy', $route->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($routes->isEmpty())
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay rutas registradas.</p>
                    @endif
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-2">Listado de Aerolíneas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Iterar sobre las aerolíneas --}}
                        @foreach ($airlines as $airline)
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold mb-2">{{ $airline->name }}</h4>
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.airline.edit', $airline->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('admin.airline.destroy', $airline->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($airlines->isEmpty())
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay aerolíneas registradas.</p>
                    @endif
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-2">Listado de Vuelos</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Iterar sobre los vuelos --}}
                        @foreach ($flights as $flight)
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                                <h4 class="text-lg font-semibold mb-2">ID: {{ $flight->id }}</h4>
                                <p class="mb-2"><strong>Aerolínea:</strong> {{ $flight->airline->name }}</p>
                                <p class="mb-2"><strong>Ruta:</strong> {{ $flight->route->origin }} - {{ $flight->route->destination }}</p>
                                <p class="mb-2"><strong>Salida:</strong> {{ $flight->departure_date_time }}</p>
                                <p class="mb-2"><strong>Llegada:</strong> {{ $flight->arrival_date_time }}</p>
                                <p class="mb-2"><strong>Duración:</strong> {{ $flight->duration }} horas</p>
                                <p class="mb-2"><strong>Asientos Disponibles:</strong> {{ $flight->available_seats }}</p>
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.flights.edit', $flight->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('admin.flights.destroy', $flight->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($flights->isEmpty())
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay vuelos registrados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
