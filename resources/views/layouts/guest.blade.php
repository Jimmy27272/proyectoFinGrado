@props(['title' => '','bodyClass' => ''])


<x-base-layout :$title :$bodyClass>

    <main>
        <div class="container-small page-login">
          <div class="flex" style="gap: 5rem">
            <div class="auth-page-form">
              <div class="text-center">
                <a href="/">
                  <img src="/img/logoApp.svg" alt="" />
                </a>
              </div>

              @session('success') <!-- Si hay un mensaje de éxito en la sesión, se mostrará aquí -->
              <div class="my-large">
                <div class="success-message">
                  {{ session('success') }}
                </div>
              </div>
              @endsession
             {{ $slot }} <!-- Aquí se insertará el contenido de las vistas que extiendan este layout -->

         
              @if ($errors->any()) <!-- Si hay errores de validación, se mostrarán aquí -->
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

             @isset($footerLink) <!-- Si se ha definido el slot footerLink, se mostrará aquí -->
              <div class="login-text-dont-have-account">
                {{$footerLink}}
              </div>
              @endisset
            </div>
            <div class="auth-page-image">
              <img src="/img/motoApp.jpg" alt="" class="img-responsive" />
            </div>
          </div>
        </div>
    </main>
</x-base-layout> 