@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container w-75">
    <a href="{{route('admin.prices.create')}}" class="btn btn-success btn-sm float-right">Nuevo Precio</a>
<h3>Listado de Niveles</h3>
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
                    <th>
                        cost
                    </th>
                    <th colspan="2">

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($prices as $price )
                <tr>
                    <td>
                        {{$price->id}}
                    </td>
                    <td>
                        {{$price->name}}
                    </td>
                    <td>
                        {{$price->value}} $
                    </td>
                    <td width="10px">
                        <a href="{{route('admin.prices.edit',$price)}}" class="btn btn-primary block btn-sm">Editar</a>

                    </td>
                    <td width="10px">
                        <form action="{{route('admin.prices.destroy',$price)}}" method="POST">
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
