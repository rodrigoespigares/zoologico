
<x-app-layout>
    <x-slot name="slot">

    <div class="container__all_cards">
        @foreach ($resultados as $resultado)
            @if ($resultado->visitable == 1)
                @php
                    if($resultado->foto == "sin_foto.png"){
                        $foto = url('img/'.$resultado->foto);
                    }else{
                        $foto = url('img/subidas/rutas'."/$resultado->foto");
                    }

                @endphp
                <a class="flip-container" href="/rutas/ver/{{$resultado->id}}">
                    <div class="card">
                        <div class="frente">
                            <div class="contenedor__img"><img src="{{$foto}}" alt=""></div>
                        </div>
                        <div class="dorso">
                            <h3 style="height: 10%;  margin-top: 30px">{{$resultado->nombre}}</h3>
                            <p>{{$resultado->descripcion}}</p>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
        <!--
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Foto</th>
        </tr>
        @foreach ($resultados as $resultado)


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
    -->
</x-slot>
</x-app-layout>
