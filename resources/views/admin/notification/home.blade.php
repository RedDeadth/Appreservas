<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestionar Ofertas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><a href="{{ route('admin/dashboard') }} " class="btn btn-primary">Retroceder</a></p>
                    <a href={{ route('admin/notifications/create') }} class='btn btn-primary'>add Notification</a>
                </div>
                
                <hr />
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Descripcion</th>
                            <th>id de vuelo</th>
                            <th>fecha de comienzo</th>
                            <th>fecha de expiracion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($notifications as $notification)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $notification->titulo }}</td>
                                <td class="align-middle">{{ $notification->descripcion }}</td>
                                <td class="align-middle">{{ $notification->flight_id }}</td>
                                <td class="align-middle">{{ $notification->start_date }}</td>
                                <td class="align-middle">{{ $notification->end_date }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/notifications/edit', ['id'=>$notification->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/notifications/delete', ['id'=>$notification->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">No encontrados las notificaciones</td>
                            </tr>
                            @endforelse
                        </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>