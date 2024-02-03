<x-app-layout>
    <x-slot name="slot">
        @foreach ($animales as $animal)
            <p>{{$animal->nombre}}</p>
            @if ($animal->foto == "sin_foto.png")
            <img src="{{asset('img/')."/$animal->foto"}}" alt="">
            @else
            <img src="{{asset('img/animales/')."/$animal->foto"}}" alt="">
            @endif
        @endforeach
    </x-slot>
</x-app-layout>