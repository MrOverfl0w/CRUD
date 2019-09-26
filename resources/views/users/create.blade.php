@extends('layout.base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-4">Crear usuario</h1>
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
          <div class="row">
            <label class="col-sm-3" for="nombre">Nombre:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nombre"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="col-sm-3" for="apellido">Apellido:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="apellido"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="col-sm-3" for="email">Email:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" name="email"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="col-sm-3" for="username">Nombre de usuario:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="username"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="col-sm-3" for="clave">Contraseña:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="clave"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <label class="col-sm-3" for="imagen">foto de perfil:</label>
            <div class="col-sm-7">
              <input type="file" class="form-control" name="imagen"/>
            </div>
          </div>
        </div>

        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-primary">Crear</button>
          <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection