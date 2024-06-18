<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Notificación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-0">Actualizar</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{ session('error') }}
                    </div>
                    @endif

                    <p><a href="{{ route('admin/notifications') }}" class="btn btn-primary">Retroceder</a></p>
                    
                    <form action="{{ route('admin/notifications/update', $notifications->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Título Notificación</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Título" value="{{ $notifications->titulo }}">
                                @error('titulo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Descripción</label>
                                <input type="text" name="descripcion" class="form-control" placeholder="Descripción" value="{{ $notifications->descripcion }}">
                                @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">ID Vuelo</label>
                                <input type="number" name="flight_id" class="form-control" placeholder="ID Vuelo" value="{{ $notifications->flight_id }}">
                                @error('flight_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Fecha de Inicio</label>
                                <input type="datetime-local" name="start_date" class="form-control" placeholder="Fecha de Inicio" value="{{ $notifications->start_date }}">
                                @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Fecha de Término</label>
                                <input type="datetime-local" name="end_date" class="form-control" placeholder="Fecha de Término" value="{{ $notifications->end_date }}">
                                @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
