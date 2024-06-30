<!-- resources/views/search/results.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resultados de Búsqueda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (count($sortedResults) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($sortedResults as $result)
                                <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                                    <h4 class="text-lg font-semibold mb-2">{{ $result['origin'] }} - {{ $result['destination'] }}</h4>
                                    <p class="mb-2"><strong>Aerolínea:</strong> {{ $result['airline_name'] }}</p>
                                    <p class="mb-2"><strong>Precio:</strong> S/.{{ $result['price'] }}</p>
                                    <div class="flex justify-center mt-4">
                                        <a href="{{ route('reservations.create', ['flight' => $result['id']]) }}" class="btn btn-primary">Reservar</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No se encontraron resultados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
