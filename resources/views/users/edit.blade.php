@extends('layout.base') 
@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('failure'))
        <div class="alert alert-danger">
            {{ session()->get('failure') }}  
        </div>
        @endif
    </div>
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-4">Actualizar usuario</h1>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3" for="nombre">Nombre:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" value={{ $user->nombre }} />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label" for="apellido">Apellido:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="apellido" value={{ $user->apellido }} />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label" for="email">Email:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" name="email" value={{ $user->email }} />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label" for="new_clave">Contraseña nueva:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="new_clave" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label" for="imagen">Imagen de perfil:</label>
                    <div class="col-sm-7">
                        <input type="file" class="form-control" name="imagen" value={{ $user->imagen }} />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label" for="clave">*Contraseña actual:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="clave" />
                    </div>
                </div>
            </div>
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection