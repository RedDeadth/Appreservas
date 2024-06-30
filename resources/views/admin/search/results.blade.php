<!-- resources/views/admin/search/results.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultados de Búsqueda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($results) > 0)
                        <ul>
                            @foreach ($results as $result)
                                <li>{{ $result->origin }} - {{ $result->destination }} | {{ $result->airline_name }} | S/.{{ $result->price }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No se encontraron resultados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
