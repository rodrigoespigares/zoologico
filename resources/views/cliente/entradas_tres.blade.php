<x-app-layout>
    <x-slot name="slot">
        <div class="col-sm-8 offset-sm-2">
            <h2 class="display-3">Confirme su compra</h2>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                    
                @endif
                @auth
                    <form enctype="multipart/form-data" action="{{url('/entradas/comprar')}}" method="POST">
                        @csrf
                        <input type="hidden" name="n_entradas" value="{{$validate['n_entradas']}}">
                        <input type="hidden" name="fecha_visita" value="{{$validate['fecha_visita']}}">
                        <input type="hidden" name="hora" value="{{$validate['hora']}}">
                        <input type="hidden" name="ruta" value="{{$validate['ruta']}}">
                        <input type="hidden" name="guia" value="{{$validate['guia']}}">
                        <input type="hidden" name="total" value="{{$validate['total']}}">
                        <p>Hola {{Auth::user()->name}}, vamos a confirmar su compra</p>
                        <p>Son un total de <span>{{$validate['n_entradas']}}</span> a 15€ cada entrada, hace un total de <span>{{$validate['total']}}€</span>.</p>
                        <p>Les esperamos el día <span>
                            @php
                                $fechaOriginal = $validate['fecha_visita'];
                                $fechaDateTime = DateTime::createFromFormat('Y/m/d', $fechaOriginal);
                                if ($fechaDateTime !== false) {
                                    echo $fechaDateTime->format('d/m/Y');
                                } else {
                                    echo $validate['fecha_visita'];
                                }
                            @endphp    
                        
                        </span> a las <span>{{$validate['hora']}}h.</span></p>
                        <p>Revise su correo {{Auth::user()->email}} para obtener las entradas:</p>
                    <button type="submit" class="btn btn-primary-outline">Comprar</button>
                    </form>
                @else
                    <a href="/login">
                        <x-primary-button class="ms-3 login__btn">
                            {{ __('Entrar') }}
                        </x-primary-button>
                    </a>
                    <a href="/register">
                        <x-primary-button class="ms-3 login__btn">
                            {{ __('Registrarse') }}
                        </x-primary-button>
                    </a>
                @endauth

        
            </div>
        </div>
    </x-slot>
</x-app-layout>