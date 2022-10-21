@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container w-75">
    <a href="{{route('admin.categories.create')}}" class="btn btn-success btn-sm float-right">Nueva Categoria</a>
<h3>Listado de Categorias</h3>
@if (session('info'))
<div class="alert alert-primary">
      {{session('info')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        name
                    </th>
                    <th colspan="2">

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category )
                <tr>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td width="10px">
                        <a href="{{route('admin.categories.edit',$category)}}" class="btn btn-primary block btn-sm">Editar</a>

                    </td>
                    <td width="10px">
                        <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
