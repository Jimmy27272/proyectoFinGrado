<x-app-layout title="Home Page">
 
  <!-- Home Slider -->
  <section class="hero-slider">
    <!-- Carousel wrapper -->
    <div class="hero-slides">
      <!-- Diapositiva 1 -->
      <div class="hero-slide">
        <div class="container">
          <div class="slide-content">
            <h1 class="hero-slider-title">
              Las <strong>Mejores Motos</strong> <br />
              de tu región
            </h1>
            <div class="hero-slider-content">
              <p>
                Utiliza una potente herramienta de búsqueda para encontrar la moto 
                que deseas según múltiples criterios: Marca, Modelo, Año, Rango de precios, etc...
              </p>

              <a href="{{ route('moto.search') }}" class="btn btn-hero-slider">Encuentra tu moto</a>
            </div>
          </div>
          <div class="slide-image">
            <img src="/img/motoApp.jpg" alt="" class="img-responsive" /> <!--imagen de moto página principal-->
          </div>
        </div>
      </div>
      <!-- Diapositiva 2 -->
      <div class="hero-slide">
        <div class="flex container">
          <div class="slide-content">
            <h2 class="hero-slider-title">
              ¿Quieres <br />
              <strong>vender tu moto?</strong>
            </h2>
            <div class="hero-slider-content">
              <p>
                Publica tu moto fácilmente en nuestra interfaz, descríbela, sube fotos y el comprador perfecto la encontrará.
              </p>

              <a href="{{ route('moto.create') }}" class="btn btn-hero-slider">Añade tu moto</a>
            </div>
          </div>
          <div class="slide-image">
            <img src="/img/motoApp.jpg" alt="" class="img-responsive" /> <!--imagen de moto página principal-->
          </div>
        </div>
      </div>
      <button type="button" class="hero-slide-prev">
        <svg
          style="width: 18px"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 6 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 1 1 5l4 4"
          />
        </svg>
      </button>
      <button type="button" class="hero-slide-next">
        <svg
          style="width: 18px"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 6 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m1 9 4-4-4-4"
          />
        </svg>
      </button>
    </div>
  </section>

  <main>
    <x-search-form/>
    <!-- Últimos anuncios de motos publicados -->
    <section>
      <div class="container">
        <h2>Últimas motos publicadas</h2>
        <div class="moto-items-listing">
          @foreach($motos as $moto)
            <x-moto-item :$moto :is-in-watchlist="$moto->favouredUsers->contains(\Illuminate\Support\Facades\Auth::user())"/> <!-- Componente para mostrar últimas publicaciones y las marcadas como favoritas por el usuario autenticado -->
          @endforeach
        </div>
      </div>
    </section>
  </main>

</x-app-layout>