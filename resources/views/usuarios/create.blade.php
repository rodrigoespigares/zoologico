<div class="col-sm-8 offset-sm-2">
    <h2 class="display-3">Añadir un Usuario</h2>
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
        <form enctype="multipart/form-data" action="{{url('/usuarios/almacenar')}}" method="post">
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
                <label for="password">Password</label>
                <input type="password" class="form-control text-primary" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password_confirmator">Confirmar Password</label>
                <input type="password" class="form-control text-primary" name="password_confirmator" id="password_confirmator">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select name="rol" id="rol">
                    <option value="guia">Guia</option>
                    <option value="cliente">Cliente</option>
                    <option value="admin">Admin</option>
                    <option value="cuidador">Cuidador</option>
                </select>
            </div>


        <button type="submit" class="btn btn-primary-outline">Añadir</button>
        </form>

    </div>
</div>
