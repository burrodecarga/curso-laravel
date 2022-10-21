@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave Roles Admin</h1>
@stop

@section('content')
    <p>Welcome to the role Dashboard</p>
 @if (session('info'))
 <div class="alert alert-primary" role="alert">
    {{session('info')}}
  </div>
 @endif
    <div class="card">
        <div class="cad-body">
            <div class="card-header">
                <a class="btn btn-primary" href="{{route('admin.roles.create')}}">New Rol</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                       <tr>
                           <td>{{$role->id}}</td>
                           <td>{{$role->name}}</td>
                           <td width="10px">
                            <a class="btn btn-secondary" href="{{route('admin.roles.show',$role->id)}}">show   </a>
                            </td>
                           <td width="10px">
                            <a class="btn btn-secondary" href="{{route('admin.roles.edit',$role->id)}}">edit   </a>
                            </td>
                            <td width="10px">
                               <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST">
                            @csrf
                            @method('delete')
                             <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                            </td>
                       </tr>
                    @empty
                    <tr>
                        <td colspan="4">No Result</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
