<x-app-layout>
    <main>
        <div class="container-small">
          <h1 class="moto-details-page-title">Añadir nueva moto</h1>
          <form
            action="{{route('moto.store')}}"
            method="POST"
            enctype="multipart/form-data"
            class="card add-new-moto-form"
          >
            @csrf <!-- Directiva para proteger el formulario contra ataques CSRF -->
            <div class="form-content">
              <div class="form-details">
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('fabricante_id') has-error @enderror">
                      <label>Fabricante</label>

                      <x-select-fabricante :value="old('fabricante_id')"/> <!--componente fabricante con campo marcado al recargar la página-->
                      <p class="error-message">
                        {{ $errors->first('fabricante_id') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('modelo_id') has-error @enderror">
                      <label>Modelo</label>
                      <x-select-modelo :value="old('modelo_id')"/>
                      <p class="error-message">
                        {{ $errors->first('modelo_id') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('year') has-error @enderror">
                      <label class="@error('year') @enderror">Año</label>
                      <x-select-year :value="old('year')"/>
                      <p class="error-message">
                        {{ $errors->first('year') }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="form-group @error('moto_tipo_id') text-error has-error @enderror">
                  <label>Tipo</label>
                  <x-radio-list-moto-tipo :value="old('moto_tipo_id')"/>
                  <p class="error-message">
                        {{ $errors->first('moto_tipo_id') }}
                    </p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('precio') has-error @enderror">
                      <label>Precio</label>
                      <input type="number" placeholder="Precio" name="precio" 
                      value="{{old('precio')}}"/>
                      <p class="error-message">
                        {{ $errors->first('precio') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('vin') has-error @enderror">
                      <label>Código Vin</label>
                      <input placeholder="Código Vin" name="vin" 
                      value="{{old('vin')}}"/>
                      <p class="error-message">
                        {{ $errors->first('vin') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('kilometros') has-error @enderror">
                      <label>Kilómetros (km)</label>
                      <input placeholder="Kilómetros" name="kilometros" 
                      value="{{old('kilometros')}}"/>
                      <p class="error-message">
                        {{ $errors->first('kilometros') }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="form-group @error('cilindrada_id') has-error @enderror">
                  <label>Cilindrada</label>
                 <x-radio-list-cilindrada :value="old('cilindrada_id')"/>
                  <p class="error-message">
                        {{ $errors->first('cilindrada_id') }}
                    </p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group ">
                      <label>Comunidad</label>
                      <x-select-comunidad :value="old('comunidad_id')"/>
                      
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('ciudad_id') has-error @enderror">
                      <label>Ciudad</label>
                      <x-select-ciudad :value="old('ciudad_id')"/>
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
                      value="{{old('direccion')}}"/>
                      <p class="error-message">
                        {{ $errors->first('direccion') }}
                      </p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('phone') has-error @enderror">
                      <label>Teléfono</label>
                      <input placeholder="Teléfono" name="phone" 
                      value="{{old('phone')}}"/>
                      <p class="error-message">
                        {{ $errors->first('phone') }}
                      </p>
                    </div>
                  </div>
                </div>
                <x-checkbox-moto-features />
                <div class="form-group @error('descripcion') has-error @enderror">
                  <label>Descripción detallada</label>
                  <textarea rows="10" name="descripcion">{{old('descripcion')}}</textarea>
                  <p class="error-message">
                    {{ $errors->first('descripcion') }}
                  </p>
                </div>
                
              </div>
              <div class="form-images">
                @foreach ($errors->get('images.*') as $imageErrors) 
                  @foreach ($imageErrors as $err)
                    <div class="text-error mb-small">
                      {{ $err }}
                    </div>
                  @endforeach
                    
                @endforeach
                <div class="form-image-upload">
                  <div class="upload-placeholder">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      style="width: 48px"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                      />
                    </svg>
                  </div>
                  <input id="motoFormImageUpload" type="file" name="images[]" multiple />
                </div>
                <div id="imagePreviews" class="moto-form-images"></div>
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
