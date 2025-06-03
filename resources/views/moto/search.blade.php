<x-app-layout>
    <main>
        <section>
          <div class="container">
            <div class="flex items-center justify-between mb-medium">
              <div class="flex items-center">
                <button class="show-filters-button flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 20px">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                  </svg>
                  Filtros
                </button>
                <h2>Define tus criterios de búsqueda</h2>
              </div>
    
              <select class="sort-dropdown">
                <option value="">Ordenar por</option>
                <option value="precio">Precio Asc</option>
                <option value="-precio">Precio Desc</option>
                <option value="year">Año Asc</option>
                <option value="-year">Año Desc</option>
                <option value="kilometros">Kilómetros Asc</option>
                <option value="-kilometros">Kilómetros Desc</option>
                <option value="published_at">Más nuevas</option>
                <option value="-published_at">Más antiguas</option>

              </select>
            </div>
            <div class="search-moto-results-wrapper">
              <div class="search-moto-sidebar">
                <div class="card card-found-moto">
                  <p class="m-0">Encontradas <strong>{{$motos->total()}}</strong> motos</p>
    
                  <button class="close-filters-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 24px">
                      <path fill-rule="evenodd"
                        d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
    
                <section class="find-a-moto-inputs">
                  <form action="" method="GET" class="find-a-moto-form card flex p-medium">
                    <div class="find-a-moto-inputs">
                      <div class="form-group">
                        <label class="mb-medium">Fabricante</label>
                        <x-select-fabricante :value="request('fabricante_id')" /> <!-- componente fabricante con campo marcado al recargar la página -->
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Modelo</label>
                        <x-select-modelo :value="request('modelo_id')"/>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Tipo</label>
                        <x-select-moto-tipo :value="request('moto_tipo_id')"/>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Año</label>
                        <div class="flex gap-1">
                          <input type="number" placeholder="Año desde" name="year_from"
                          value="{{request('year_from')}}" />
                          <input type="number" placeholder="Año hasta" name="year_to" 
                          value="{{request('year_to')}}"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Precio</label>
                        <div class="flex gap-1">
                          <input type="number" placeholder="Precio desde" name="precio_from" 
                          value="{{request('precio_from')}}"/>
                          <input type="number" placeholder="Precio hasta" name="precio_to" 
                          value="{{request('precio_to')}}"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Kilómetros</label>
                        <div class="flex gap-1">
                         <x-select-kilometros :value="request('kilometros')"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Comunidad</label>
                        <x-select-comunidad :value="request('comunidad_id')"/>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Ciudad</label>
                        <x-select-ciudad :value="request('ciudad_id')"/>
                      </div>
                      <div class="form-group">
                        <label class="mb-medium">Cilindrada</label>
                        <x-select-cilindrada :value="request('cilindrada_id')"/>
                      </div>
                    </div>
                    <div class="flex">
                      <button type="button" class="btn btn-find-a-moto-reset">
                        Restablecer
                      </button>
                      <button class="btn btn-primary btn-find-a-moto-submit">
                        Buscar
                      </button>
                    </div>
                  </form>
                </section>
              </div>
    
              <div class="search-moto-results">
                @if($motos->count())
                <div class="moto-items-listing">
                  @foreach($motos as $moto)
                    <x-moto-item :$moto :is-in-watchlist="$moto->favouredUsers->contains(\Illuminate\Support\Facades\Auth::user())"/> <!-- se muestran las motos marcadas como favoritas si el usuario está logueado -->
                  @endforeach
                </div>
                @else
                  <div class="p-large">
                    No se encontraron resultados para tu búsqueda.
                  </div> 
                @endif
                {{$motos->onEachSide(1)->links('pagination')}}  <!-- Paginación personalizada -->
                
              </div>
            </div>
          </div>
        </section>
    </main>
</x-app-layout>
