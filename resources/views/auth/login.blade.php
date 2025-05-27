<x-guest-layout title="Login" bodyClass="page-login">
  <h1 class="auth-page-title">Iniciar sesión</h1>
    
  <form action="{{route('login.store')}}" method="post">
    @csrf

    <div class="form-group @error('email') has-error @enderror">
      <input type="email" placeholder="Email" name="email"
      value="{{old('email')}}"/>
      <div class="error-message text-error">
        {{ $errors->first('email') }}
      </div>
    </div>
    

    <div class="form-group @error('password') has-error @enderror">
      <input type="password" placeholder="Contraseña" name="password"/>
      <div class="error-message text-error">
        {{ $errors->first('password') }}
      </div>
    </div>
    

    <div class="text-right mb-medium">
      <a href="{{route('password.request')}}" class="auth-page-password-reset"
        >¿Olvidaste la contraseña?</a
      >
    </div>

    <button class="btn btn-primary btn-login w-full">Iniciar sesión</button>
  </form>

  <x-slot:footerLink>
    ¿No tienes una cuenta? -
    <a href="/signup.html"> Click aquí para crear una</a>
  </x-slot:footerLink>
</x-guest-layout>


