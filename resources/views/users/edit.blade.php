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
        <h1 class="display-3">Actualizar usuario</h1>
        
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
                
                <label for="first_name">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value={{ $user->nombre }} />
            </div>
            
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value={{ $user->apellido }} />
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value={{ $user->email }} />
            </div>
            <div class="form-group">
                <label for="new_clave">Contraseña nueva:</label>
                <input type="password" class="form-control" name="new_clave" />
            </div>
            <div class="form-group">
                <label for="imagen">Imagen de perfil:</label>
                <input type="file" class="form-control" name="imagen" value={{ $user->imagen }} />
            </div>
            
            <div class="form-group">
                <label for="clave">*Contraseña actual:</label>
                <input type="password" class="form-control" name="clave" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection