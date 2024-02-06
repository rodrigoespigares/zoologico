
<x-app-layout>
    <x-slot name="slot">

    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Foto</th>
        </tr>
        @foreach ($resultados as $resultado)

            @php
            if($resultado->foto == "sin_foto.png"){
                $foto = url('img/'.$resultado->foto);
            }else{
                $foto = url('img/subidas/rutas'.$resultado->foto);
            }

            @endphp
            @if ($resultado->visitable == 1)
                <tr>
                    <td>{{$resultado->nombre}}</td>
                    <td>{{$resultado->descripcion}}</td>
                    <td><img src="{{$foto}}" alt=""></td>
                    <td>
                        <a href="/rutas/ver/{{$resultado->id}}">Ver</a>

                    </td>
                </tr>
            @endif
        @endforeach


    </table>
</x-slot>
</x-app-layout>
