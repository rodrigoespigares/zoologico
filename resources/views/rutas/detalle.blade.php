-<x-app-layout>
    <x-slot name="slot">
        @foreach ($rutas as $ruta)
            <p>{{$ruta->nombre}}</p>
            @if ($ruta->foto == "sin_foto.png")
            <img src="{{asset('img/')."/$ruta->foto"}}" alt="">
            @else
            <img src="{{asset('img/ruta/')."/$ruta->foto"}}" alt="">
            @endif
        @endforeach
        <div>
            @foreach ($animales as $animal)
                <p>{{$animal->nombre}}</p>
                <td>{{$animal->n_cientifico}}</td>
                <td>{{$animal->descripcion}}</td>
                @if ($animal->foto == "sin_foto.png")
                    <img src="{{asset('img/')."/$animal->foto"}}" alt="">
                @else
                    <img src="{{asset('img/animales/')."/$animal->foto"}}" alt="">
                @endif
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
