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

              @session('success')
              <div class="my-large">
                <div class="success-message">
                  {{ session('success') }}
                </div>
              </div>
              @endsession
             {{ $slot }}

             @isset($footerLink)
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