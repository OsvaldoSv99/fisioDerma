@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
            <h2>Usuarios</h2>
            <div class="pull-right">
                <a href="{{ route('users.create') }}"><i class='bx bx-folder-plus' style="font-size:4rem"></i> </a>
            </div>
        </div>
<div class="card-body">
    <table id="tabla" class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Roles</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge bg-info">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                {{-- <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa-solid fa-list"></i> Ver</a> --}}
                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Editar</a>
                {{-- <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
