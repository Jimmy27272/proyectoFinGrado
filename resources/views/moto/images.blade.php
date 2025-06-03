<x-app-layout bodyClass="page-my-moto">
    <main>
        <div>
          <div class="container">
            <h1 class="moto-details-page-title">
                Actualizar imágenes de la moto: {{$moto->getTitle()}}
            </h1>
            <div class="moto-images-wrapper">
                <form
                    action="{{route('moto.updateImages', $moto)}}"
                    method="POST" class="card p-medium form-update-images" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')  <!-- Método PUT para actualizar -->
                    
                    

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Borrar</th>
                      <th>Imagen</th>
                      <th>Posición</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($moto->images as $image)
                    <tr>
                      <td>
                        <input type="checkbox" name="delete_images[]"
                        id="delete_image_{{$image->id}}"
                        value="{{$image->id}}">
                      </td>
                      <td>
                        <img
                          src="{{$image->getUrl()}}"
                          alt=""
                          class="my-motos-img-thumbnail"
                        />
                      </td>
                      <td>
                        <input type="number" 
                        name= "positions[{{$image->id}}]" 
                        value="{{old('positions.'.$image->id, $image->position)}}"/>
                      </td>
                      
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3" class="text-center p-large">
                        No hay imágenes para esta moto.
                      </td>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="p-medium">
		    <div class="flex justify-end">
		        <button class="btn btn-primary">Actualizar Imágenes</button>
		    </div>
		</div>
            </form>
            <form action="{{route('moto.addImages', $moto)}}" method='POST' class="card form-images p-medium mb-large" enctype="multipart/form-data">
                @csrf
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
                 <div class="p-medium">
		    <div class="flex justify-end">
		        <button class="btn btn-primary">Añadir Imágenes</button>
		    </div>
            </form>
            </div>
          </div>
        </div>
    </main>
</x-app-layout>
