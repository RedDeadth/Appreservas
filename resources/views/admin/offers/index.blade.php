<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ofertas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.offers.create') }}" class="btn btn-primary mb-4">Añadir Oferta</a>
                    <table class="min-w-full bg-white dark:bg-gray-900">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-blue-500 dark:text-blue-400 tracking-wider">Título</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-blue-500 dark:text-blue-400 tracking-wider">Codigo de Vuelo</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-blue-500 dark:text-blue-400 tracking-wider">Oferta</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-blue-500 dark:text-blue-400 tracking-wider">Inicio</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-blue-500 dark:text-blue-400 tracking-wider">Fin</th>
                                
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900">
                            @foreach ($offers as $offer)
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $offer->titulo }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $offer->flight->id }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $offer->discount_percentage }}%</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $offer->start_date }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $offer->end_date }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                                        <a href="{{ route('admin.offers.edit', $offer->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($offers->isEmpty())
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay ofertas registradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
