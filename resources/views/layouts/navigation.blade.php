<header>
    <div class="header__logo">
        <a href="/" class="header__logo">
            <h1>Pruebas</h1>
        </a>
    </div>
    <nav class="top-nav header__nav">
        <input id="menu-toggle" type="checkbox" v-model="check" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li class="header__nav__container"><a href="#" class="header__nav__container__link">Rutas</a></li>
            <li class="header__nav__container"><a href="#" class="header__nav__container__link">Entradas</a></li>
            <li class="header__nav__container"><a href="#" class="header__nav__container__link">Animales</a></li>
        </ul>
    </nav>

    <div class="header__userInteraction">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
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