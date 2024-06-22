<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Reserva') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="seat_number" class="form-label">Número de Asiento</label>
                            <select name="seat_number" class="form-control" required>
                                @foreach($availableSeats as $seat)
                                    <option value="{{ $seat }}" {{ $reservation->seat_number == $seat ? 'selected' : '' }}>{{ $seat }}</option>
                                @endforeach
                            </select>
                            @error('seat_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary w-full">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
