<div class="col-sm-8 offset-sm-2">
    <h2 class="display-3" >Añadir una Ruta</h2>
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
        <form enctype="multipart/form-data" action="{{url('/rutas/alamacenar')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control text-primary" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control text-primary" name="descripcion" id="descripcion">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control text-primary" name="foto" id="foto">
            </div>

        <button type="submit" class="btn btn-primary-outline">Añadir</button>
        </form>

    </div>
</div>
