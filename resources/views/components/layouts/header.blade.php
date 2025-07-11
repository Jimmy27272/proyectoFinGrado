<header class="navbar">
    <div class="container navbar-content">
      <a href="/" class="logo-wrapper">
        <img src="/img/logoApp.svg" alt="Logo" /> <!--logo de la página-->
      </a>
      <div class="navbar-auth">
        @auth() <!-- Si el usuario está autenticado, se mostrarán los siguientes enlaces -->
        <a href="{{route('moto.create')}}" class="btn btn-add-new-moto">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            style="width: 18px; margin-right: 4px"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            />
          </svg>

          Añadir nueva moto
        </a>
        @if(auth()->user()?->isAdmin()) <!-- Si el usuario autenticado es un administrador, se mostrará el enlace al panel de administración-->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline ml-4">
                Panel Admin
            </a>
        @endif

        
        <div class="navbar-menu" tabindex="-1">
          <a href="javascript:void(0)" class="navbar-menu-handler">
            Bienvenido, {{\Illuminate\Support\Facades\Auth::user()->name}} <!-- Nombre del usuario autenticado -->
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
                d="m19.5 8.25-7.5 7.5-7.5-7.5"
              />
            </svg>
          </a>
          <ul class="submenu">
            <li>
              <a href="{{route('moto.index')}}">Mis motos</a>
            </li>
            <li>
              <a href="{{route('watchlist.index')}}">Mis motos favoritas</a>
            </li>
            <li>
              <form action="{{route('logout')}}" method="post">
                @csrf <!-- Token CSRF para proteger el formulario de cierre de sesión -->
                <button>Cerrar sesión</button>
              </form>
            </li>
          </ul>
        </div>
        @endauth

        @guest() <!-- Si el usuario no está autenticado, se mostrarán los siguientes enlaces -->
        <a href="{{route('signup')}}" class="btn btn-primary btn-signup">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            style="width: 18px; margin-right: 4px"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
            />
          </svg>

          Registrarse
        </a>
        <a href="{{route('login')}}" class="btn btn-login flex items-center">
          <svg
            style="width: 18px; fill: currentColor; margin-right: 4px"
            viewBox="0 0 1024 1024"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M426.666667 736V597.333333H128v-170.666666h298.666667V288L650.666667 512 426.666667 736M341.333333 85.333333h384a85.333333 85.333333 0 0 1 85.333334 85.333334v682.666666a85.333333 85.333333 0 0 1-85.333334 85.333334H341.333333a85.333333 85.333333 0 0 1-85.333333-85.333334v-170.666666h85.333333v170.666666h384V170.666667H341.333333v170.666666H256V170.666667a85.333333 85.333333 0 0 1 85.333333-85.333334z"
              fill=""
            />
          </svg>
          Iniciar sesión
        </a>
        @endguest
      </div>
    </div>
</header>