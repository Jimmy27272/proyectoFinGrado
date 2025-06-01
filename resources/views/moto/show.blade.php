<x-app-layout>
    <main>
        <div class="container">
          <h1 class="moto-details-page-title">{{$moto->fabricante->name}} {{$moto->modelo->name}} - {{$moto->year}}</h1>
          <div class="moto-details-region">{{$moto->ciudad->name}} - {{$moto->published_at}}</div>
  
          <div class="moto-details-content">
            <div class="moto-images-and-description">
              <div class="moto-images-carousel">
                <div class="moto-image-wrapper">
                  <img
                    src="{{$moto->primaryImage?->getUrl() ?:'/img/No_Image_Available.jpg'}}"
                    alt=""
                    class="moto-active-image"
                    id="activeImage"
                  />
                </div>
                <div class="moto-image-thumbnails">
                  @foreach($moto->images as $image)
                    <img src="{{$image->getUrl()}}" alt="" />
                  @endforeach
                </div>
                <button class="carousel-button prev-button" id="prevButton">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    style="width: 64px"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15.75 19.5 8.25 12l7.5-7.5"
                    />
                  </svg>
                </button>
                <button class="carousel-button next-button" id="nextButton">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    style="width: 64px"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m8.25 4.5 7.5 7.5-7.5 7.5"
                    />
                  </svg>
                </button>
              </div>
  
              <div class="card moto-detailed-description">
                <h2 class="moto-details-title">Descripción detallada</h2>
                  {!!$moto->descripcion!!} 
              </div>
  
              <div class="card moto-detailed-description">
                <h2 class="moto-details-title">Especificaciones</h2>
  
                <ul class="car-specifications">
                  <x-moto-specification :value="$moto->features->garantia">
                    Garantía oficial
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->unico_propietario">
                    Único propietario
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->limitable">
                    Limitable carnet A2
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->abs">
                    ABS
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->control_crucero">
                    Control de crucero
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->bluetooth">
                    Conectividad Bluetooth
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->puños">
                    Puños calefactables
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->gps">
                    GPS
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->alforjas">
                    Alforjas
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->control_traccion">
                    Control de tracción
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->led">
                    Luces LED
                  </x-moto-specification>
                  <x-moto-specification :value="$moto->features->usb">
                    Cargador USB
                  </x-moto-specification>
                </ul>
              </div>
            </div>
            <div class="moto-details card">
              <div class="flex items-center justify-between">
                <p class="moto-details-price">{{$moto->precio}}€</p>
                <button class="btn-heart">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    style="width: 20px"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                    />
                  </svg>
                </button>
              </div>
  
              <hr />
              <table class="moto-details-table">
                <tbody>
                  <tr>
                    <th>Fabricante</th>
                    <td>{{$moto->fabricante->name}}</td>
                  </tr>
                  <tr>
                    <th>Modelo</th>
                    <td>{{$moto->modelo->name}}</td>
                  </tr>
                  <tr>
                    <th>Año</th>
                    <td>{{$moto->year}}</td>
                  </tr>
                  <tr>
                    <th>Vin</th>
                    <td>{{$moto->vin}}</td>
                  </tr>
                  <tr>
                    <th>Kilómetros</th>
                    <td>{{$moto->kilometros}}</td>
                  </tr>
                  <tr>
                    <th>Tipo de moto</th>
                    <td>{{$moto->MotoTipo->name}}</td>
                  </tr>
                  <tr>
                    <th>Cilindrada</th>
                    <td>{{$moto->cilindrada->name}}</td>
                  </tr>
                  <tr>
                    <th>Dirección</th>
                    <td>{{$moto->direccion}}</td>
                  </tr>
                </tbody>
              </table>
              <hr />
  
              <div class="flex gap-1 my-medium">
                <img
                  src="/img/avatar.png"
                  alt=""
                  class="moto-details-owner-image"
                />
                <div>
                  <h3 class="moto-details-owner">{{$moto->owner->name}}</h3>
                  <div>{{$moto->owner->motos()->count()}} motos</div>
                </div>
              </div>
              <div class="moto-details-phone">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 16px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                  />
                </svg>
  
                {{$moto->phone}}
                <span class="moto-details-phone-view">Número Teléfono</span>
              </div>
            </div>
          </div>
        </div>
    </main>
</x-app-layout>
