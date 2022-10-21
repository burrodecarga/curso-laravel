@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container w-75">
    <h3>Nuevo Nivel</h3>
    <div class="card">
        <div class="card-body">
            {!!Form::open(['route'=>'admin.levels.store'])!!}
            <div class="form-group">
              {!!Form::label('name','nombre')!!}
              {!! Form::number('name',null,['class'=>'form-control','placeholder'=>'ingrese level'])!!}

              {!!Form::submit('crear level',['class'=>'btn btn-primary my-4'])!!}
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
