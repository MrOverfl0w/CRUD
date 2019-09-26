@extends('layout.base') 
@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('failure'))
        <div class="alert alert-danger">
            {{ session()->get('failure') }}  
        </div>
        @elseif(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
        @endif
    </div>
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-4">Información del usuario</h1>
        
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
        <div class="well well-sm">
            <div class="col-sm-6 col-md-4">
                <img src="{{ route('users.showImage','imagen='.$user->imagen)}}" class="img-rounded img-responsive" style="width:100%">
            </div>
            <div class="col-sm-6 col-md-4">
                
                <label type="text">{{ $user->nombre }} {{ $user->apellido }}</label><br/>
                <label type="text"> @ {{ $user->username }}</label><br/>
                <label type="text">{{ $user->email }}</label>
                <label class="col-sm-3">&nbsp;</label>
            </div>
        </div>
    </div>
    <div class="col-sm-8 offset-sm-4">
        <form action="{{ route('users.destroy', $user->id)}}" method="post">
            <div class="col-sm-6">
                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Editar</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Eliminar</button>
            </div>
        </form>
    </div>
</div>
<a class="btn btn-link" style="align-items: center" href="{{ route('users.index')}}">Atras</a>
@endsection