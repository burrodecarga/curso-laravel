@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary">
      {{session('info')}}
</div>
@endif

<div class="container w-75">
    <h3>Edit Price</h3>
    <div class="card">
        <div class="card-body">
            {!!Form::model($price,['route'=>['admin.prices.update',$price],'method'=>'post'])!!}
            @method('put')
            @csrf
            <div class="form-group">
              {!!Form::label('name','nombre')!!}
              {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ingrese name'])!!}

              {!! Form::text('value',null,['class'=>'form-control my-3','placeholder'=>'ingrese costo'])!!}

              {!!Form::submit('actualizar price',['class'=>'btn btn-primary my-4'])!!}
            </div>
            @error('name')
                  <span class="text-danger text-sm">{{$message}}</span>
              @enderror
            {!!Form::close()!!}
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
