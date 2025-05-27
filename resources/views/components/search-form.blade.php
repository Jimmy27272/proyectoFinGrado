<section>
    <div class="container">
      <form
        action="{{route('moto.search')}}"
        method="GET"
        class="find-a-moto-form card flex p-medium"
      >
        <div class="find-a-moto-inputs">
          <div>
            <x-select-fabricante />
          </div>
          <div>
            <x-select-modelo />
          </div>
          <div>
            <x-select-comunidad />
          </div>
          <div>
            <x-select-ciudad />
          </div>
          <div>
            <x-select-moto-tipo />
          </div>
          <div>
            <input type="number" placeholder="Año desde" name="year_from" />
          </div>
          <div>
            <input type="number" placeholder="Año hasta" name="year_to" />
          </div>
          <div>
            <input type="number" placeholder="Precio desde" name="precio_from" />
          </div>
          <div>
            <input type="number" placeholder="Precio hasta" name="precio_to" />
          </div>
          <div>
            <x-select-cilindrada />
          </div>
        </div>
        <div>
          <button type="button" class="btn btn-find-a-moto-reset">
            Restablecer
          </button>
          <button class="btn btn-primary btn-find-a-moto-submit">
            Buscar
          </button>
        </div>
      </form>
    </div>
</section>