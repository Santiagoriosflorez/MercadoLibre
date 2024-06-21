{{-- Menu --}}
<nav class="navbar navbar-expand-md shadow-sm" style="background-color: #B5E742">
    <div class="container">
        <a class="navbar-brand alike-angular-regular" href="{{ url('/') }}">{{ env('APP_NAME') }}</a>
        {{-- Haburguesa --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Route::has('product.page'))
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categoría
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="dropdown-item" href="{{ route('product.page', ['category_id' => 1]) }}">Calzado
                            Deportivo</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('product.page', ['category_id' => 2]) }}">Ropa
                            Deportiva</a>
                    </li>
                </ul>
            </div>
        @endif
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
			<ul class="navbar-nav me-auto">
				<search-component></search-component>
			</ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link dropdown-togle" href="{{ route('login') }}">Iniciar Sesion</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>
                    @endif


                    @if (Route::has('cart.index'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping fa-lg"
                                    style="color: #000000;"></i></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @role('admin')
                                {{-- User --}}
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    Usuarios
                                </a>
                            @endrole

                            @role('admin')
                                {{-- Category and product --}}
                                <a class="dropdown-item" href="{{ route('category.index') }}">
                                    Categoria y Productos
                                </a>
                            @endrole

                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                Sesion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping fa-lg"
								style="color: #000000;"></i></a>
					</li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


<!--
<div>
 <input v-model="buscador" class="form-control"/>
 <button @click="buscarproducto" type="button" class="btn btn-primary">Buscar</button>
</div>


-->
