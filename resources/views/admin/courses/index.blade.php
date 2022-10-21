@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Rokave Dashboard</h1>
@stop

@section('content')
<article class="w-75 p-3 m-auto">
    <h2 class="text-gray-500 text-center font-bold">Cursos Pendientes de Aprobación</h2>
    @if (session('info'))

   <div class="alert alert-success">{{session('info')}}</div>

    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course )
                        <tr>
                        <td>{{$course->id.' - '.$course->status}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->category->name}}</td>
                        <td>
                            <a class="btn btn-primary text-sm" href="{{route('admin.courses.show',$course)}}">revisar</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 ">
                        {{$courses->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    </div>
</article>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
