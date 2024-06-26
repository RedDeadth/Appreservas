<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Vuelos disponibles') }}
            </h2>
            <div>
                <a href="{{ route('Myreservations.index') }}" class="btn btn-secondary">Mis Reservas</a>
                <a href="{{ route('payment-methods.index') }}" class="btn btn-secondary ml-2">Mis métodos de pago</a>
            </div>
        </div>
    </x-slot>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @forelse($flights as $flight)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Destino: {{ $flight->route->destination }}</h5>
                                    <p class="card-text">Aerolínea: {{ $flight->airline->name }}</p>
                                    <p class="card-text">Duración del vuelo: {{ $flight->duration }}</p>
                                    <p class="card-text">Asientos Disponibles: {{ $flight->available_seats }}</p>
                                    <p class="card-text">Precio: ${{ number_format($flight->price, 2) }}</p>
                                    @if($flight->price_with_offers < $flight->price)
                                        <p class="card-text text-success">Precio con ofertas: ${{ number_format($flight->price_with_offers, 2) }}</p>
                                    @endif
                                    <a href="{{ route('reservations.create', $flight->id) }}" class="btn btn-danger w-full">Reservar</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No hay vuelos disponibles.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
