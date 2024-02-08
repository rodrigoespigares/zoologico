<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-black">
            {{ __('Información del perfil') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
        <div>
            <p><span>Nombre de usuario:</span> {{Auth::user()->name}}</p>
        </div>
</section>
