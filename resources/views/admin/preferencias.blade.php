<x-app-layout>
    <x-slot name="slot">
        <div class="col-sm-8 offset-sm-2">
            <h2 class="display-3">Preferencias</h2>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div><br/>
        
                @endif
                @php
                    if((isset($result))){
                        $link = url('/preferencias/guardar');
                    }else{
                        $link = url('/preferencias/crear');
                    }
                @endphp
                <form enctype="multipart/form-data" action="{{$link}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="n_clientes">Número de clientes</label>
                        <input type="text" class="form-control text-primary" name="n_clientes" id="n_clientes" value="{{isset($result->n_clientes)?$result->n_clientes:""}}">
                    </div>
                    @if (isset($result))
                        <p>Quedan aun: {{$result->n_clientes-$result->ocupadas}} personas para completar el grupo</p>
                    @endif
        
                <button type="submit" class="btn btn-primary-outline">{{isset($result)?"Editar":"Guardar"}}</button>
                </form>
        
            </div>
        </div>
    </x-slot>
</x-app-layout>
