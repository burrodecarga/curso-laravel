@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 mx-auto">
                    <h4 class="text-uppercase"><strong>{{__($title)}}</strong></h4>
                    <form class="shadow-sm rounded py-3 px-3 form-create" action="{{route('admin.roles.update',$role->id)}} " method="POST">
                        @method('PUT')
                     @include('admin.roles.partials.form')
                    </form>
                </div>
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
