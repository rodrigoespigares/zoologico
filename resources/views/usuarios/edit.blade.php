<div class="col-sm-8 offset-sm-2">
    <h2 class="display-3">Editar un Usuario</h2>
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
        <form enctype="multipart/form-data" action="{{url('/usuarios/editar')."/$user->id"}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control text-primary" name="name" id="name" value="{{isset($user->name)?$user->name:""}}">
            </div>
            <div class="form-group">
                <label for="subname">Apellidos</label>
                <input type="text" class="form-control text-primary" name="subname" id="subname" value="{{isset($user->subname)?$user->subname:""}}">
            </div>
            <div class="form-group">
                <label for="email">Gmail</label>
                <input type="email" class="form-control text-primary" name="email" id="email" value="{{isset($user->email)?$user->email:""}}">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <input type="text" class="form-control text-primary" name="rol" id="rol" value="{{isset($user->rol)?$user->rol:""}}">
            </div>
        <button type="submit" class="btn btn-primary-outline">Guardar</button>
        </form>

    </div>
</div>
