<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                    <h1 class="mb-0">Crear nueva Oferta Notificacion</h1>

                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    
                    <form action="{{ route('admin/notifications/save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo" value="{{ old('titulo') }}">
                                @error('titulo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="descripcion" class="form-control" placeholder="DESCRIPCION" value="{{ old('descripcion') }}">
                                @error('descripcion')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="number" name="flight_id" class="form-control" placeholder="ID DE VUELO" value="{{ old('flight_id') }}">
                                @error('flight_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="datetime-local" name="start_date" class="form-control" placeholder="FECHA DE INICIO" value="{{ old('start_date') }}">
                                @error('start_date')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="datetime-local" name="end_date" class="form-control" placeholder="FECHA DE EXPIRACION" value="{{ old('end_date') }}">
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
