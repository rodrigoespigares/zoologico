<x-app-layout>
    <x-slot name="slot">
        <div class="col-sm-8 offset-sm-2">
            <h2 class="display-3">Añadir un animal</h2>
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
                <form enctype="multipart/form-data" action="{{url('/comprar')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="n_entradas">Número de entradas</label>
                        <input type="text" class="form-control text-primary" name="n_entradas" id="n_entradas">
                    </div>
                    <div class="form-group">
                        <label for="fecha_visita">Fecha de la visita</label>
                        <input oninput="{{date("Y-m-d", strtotime("+3 day"))}}" min="{{date("Y-m-d", strtotime("+1 day"))}}" max="{{date("Y-m-d", strtotime("+14 days"))}}" type="date" class="form-control text-primary" name="fecha_visita" id="fecha_visita">
                    </div>
                    <div class="form-group">
                        <label for="ruta">Rutas disponibles</label>
                        <select name="ruta" id="ruta">
                            @foreach ($rutas as $ruta)
                                <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="guia">Guias disponibles</label>
                        <select name="guia" id="visitable">
                            @foreach ($guias as $guia)
                            
                                <option value="{{$guia->id}}">{{$guia->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                <button type="submit" class="btn btn-primary-outline">Comprar</button>
                </form>
        
            </div>
        </div>
    </x-slot>
</x-app-layout>