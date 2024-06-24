<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Aerolínea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('airlines.update', $airline->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $airline->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Código</label>
                            <input type="text" name="code" id="code" class="mt-1 block w-full" value="{{ $airline->code }}" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('airlines.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
