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
                <form enctype="multipart/form-data" action="{{url('/entradas/comprar')}}" method="POST">
                    @csrf
                    <input type="hidden" name="n_entradas" value="{{$validate['n_entradas']}}">
                    <input type="hidden" name="fecha_visita" value="{{$validate['fecha_visita']}}">
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
                            
                                <option value="{{$guia['id']}}">{{$guia['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora de la visita</label>
                        <select name="hora" id="">
                            <option value="10">10:00</option>
                            <option value="11">11:00</option>
                            <option value="12">12:00</option>
                            <option value="13">13:00</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary-outline">Siguiente</button>
                </form>
        
            </div>
        </div>
    </x-slot>
</x-app-layout>