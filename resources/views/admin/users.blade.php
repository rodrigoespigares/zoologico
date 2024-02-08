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
                        <th>Apellidos</th>
                        <th>Email</th>
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
                                <a href="/editarlistadousuarios/{{$resultado->id}}">Editar</a>
                                <a href="/usuarios/destroy/{{$resultado->id}}">Cambiar rol a cliente</a>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
            <div>
                @if(request()->is('verlistadousuarios'))
                    @include('usuarios.create')
                @else
                    @include('usuarios.edit', ['user' => $user[0]])
                    <a href="/verlistadousuarios">Cancelar</a>
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
