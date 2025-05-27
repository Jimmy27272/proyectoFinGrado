<x-guest-layout title="Login" bodyClass="page-login">
  <h1 class="auth-page-title">Restablecer contraseña</h1>
    
  <form action="{{route('password.update')}}" method="post">
    @csrf

    <input type="hidden" name="token" value="{{request('token') }}">

    <div class="form-group @error('email') has-error @enderror">
        <input type="email" readonly name="email" value="{{request('email')}}"/>

        <div class="error-message text-error">
          {{ $errors->first('email') }}
        </div>
    </div>

    <input type="hidden" name="email" value="{{request('email') }}">

    <div class="form-group @error('password') has-error @enderror">
        <input type="password" placeholder="Nueva contraseña" name="password"
        value="{{old('password')}}"/>

        <div class="error-message text-error">
          {{ $errors->first('password') }}
        </div>
    </div>

    <div class="form-group">
        <input type="password" placeholder="Repite la nueva contraseña" name="password_confirmation"/>
    </div>

              <button class="btn btn-primary btn-login w-full">
                Restablecer contraseña
              </button>
  </form>
</x-guest-layout>
