<x-guest-layout title="Signup" bodyClass="page-signup">
  <h1 class="auth-page-title">Registrarse</h1>

  <form action="{{route('signup.store')}}" method="post">
    @csrf
    <div class="form-group @error('name') has-error @enderror">
      <input type="text" placeholder="Nombre" name="name"
      value="{{old('name')}}"/>
     <div class="error-message text-error">
            {{ $errors->first('name') }}
      </div>
    </div>

    <div class="form-group @error('email') has-error @enderror">
      <input type="email" placeholder="Email" name="email"
      value="{{old('email')}}"/>
    <div class="error-message text-error">
            {{ $errors->first('email') }}
      </div>
    </div>

    <div class="form-group @error('phone') has-error @enderror">
      <input type="text" placeholder="Teléfono" name="phone"
      value="{{old('phone')}}"/>
    <div class="error-message text-error">
            {{ $errors->first('phone') }}
      </div>
    </div>

    <div class="form-group @error('password') has-error @enderror">
      <input type="password" placeholder="Contraseña" name="password"/>
    <div class="error-message text-error">
            {{ $errors->first('password') }}
      </div>
    </div>

    <div class="form-group">
      <input type="password" placeholder="Repetir Contraseña" name="password_confirmation"/>
    </div>
    
    
    
    
    <button class="btn btn-primary btn-login w-full">Registrarse</button>

  </form>

    

  <x-slot:footerLink>
    ¿Tienes una cuenta? -
    <a href="{{route('login')}}"> Click aquí para iniciar sesión </a>
  </x-slot:footerLink>
</x-guest-layout>