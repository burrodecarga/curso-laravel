@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave Observaciones del Curso {{$course->title}}</h1>
@stop

@section('content')
<div class="card">
     <div class="card-body">
         <div class="form-group">
             {!! Form::open(['route'=>['admin.courses.reject',$course],'method'=>'post']) !!}
             {!! Form::label('body','observaciones del curso') !!}
             {!! Form::textarea('body',null) !!}
             {!! Form::submit('rechazar curso', ['class'=>'btn btn-primary mt-3'])!!}
             {!! Form::close() !!}
        
         @error('body')
         <span class="text-danger text-sm">{{$message}}</span>             
         @enderror </div>
     </div>
</div>
   
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script> console.log('Hi!'); </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop
