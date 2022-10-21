@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave Roles User Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 mx-auto">
            <h4 class="text-uppercase"><strong>{{__($title)}}</strong></h4>
            <form class="shadow-sm rounded py-3 px-3 form-create" action="{{route('admin.users.update',$user->id)}} " method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}">
                @include('admin.users.partials.form')
            </form>
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

