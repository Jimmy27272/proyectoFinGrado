<x-app-layout>
    <main>
        <div class="container-small">
          <h1 class="moto-details-page-title">
            Editar moto: {{$moto->getTitle()}}
          </h1>
          <form
            action="{{route('moto.update', $moto)}}"
            method="POST"
            enctype="multipart/form-data"
            class="card add-new-moto-form"
          >
          @csrf
          @method('PUT')  <!-- Método PUT para actualizar -->
            <div class="form-content">
              <div class="form-details">
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('fabricante_id') has-error @enderror">
                      <label>Fabricante</label>

                      <x-select-fabricante :value="old('fabricante_id', $moto->fabricante_id)"/>
                      <p class="error-message">
                        {{ $errors->first('fabricante_id') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('modelo_id') has-error @enderror">
                      <label>Modelo</label>
                      <x-select-modelo :value="old('modelo_id', $moto->modelo_id)"/>
                      <p class="error-message">
                        {{ $errors->first('modelo_id') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('year') has-error @enderror">
                      <label class="@error('year') @enderror">Año</label>
                      <x-select-year :value="old('year', $moto->year)"/>
                      <p class="error-message">
                        {{ $errors->first('year') }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="form-group @error('moto_tipo_id') text-error has-error @enderror">
                  <label>Tipo</label>
                  <x-radio-list-moto-tipo :value="old('moto_tipo_id', $moto->moto_tipo_id)"/>
                  <p class="error-message">
                        {{ $errors->first('moto_tipo_id') }}
                    </p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('precio') has-error @enderror">
                      <label>Precio</label>
                      <input type="number" placeholder="Precio" name="precio" 
                      value="{{old('precio', $moto->precio)}}"/>
                      <p class="error-message">
                        {{ $errors->first('precio') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('vin') has-error @enderror">
                      <label>Código Vin</label>
                      <input placeholder="Código Vin" name="vin" 
                      value="{{old('vin', $moto->vin)}}"/>
                      <p class="error-message">
                        {{ $errors->first('vin') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('kilometros') has-error @enderror">
                      <label>Kilómetros (km)</label>
                      <input placeholder="Kilómetros" name="kilometros" 
                      value="{{old('kilometros', $moto->kilometros)}}"/>
                      <p class="error-message">
                        {{ $errors->first('kilometros') }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="form-group @error('cilindrada_id') has-error @enderror">
                  <label>Cilindrada</label>
                 <x-radio-list-cilindrada :value="old('cilindrada_id', $moto->cilindrada_id)"/>
                  <p class="error-message">
                        {{ $errors->first('cilindrada_id') }}
                    </p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group ">
                      <label>Comunidad</label>
                      <x-select-comunidad :value="old('comunidad_id', $moto->ciudad->comunidad_id)"/>
                      
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('ciudad_id') has-error @enderror">
                      <label>Ciudad</label>
                      <x-select-ciudad :value="old('ciudad_id', $moto->ciudad_id)"/>
                      <p class="error-message">
                        {{ $errors->first('ciudad_id') }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('direccion') has-error @enderror">
                      <label>Dirección</label>
                      <input placeholder="Dirección" name="direccion" 
                      value="{{old('direccion', $moto->direccion)}}"/>
                      <p class="error-message">
                        {{ $errors->first('direccion') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('phone') has-error @enderror">
                      <label>Teléfono</label>
                      <input placeholder="Teléfono" name="phone" 
                      value="{{old('phone', $moto->phone)}}"/>
                      <p class="error-message">
                        {{ $errors->first('phone') }}
                      </p>
                    </div>
                  </div>
                </div>
                <x-checkbox-moto-features :$moto/>
                <div class="form-group @error('descripcion') has-error @enderror">
                  <label>Descripción detallada</label>
                  <textarea rows="10" name="descripcion">{{old('descripcion', $moto->descripcion)}}</textarea>
                  <p class="error-message">
                    {{ $errors->first('descripcion') }}
                  </p>
                </div>
                <div class="form-group @error('published_at') has-error @enderror">
                   <label>Fecha de publicación</label>
                   <input type="date" name="published_at" 
                   value="{{old('published_at', (new \Carbon\Carbon($moto->published_at))->format('Y-m-d'))}}"/>
                    <p class="error-message">
                      {{ $errors->first('published_at') }}
                    </p>
                </div>
              </div>
              <div class="form-images">
                <p>
                  Actualiza tus imágenes <a href="{{route('moto.updateImages', $moto)}}">Desde aquí</a>
                </p>
                <div class="moto-form-images">
                  @foreach($moto->images as $image)
                    <a href="#" class="moto-form-image-preview">
                    <img src="{{ $image->getUrl() }}" alt="">
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="p-medium" style="width: 100%">
              <div class="flex justify-end gap-1">
                <button type="button" class="btn btn-default">Restablecer</button>
                <button class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
    </main>
</x-app-layout>
