<x-app-layout>
    <x-slot name="slot">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->get('success') }}</li>
                </ul>
            </div><br />
        @endif
        <section id="hero" class="d-flex flex-column gap-5 ">
            <div class="hero__first__div d-flex w-100 justify-content-around flex-wrap gap-5">
                <div class="contenedor__hero__img"><img src="{{ asset('img/central park.jpg') }}"></div>
                <div class=" contenedor__texto ">
                    <h2>Bienvenidos</h2>
                    <p>¡Bienvenido al Central Park Zoo!
                    Sumérgete en una aventura única en el corazón de la ciudad de Nueva York. En el Central Park Zoo, te invitamos a explorar un mundo fascinante donde la naturaleza y la vida salvaje se encuentran a solo unos pasos de distancia.
                    Nuestro zoológico, situado en el icónico Central Park, es un oasis urbano que alberga una increíble variedad de especies de todo el mundo. Desde majestuosos leones hasta adorables pingüinos, pasando por la exótica fauna de la selva tropical, cada rincón de nuestro zoológico ofrece una nueva y emocionante experiencia.
                    Además de admirar a nuestros increíbles residentes, también te invitamos a participar en una variedad de actividades educativas y divertidas. Desde charlas sobre conservación hasta encuentros cercanos con animales, hay algo para satisfacer la curiosidad de cada visitante, tanto jóvenes como adultos.</p>
                </div>
            </div>
            <div id="carouselExampleControls" class="slide carousel" data-bs-ride="carousel">
                <div class="carousel-inner hero__carrusel">
                    <div class="carousel-item active hero__carrusel__img h100">
                        <img src="{{ asset('img/hero_01.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item hero__carrusel__img h-100">
                        <img src="{{ asset('img/hero_02.jpg') }}" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item hero__carrusel__img h-100">
                        <img src="{{ asset('img/hero_03.jpg') }}" class="d-block w-100 h-100" alt="...">
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
            <section class="d-flex flex-column align-items-center gap-3">
                <h2 class="display-2 hero_h2">Hora de vivir una experiencia en la naturaleza</h2>
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
