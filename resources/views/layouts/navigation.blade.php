<header>
    <div class="header__logo">
        <a href="/" class="header__logo">
            <h1>Central Park Zoo</h1>
        </a>
    </div>
    <nav class="top-nav header__nav">
        <input id="menu-toggle" type="checkbox" v-model="check" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li class="header__nav__container"><a href="/rutas" class="header__nav__container__link">Rutas</a></li>
            <li class="header__nav__container"><a href="/entradas" class="header__nav__container__link">Entradas</a></li>
            <li class="header__nav__container"><a href="/animales" class="header__nav__container__link">Animales</a></li>
            @auth
                <li class="header__nav__container"><a href="/mis_visitas" class="header__nav__container__link">Mis visitas</a></li>
                @if (auth()->user()->obtenerRol()!='cliente')
                    <li class="header__nav__container"><a href="/administrador" class="header__nav__container__link">Panel administrador</a></li>
                @endif
            @endauth
        </ul>
    </nav>
    <div class="header__userInteraction">
        @if (Route::has('login'))
            <div>
                @auth
                    @include('layouts.usuario')
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>