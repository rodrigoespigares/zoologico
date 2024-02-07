<x-app-layout>
    <x-slot name="slot">
        <div class="contenedor__secciones">
            <div class="seccion">
                @foreach ($animales as $animal)
                @if ($animal->foto == "sin_foto.png")
                    <div class="seccion_contenedor"><img src="{{asset('img/')."/$animal->foto"}}" alt=""></div>
                @else
                    <div class="seccion_contenedor"><img src="{{asset('img/subidas/animales/')."/$animal->foto"}}"></div>
                @endif
                <div class="contenedor__texto">
                    <h2>{{$animal->nombre}}</h2>
                    <p>{{$animal->descripcion}}</p>
                </div>
                @endforeach
            </div>
            <div class="seccion">
                @foreach ($rutas as $ruta)
                    @if ($ruta->foto == "sin_foto.png")
                        <div class="seccion_contenedor"><img src="{{asset('img/')."/$animal->foto"}}" alt=""></div>
                    @else
                        <div class="seccion_contenedor"><img src="{{asset('img/subidas/rutas/')."/$ruta->foto"}}"></div>
                    @endif

                <div class="contenedor__texto">
                    <h2>{{$ruta->nombre}}</h2>
                    <p>{{$ruta->descripcion}}</p>
                </div>
                @endforeach
            </div>
        </div>


    </x-slot>
</x-app-layout>
