
<x-app-layout>
    <x-slot name="slot">

    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Gmail</th>
            <th>Rol</th>
        </tr>
        @foreach ($resultados as $resultado)

                <tr>
                    <td>{{$resultado->name}}</td>
                    <td>{{$resultado->subname}}</td>
                    <td>{{$resultado->email}}</td>
                    <td>{{$resultado->rol}}</td>
                    <td>
                        <a href="/usuarios/ver/{{$resultado->id}}">Ver</a>
                        @auth
                            @if (auth()->user()->obtenerRol()=='admin' || auth()->user()->obtenerRol()=='admin')
                                <a href="/usuarios/destroy/{{$resultado->id}}">Eliminar (Cambiar el rol a user)</a>
                            @endif
                        @endauth
                    </td>
                </tr>

        @endforeach
    </table>
</x-slot>
</x-app-layout>
