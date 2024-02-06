<x-app-layout>
    <x-slot name="slot">

    <div class="container__all_cards">
        @foreach ($resultados as $resultado)
            @if ($resultado->visitable == 1 && in_array($resultado->ruta_id,$rutas->toArray()))
                <a class="flip-container" href="/animales/ver/{{$resultado->id}}">
                    <div class="card">
                        <div class="frente">
                            <div class="contenedor__img"><img src="{{url('img/subidas/animales/'.$resultado->foto)}}" alt=""></div>
                        </div>
                        <div class="dorso">
                            <h3>{{$resultado->nombre}}</h3>
                            <h4>{{$resultado->n_cientifico}}</h4>
                            <p>{{$resultado->descripcion}}</p>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</x-slot>
</x-app-layout>
