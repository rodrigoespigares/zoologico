<div class="col-sm-8 offset-sm-2">
    <h2 class="display-3">Editar una ruta</h2>
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
        <form enctype="multipart/form-data" action="{{url('/rutas/editar')."/$ruta->id"}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control text-primary" name="nombre" id="nombre" value="{{isset($ruta->nombre)?$ruta->nombre:""}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control text-primary" name="descripcion" id="descripcion" value="{{ isset($ruta->descripcion)?$ruta->descripcion:""}}">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control text-primary" name="foto" id="foto">
            </div>
            <div class="form-group">
                <label for="visitable">Visitable</label>
                <select name="visitable" id="visitable">
                    <option value="true" {{ $ruta->visitable == true?"selected":""}}>Si</option>
                    <option value="false" {{ $ruta->visitable == false?"selected":""}}>No</option>
                </select>
            </div>

        <button type="submit" class="btn btn-primary-outline">Guardar</button>
        </form>

    </div>
</div>
