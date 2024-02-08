<x-app-layout>
    <x-slot name="slot">

    <table class="table">
        <tr>
            <th>Fecha visita</th>
            <th>Hora</th>
            <th>Número de entradas</th>
        </tr>
        @foreach ($rutas as $ruta)
            @if ($ruta->cancelado == false)
                <tr>
                    <td>
                        @php
                            $fechaOriginal = $ruta->fecha_visita;
                            $dateTime = DateTime::createFromFormat('Y/m/d', $fechaOriginal);
                            if ($dateTime !== false) {
                                echo $dateTime->format('d/m/Y');
                            } else {
                                echo $fechaOriginal;
                            }
                        @endphp
                    </td>
                    <td>{{$ruta->hora}}</td>
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
