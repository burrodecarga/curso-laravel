<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->

                <main class="container py-8 grid grid-cols-5">
                    <aside class="shadow-sm border-2 mx-2 p-2 rounded">
                        <h1 class="font-bold text-lg mb-4 text-center">Acciones de Curso</h1>
                        <hr class="mb-3">
                        <ul class="text-sm text-gray-600">
                            <li class="leading-7 mb-1 border-l-4  pl-2 @routeIs('instructor.courses.edit',$course) border-indigo-500 @else border-transparent @endif">
                                <a href="{{route('instructor.courses.edit',$course)}}">Información del curso</a> </li>
                            <li class="leading-7 mb-1 border-l-4 border-transparent pl-2 @routeIs('instructor.courses.curriculum',$course) border-indigo-500 @else border-transparent @endif">
                                <a href="{{route('instructor.courses.curriculum',$course)}}">Lecciones del curso</a> </li>
                            <li class="leading-7 mb-1 border-l-4 border-transparent pl-2  @routeIs('instructor.courses.goals',$course) border-indigo-500 @else border-transparent @endif">
                                <a href="{{route('instructor.courses.goals',$course)}}">Metas del curso</a> </li>

                                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2  @routeIs('instructor.courses.students',$course) border-indigo-500 @else border-transparent @endif">
                                    <a href="{{route('instructor.courses.students',$course)}}">Estudiantes del curso</a> </li>

                                    @if($course->observation)
                                    <li class="leading-7 mb-1 border-l-4 border-transparent pl-2  @routeIs('instructor.courses.observation',$course) border-indigo-500 @else border-transparent @endif">
                                         <a href="{{route('instructor.courses.observation',$course)}}">Observaciones</a></li>
                                    @endif

                        </ul>
<hr class="mb-2">
                        <a  class="text-center inline-block w-full text-white bg-blue-500 py-2 px-3 rounded my-3"  href="{{route('instructor.courses.index')}}">Cursos</a>
                        <hr class="my-2">

                        @switch($course->status)
                            @case(1)
                            <form action="{{route('instructor.courses.status',$course)}}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn-danger inline-block w-full ">Solicitar Revisión</button>
                            </form>
                                @break
                            @case(2)
                            <div class="card ">
                                <div class="card-body bg-yellow-500">
                                     <h2 class="text-sm text-white text-center">Curso en revisión</h2>
                                </div>
                            </div>

                                @break
                                @case(3)
                                <div class="card ">
                                    <div class="card-body bg-green-500 ">
                                         <h2 class="text-sm text-white text-center">Curso Publicado</h2>
                                    </div>
                                </div>
                                    @break
                        @endswitch

                    </aside>
                    <div class="col-span-4 card bg-green-500 shadow-sm border-2 mx-2">
                        <div class="card-body text-gray-600">

                            {{$slot}}

                        </div>
                    </div>
            </main>
        </div>
        @stack('modals')
        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
