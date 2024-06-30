<x-app-layout>

    <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Vuelos disponibles') }}
            </h2>
        <form action="{{ route('admin.airlines.update', $airline->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">Nombre de la Aerolínea:</label>
                <input type="text" name="name" id="name" value="{{ $airline->name }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin/dashboard') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>
