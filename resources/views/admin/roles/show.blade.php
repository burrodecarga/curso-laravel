@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave Dashboard</h1>
@stop

@section('content')
    <p>Welcome Admin Dashboard</p>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 mx-auto">
            <h4><strong>{{__($title)}}</strong>{{' : '.__($role->name)}}</h4>
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('admin.roles.index')}}">
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="name" class="form-label font-weight-bold text-capitalize">{{__("name of role")}}
                        </label>
                        <input id="name" type="text" name="name" value="{{old('name', $role->name)}}"
                            class="form-control shadow-sm" readonly>
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label for="name" class="form-label font-weight-bold text-capitalize">{{__("work area")}}
                        </label>
                        <input id="name" type="text" name="name" value="{{old('area', $role->area)}}"
                            class="form-control shadow-sm" readonly>
                    </div>

            <div class="form-group col-md-12">
                <h3 class="display-6 text-capitalize font-weight-bold">{{__('assignable permissions')}}</h3>
                <hr>
            </div>
            <div class="form-group col-md-12">
               <div class="form-group col-md-12">
                <div class="row">
                    @foreach ($permissions as $key => $p)
                    <div class="form-check col-md-4">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions"
                                value="{{ $p->name }}" {{ in_array($p->id,$permission_id) ? "checked" : "" }} onclick="return false;">{{$p->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
                <hr>
                 <div class="form-group">
               <a href="{{route('admin.roles.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
            </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
