<x-guest-layout title="Login" bodyClass="page-login">
  <h1 class="auth-page-title">¿Olvidaste la contraseña?</h1>
    
  <form action="{{route('password.email')}}" method="post">
    @csrf

    <div class="form-group @error('email') has-error @enderror">
        <input type="email" placeholder="Email" name="email"
        value="{{old('email')}}"/>

        <div class="error-message text-error">
          {{ $errors->first('email') }}
        </div>
    </div>

              <button class="btn btn-primary btn-login w-full">
                Restablecer contraseña
              </button>

              <div class="login-text-dont-have-account">
                ¿Ya tienes una cuenta? -
                <a href="{{route('login')}}"> Click aquí para iniciar sesión </a>
              </div>
  </form>
</x-guest-layout>
