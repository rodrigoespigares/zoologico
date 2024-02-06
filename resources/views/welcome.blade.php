<x-app-layout>
    <x-slot name="slot">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <section class="d-flex flex-column align-items-center">
                <h2 class="display-2">Hora de vivir una experiencia en la naturaleza</h2>
              </section>
        </section>
    </x-slot>
</x-app-layout>