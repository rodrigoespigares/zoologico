<x-app-layout>
    <x-slot name="slot">
        <div class="dividir">
            <div class="dividir__long">
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre Cientifico</th>
                        <th>Descripcion</th>
                        <th>Foto</th>
                    </tr>
                    @foreach ($resultados as $resultado)
                        @if ($resultado->visitable == 1)
                            <tr>
                                <td>{{$resultado->nombre}}</td>
                                <td>{{$resultado->n_cientifico}}</td>
                                <td>{{$resultado->descripcion}}</td>
                                <td><img src="{{url('img/subidas/'.$resultado->foto)}}" alt=""></td>
                                <td>
                                    <a href="/animales/ver/{{$resultado->id}}">Ver</a>
                                    <a href="/editarlistadoanimales/{{$resultado->id}}">Editar</a>
                                    <a href="/animales/destroy/{{$resultado->id}}">No visitable</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            <div>
                @if(request()->is('verlistadoanimales'))
                    @include('animales.create')
                @else
                    @include('animales.edit', ['animal' => $animal[0]])
                    <a href="/verlistadoanimales">Cancelar</a>
                @endif
            </div>
        </div>

    </x-slot>
</x-app-layout>
