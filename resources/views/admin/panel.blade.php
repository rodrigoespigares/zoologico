<x-app-layout>
    <x-slot name="slot">

        <div class="contenedor_panelAdmin">
            @foreach ($opciones as $key => $opcion)
                <a href="{{$opcion}}">{{$key}}</a>
            @endforeach
        </div>
</x-slot>
</x-app-layout>
