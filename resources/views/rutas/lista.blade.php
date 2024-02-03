<x-app-layout>
    <x-slot name="slot">

    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Foto</th>
        </tr>
        @foreach ($resultados as $resultado)
            @if ($resultado->visitable == 1)
                <tr>
                    <td>{{$resultado->nombre}}</td>
                    <td>{{$resultado->descripcion}}</td>
                    <td><img src="{{url('img/subidas/'.$resultado->foto)}}" alt=""></td>
                    <td>
                        <a href="/rutas/ver/{{$resultado->id}}">Ver</a>
                        @auth
                            @if (auth()->user()->obtenerRol()=='admin' || auth()->user()->obtenerRol()=='guia')
                                <a href="/rutas/edit/{{$resultado->id}}">Editar</a>
                                <a href="/rutas/destroy/{{$resultado->id}}">Eliminar</a>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</x-slot>
</x-app-layout>
