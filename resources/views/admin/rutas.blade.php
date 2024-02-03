<x-app-layout>
    <x-slot name="slot">
        <div class="dividir">
            <div class="dividir__long">
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Foto</th>
                    </tr>
                    @foreach ($resultados as $resultado)
                            <tr>
                                <td>{{$resultado->nombre}}</td>
                                <td>{{$resultado->descripcion}}</td>
                                <td><img src="{{url('img/subidas/'.$resultado->foto)}}" alt=""></td>
                                <td>
                                    <a href="/rutas/ver/{{$resultado->id}}">Ver</a>
                                    <a href="/editarlistadorutas/{{$resultado->id}}">Editar</a>
                                    <a href="/rutas/destroy/{{$resultado->id}}">Eliminar</a>
                                </td>
                            </tr>

                    @endforeach
                </table>
            </div>
            <div>
                @if(request()->is('verlistadorutas'))
                    @include('rutas.create')
                @else
                    @include('rutas.edit', ['ruta' => $ruta[0]])
                    <a href="/verlistadorutas">Cancelar</a>
                @endif
            </div>
        </div>

    </x-slot>
</x-app-layout>
