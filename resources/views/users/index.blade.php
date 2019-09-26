@extends('layout.base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
        @endif
    </div>
    <div class="col-sm-12">
        <h1 class="display-4">Usuarios</h1>    
        <div>
            <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-secondary">New user</a>
        </div>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td>Foto de perfil</td>
                    <td>Email</td>
                    <td>Nombre de Usuario</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><a href="{{ route("users.show", $user->id)}}"><img src="{{ route('users.showImage','imagen='.$user->imagen)}}" class="card-img"></a></td>
                    <td><a href="{{ route("users.show", $user->id)}}">{{$user->email}}</td></a>
                    <td><a href="{{ route("users.show", $user->id)}}">{{$user->username}}</td></a>
                    <td>
                        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection