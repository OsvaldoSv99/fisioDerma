@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Roles</h2>
                        </div>
                        <div class="pull-right">
                        @can('role-create')
                            <a href="{{ route('roles.create') }}"> <i class='bx bx-folder-plus' style="font-size:4rem"></i></a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="tabla" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $role)

                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            {{-- <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa-solid fa-list"></i> Ver</a> --}}
                            @can('role-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"> Editar</a>
                            @endcan

                            {{-- @can('role-delete')
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>
                            @endcan --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div></div>
@endsection
