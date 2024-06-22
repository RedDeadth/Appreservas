<!-- payment-methods/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Métodos de Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($paymentMethods->isEmpty())
                        <p class="text-center">No tienes métodos de pago guardados.</p>
                    @else
                        <ul class="list-group">
                            @foreach($paymentMethods as $paymentMethod)
                                <li class="list-group-item">
                                    <p><strong>Tipo:</strong> {{ $paymentMethod->type }}</p>
                                    <p><strong>Número:</strong> {{ $paymentMethod->number }}</p>
                                    <!-- Otros detalles del método de pago -->
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
