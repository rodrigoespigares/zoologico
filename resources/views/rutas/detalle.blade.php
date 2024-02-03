<x-app-layout>
    <x-slot name="slot">
        @foreach ($rutas as $ruta)
            <p>{{$ruta->nombre}}</p>
            @if ($ruta->foto == "sin_foto.png")
            <img src="{{asset('img/')."/$ruta->foto"}}" alt="">
            @else
            <img src="{{asset('img/ruta/')."/$ruta->foto"}}" alt="">
            @endif
        @endforeach
    </x-slot>
</x-app-layout>
