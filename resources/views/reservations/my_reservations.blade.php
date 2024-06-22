<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vuelos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($reservations->isEmpty())
                        <p class="text-center">No tienes reservas.</p>
                    @else
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <ul class="list-group">
                                    @foreach($reservations as $reservation)
                                        <li class="list-group-item mb-3">
                                            <div class="bg-yellow-500 text-white p-2 rounded">
                                                <h5 class="mb-0"><strong>Destino:</strong> {{ $reservation->flight->route->destination }}</h5>
                                            </div>
                                            <p class="mb-0"><strong>Aerolínea:</strong> {{ $reservation->flight->airline->name }}</p>
                                            <p class="mb-0"><strong>Número de Asiento:</strong> {{ $reservation->seat_number }}</p>
                                            <p class="mb-0"><strong>Estado:</strong> {{ ucfirst($reservation->status) }}</p>
                                            <p class="mb-0"><strong>Fecha de Reserva:</strong> {{ $reservation->created_at->format('d-m-Y H:i') }}</p>
                                            <div class="mt-2">
                                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Editar</a>
                                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
