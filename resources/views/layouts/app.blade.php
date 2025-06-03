
   @props(['title' => '', 'bodyClass' => null])
   
   
   <x-base-layout :$title :$bodyClass>
        <x-layouts.header /> <!-- Incluye el encabezado de la aplicación -->

        @session('success') <!-- Si hay un mensaje de éxito en la sesión, se mostrará aquí -->
          <div class='container my-large'>
               <div class="success-message">
                    {{ session('success') }}
               </div>
          </div>
        @endsession
        {{ $slot }} <!-- Aquí se insertará el contenido de las vistas que extiendan este layout -->
   </x-base-layout>

    
   
