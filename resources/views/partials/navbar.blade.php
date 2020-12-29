<nav class="navbar navbar-expand-md navbar-dark mb-4 fixed-top">
  <div class="lft_hd">
    <a href="{{ route('home') }}"><img src="{{Storage::url("logo3.png")}}" alt=""/></a>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
            @guest  {{-- Opciones que se muestran a usuarios NO loggeados --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('catalogo') }}">Tienda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('servicios') }}">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('acerca') }}">Acerca de Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contactanos') }}">Contáctanos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('catalogo') }}">Tienda</a>
      </li>
            @else {{-- Opciones para usuarios Loggeados --}}
        @if(auth()->user()->rol === 'admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('catalogo') }}">Tienda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('servicios') }}">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('acerca') }}">Acerca de Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contactanos') }}">Contáctanos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admine') }}">Administración</a>
      </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('catalogo') }}">Tienda</a>
      </li> 
    <li class="nav-item">
        <a class="nav-link" href="{{ route('servicios') }}">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('acerca') }}">Acerca de Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contactanos') }}">Contáctanos</a>
      </li>
  @endif
      
    @endguest
    </ul>
                        <!-- Authentication Links -->
                        <ul class="navbar-nav ml-auto">
                          @guest
                            <li class="nav-item">
                               <a class="nav-link" href="{{ route('login') }}">{{ __('Inicio de sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                            </li>
                        </ul>
                            @endif
                        @else
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="#"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      {{ __('Salir') }}
                                   </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
          </div>
</nav>
