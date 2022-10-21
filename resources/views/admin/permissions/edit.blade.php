@extends('layouts.app')
@section('content')
@section('css')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 mx-auto">
            <h4 class="text-uppercase"><strong>{{__($title)}}</strong></h4>
            <form class="shadow-sm rounded py-3 px-3 form-create" action="{{route('permissions.update',$permission->id)}} " method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{$permission->id}}">
                @include('permissions.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
