<div class="col-sm-8 offset-sm-2">
    <h2 class="display-3">Añadir un Usuario</h2>
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
        <form enctype="multipart/form-data" action="{{url('/usuarios/alamacenar')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control text-primary" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="subname">Apellidos</label>
                <input type="text" class="form-control text-primary" name="subname" id="subname">
            </div>
            <div class="form-group">
                <label for="email">Gmail</label>
                <input type="email" class="form-control text-primary" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <input type="rol" class="form-control text-primary" name="rol" id="rol">
            </div>


        <button type="submit" class="btn btn-primary-outline">Añadir</button>
        </form>

    </div>
</div>
