<x-app-layout>
    <x-slot name="slot">
        <div class="dividir">
            <div class="dividir__long">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session()->get('success') }}</li>
                        </ul>
                    </div><br />
                @endif
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre Cientifico</th>
                        <th>Descripcion</th>
                        <th>Foto</th>
                        <th>Visitable</th>
                    </tr>
                    @foreach ($resultados as $resultado)
                            <tr>
                                <td>{{$resultado->nombre}}</td>
                                <td>{{$resultado->n_cientifico}}</td>
                                <td>{{$resultado->descripcion}}</td>
                                <td><img src="{{url('img/subidas/'.$resultado->foto)}}" alt=""></td>
                                <td>{{$resultado->visitable==1?"visible":"no visible" }}</td>
                                <td>
                                    <a href="/animales/ver/{{$resultado->id}}">Ver</a>
                                    <a href="/editarlistadoanimales/{{$resultado->id}}">Editar</a>
                                    <a href="/animales/destroy/{{$resultado->id}}">No visitable</a>
                                </td>

                            </tr>
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
        @php
            if(session()->has("success")){
                header("Refresh:2");
            }
        @endphp
    </x-slot>
</x-app-layout>
