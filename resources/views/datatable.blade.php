<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container text-center lg ">
        <table id="tasks" class="table table-striped border border-dark shadow-lg mt-5 " style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>edad</th>
                    <th>direccion</th>
                    <th>fecha</th>
                    <th>Categoria</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->name }}</td>
                        <td>{{ $tarea->last_name }}</td>
                        <td>{{ $tarea->age }}</td>
                        <td>{{ $tarea->address }}</td>
                        <td>{{ $tarea->date }}</td>
                        <td>{{ $tarea->category->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
