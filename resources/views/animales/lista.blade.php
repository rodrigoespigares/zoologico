<x-app-layout>
    <x-slot name="slot">
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Nombre Cientifico</th>
            <th>Descripcion</th>
            <th>Foto</th>
        </tr>
        @foreach ($resultados as $resultado)
            <tr>
                <td>{{$resultado->nombre}}</td>
                <td>{{$resultado->n_cientifico}}</td>
                <td>{{$resultado->descripcion}}</td>
                <td><img src="{{url('img/subidas/'.$resultado->foto)}}" alt=""></td>
                <td>{{$resultado->visitable}}</td>
                <td>{{$resultado->cuidador_id}}</td>
                <td>{{$resultado->ruta_id}}</td>
                <td>
                    <a href="/contactos/show/{{$resultado->id}}">Ver</a>
                    <a href="/contactos/edit/{{$resultado->id}}">Editar</a>
                    <a href="/contactos/destroy/{{$resultado->id}}">Borrar</a>
                </td>
            </tr>
        @endforeach
    </table>
</x-slot>
</x-app-layout>