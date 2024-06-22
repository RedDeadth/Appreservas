<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservar Vuelo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-black text-white border border-gray-300 dark:border-gray-700 p-4 rounded-lg mb-4">
                        <h1 class="text-center text-2xl font-bold">Reservar Vuelo ID: {{ $flight->id }}</h1>
                    </div>

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <h3 class="font-bold text-xl mb-2">Detalles del Vuelo</h3>
                        <p><strong>Aerolínea:</strong> {{ $flight->airline->name }}</p>
                        <p><strong>Origen:</strong> {{ $flight->route->origin }}</p>
                        <p><strong>Destino:</strong> {{ $flight->route->destination }}</p>
                        <p><strong>Fecha de Salida:</strong> {{ $flight->departure_date_time }}</p>
                        <p><strong>Fecha de Llegada:</strong> {{ $flight->arrival_date_time }}</p>
                        <p><strong>Duración del Vuelo:</strong> {{ $flight->duration }} horas</p>
                        <p><strong>Asientos Totales:</strong> {{ $flight->available_seats }}</p>
                    </div>

                    <form action="{{ route('reservations.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                        <div class="mb-3">
                            <label for="seat_number" class="form-label">Número de Asiento</label>
                            <select name="seat_number" class="form-control" required>
                                @foreach($availableSeats as $seat)
                                    <option value="{{ $seat }}">{{ $seat }}</option>
                                @endforeach
                            </select>
                            @error('seat_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Estado de la Reserva</label>
                            <select name="status" class="form-control" required>
                                <option value="pending">Pendiente</option>
                                <option value="confirmed">Confirmar</option>
                                <option value="canceled">Cancelado</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3" id="payment-method-section" style="display: none;">
                            <label for="payment_method_id" class="form-label">Seleccionar Método de Pago</label>
                            <select name="payment_method_id" class="form-control">
                                <option value="">Seleccione un método de pago</option>
                                @foreach($paymentMethods as $method)
                                    <option value="{{ $method->id }}">{{ $method->name }} - {{ $method->card_number }}</option>
                                @endforeach
                            </select>
                            @error('payment_method_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-primary w-full">Reservar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.querySelector('select[name="status"]');
            const paymentMethodSection = document.getElementById('payment-method-section');

            statusSelect.addEventListener('change', function () {
                if (this.value === 'confirmed') {
                    paymentMethodSection.style.display = 'block';
                } else {
                    paymentMethodSection.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
