@extends('layout.base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Crear usuario</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>

          <div class="form-group">
              <label for="apellido">Apellido:</label>
              <input type="text" class="form-control" name="apellido"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="username">Nombre de usuario:</label>
              <input type="text" class="form-control" name="username"/>
          </div>
          <div class="form-group">
              <label for="clave">Contraseña:</label>
              <input type="password" class="form-control" name="clave"/>
          </div>                   
          <div class="form-group">
              <label for="imagen">foto de perfil:</label>
              <input type="file" class="form-control" name="imagen"/>
          </div>                   
          <button type="submit" class="btn btn-outline-primary">Crear</button>
      </form>
  </div>
</div>
</div>
@endsection