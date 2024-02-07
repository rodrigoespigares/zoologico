<x-app-layout>
    <x-slot name="slot">
        <div class="col-sm-8 offset-sm-2">
            <h2 class="display-3">Registra tus entradas</h2>
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
                <form enctype="multipart/form-data" action="{{url('/confirma')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="n_entradas">Número de entradas</label>
                        <input type="text" class="form-control text-primary" name="n_entradas" id="n_entradas">
                    </div>
                    <div class="form-group">
                        <label for="fecha_visita">Fecha de la visita</label>
                        <input oninput="{{date("Y-m-d", strtotime("+3 day"))}}" min="{{date("Y-m-d", strtotime("+1 day"))}}" max="{{date("Y-m-d", strtotime("+14 days"))}}" type="date" class="form-control" name="fecha_visita" id="fecha_visita">
                    </div>
                    <div class="form-group">
                        <label for="hora">Hora de la visita</label>
                        <select class="form-control" name="hora" id="">
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