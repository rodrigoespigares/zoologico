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
                <form enctype="multipart/form-data" action="{{url('/animales/alamacenar')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control text-primary" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="n_cientifico">Nombre Cientifico</label>
                        <input type="text" class="form-control text-primary" name="n_cientifico" id="n_cientifico">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control text-primary" name="descripcion" id="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control text-primary" name="foto" id="foto">
                    </div>
                    <div class="form-group">
                        <label for="visitable">Visitable</label>
                        <select name="visitable" id="visitable">
                            <option value="true">Si</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ruta">Ruta</label>
                        <select name="ruta" id="ruta">
                            @foreach ($rutas as $ruta)
                                <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                <button type="submit" class="btn btn-primary-outline">Añadir</button>
                </form>

            </div>
        </div>
    </x-slot>
</x-app-layout>