<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir Método de Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('payment-methods.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="type_of_method" class="form-label">Tipo de Método de Pago</label>
                            <select name="type_of_method" class="form-control" required>
                                <option value="Efectivo" {{ old('type_of_method') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="Tarjeta de Credito" {{ old('type_of_method') == 'Tarjeta de Credito' ? 'selected' : '' }}>Tarjeta de Crédito</option>
                            </select>
                            @error('type_of_method')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Name" class="form-label">Nombre del Método de Pago</label>
                            <input type="text" name="Name" class="form-control" value="{{ old('Name') }}" required>
                            @error('Name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Code" class="form-label">Código del Método de Pago</label>
                            <input type="text" name="Code" class="form-control" value="{{ old('Code') }}" required>
                            @error('Code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary w-full">Añadir Método de Pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
