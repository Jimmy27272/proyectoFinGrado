<x-app-layout>
    <main>
      <section>
        <div class="container">
          <h2>Mis Motos Favoritas</h2>
          @if($motos->total() > 0)
              <div class="text-right mb-4">
                <p>
                  Mostrando {{$motos->firstItem()}} - {{$motos->lastItem()}} de {{$motos->total()}} motos
                </p>
              </div>
            @endif
          <div class="moto-items-listing">
            @foreach($motos as $moto)
                 <x-moto-item :$moto :isInWatchlist="true"/>
            @endforeach
          </div>

          @if($motos->count() ===0)
            <div class="text-center p-large">
              No tienes motos favoritas aún.
            </div>
          @endif



          {{$motos->onEachSide(1)->links()}}
          
        </div>
      </section>
    </main>
</x-app-layout>