<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Una Nueva Notificacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as Admin!") }}
                    <h1 class="mb-0">Crear nueva notificacion</h1>

                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif

                    <p><a href="{{ route('admin/notifications') }} " class="btn btn-primary">Retroceder</a></p>
                    
                    <form action="{{ route('admin/notifications/save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo">
                                @error('titulo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="descripcion" class="form-control" placeholder="DESCRIPCION">
                                @error('descripcion')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="flight_id" class="form-control" placeholder="ID DE VUELO">
                                @error('flight_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="date" name="start_date" class="form-control" placeholder="FECHA DE INICIO">
                                @error('start_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="date" name="end_date" class="form-control" placeholder="FECHA DE EXPIRACION">
                                @error('end_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
