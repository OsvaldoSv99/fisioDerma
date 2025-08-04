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
                            @can('role-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"> Editar</a>
                            @endcan
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
