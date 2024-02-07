<x-app-layout>
    <x-slot name="slot">
       
    <table class="table">
        <tr>
            <th>Fecha visita</th>
            <th>Número de entradas</th>
        </tr>
        @foreach ($rutas as $ruta)
            @if ($ruta->cancelado == false)
                <tr>
                    <td>{{DateTime::createFromFormat('Y/m/d', $ruta->fecha_visita)->format('d/m/Y')}}</td>
                    <td>{{$ruta->n_entradas}}</td>
                    @if (strtotime($ruta->fecha_visita)>time())
                        <td><a href="/visita/cancelar/{{$ruta->id}}">Cancelar</a></td>
                    @endif
                </tr>
            @endif
        @endforeach
    </table>
</x-slot>
</x-app-layout>
