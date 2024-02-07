<x-app-layout>
    <x-slot name="slot">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->get('success') }}</li>
                </ul>
            </div><br />
        @endif
        <section id="hero">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner hero__carrusel">
                    <div class="carousel-item active hero__carrusel__img">
                        <img src="{{ asset('img/hero_01.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item hero__carrusel__img">
                        <img src="{{ asset('img/hero_02.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item hero__carrusel__img">
                        <img src="{{ asset('img/hero_03.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <section class="d-flex flex-column align-items-center">
                <h2 class="display-2">Hora de vivir una experiencia en la naturaleza</h2>
                <p>¿Por qué ruta quieres empezar?</p>
                <div class="container__all_cards">
                    @for ($i = 0; $i < 3; $i++)
                        @php
                            if($rutas[$i]->foto == "sin_foto.png"){
                                $foto = url('img/'.$rutas[$i]->foto);
                            }else{
                                $foto = url('img/subidas/rutas'."/".$rutas[$i]->foto);
                            }

                        @endphp
                        @if ($rutas[$i]->visitable == 1)
                            @php
                                if($rutas[$i]->foto == "sin_foto.png"){
                                    $foto = url('img/'.$rutas[$i]->foto);
                                }else{
                                    $foto = url('img/subidas/rutas'."/".$rutas[$i]->foto);
                                }
            
                            @endphp
                            <a class="flip-container" href="/rutas/ver/{{$rutas[$i]->id}}">
                                <div class="card">
                                    <div class="frente">
                                        <div class="contenedor__img"><img src="{{$foto}}" alt=""></div>
                                    </div>
                                    <div class="dorso">
                                        <h3 style="height: 10%;  margin-top: 30px">{{$rutas[$i]->nombre}}</h3>
                                        <p>{{$rutas[$i]->descripcion}}</p>
                                    </div>
                                </div>
                            </a>
                        @else
                            @php
                                $i--;
                            @endphp
                        @endif
                    @endfor
                </div>
                <a href="/rutas" class="btn btn-primary">VER MÁS</a>
            </section>
        </section>
        @php
            if(session()->has("success")){
                header("Refresh:2");
            }
        @endphp
    </x-slot>
</x-app-layout>
