<x-app-layout>
    <section class="bg-gray-700 py-12 px-4">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover " src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}" />
                @else
                    <img class="h-60 w-full object-cover " src="{{asset(config('adminlte.logo_img'))}}" alt="Sin Imagen">
                @endif

            </figure>
            <div class="text-white">
                <h1>{{$course->title}}</h1>
                <h2>{{$course->subtitle}}</h2>
                <p><i class="text-sm mr-2 fas fa-chart-line"></i> Nivel : {{$course->level->name}}</p>
                <p><i class="text-sm mr-2 fas fa-chart-pie"></i> Category : {{$course->category->name}}
                    <p><i class="text-sm mr-2 fas fa-users"></i> Matriculate : {{$course->students_count}}</p>
                    <p><i class="text-sm mr-2 fas fa-star"></i> Calificación : {{$course->rating}}</p>
            </div>
        </div>
    </section>



    <div class="container grid grid-cols-1  lg:grid-cols-3 px-4">
        @if (session('info'))<div class="lg:col-span-3" x-data="{open:true}" x-show="open">
            <div class="w-50 relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                <p>{{session('info')}}</p>
                <span class="absolute inset-y-0 right-0 flex items-center mr-4" x-on:click="open =!open">
                  <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                </span>
              </div></div>
            @endif

        <div class="order-2 lg:order-1 lg:col-span-2">
            <div class="card">
                <div class="card-body bg-white">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">
                        @forelse ($course->goals as $goal)
                        <li class="text-gray-400 text-base"><i class="fas fa-check text-gray-700 mr-2"></i>
                            {{$goal->name}}</li>
                        @empty
                        <div class="card">
                            <div class="card-body">
                                <h1>No tiene asignación</h1>
                            </div>
                        </div>
                        @endforelse

                    </ul>
                </div>
                <section class="card">
                    <div class="card-body">
                        <h2 class="font-bold mb-2 text-3xl py-2 px-4">Temario</h2>
                        @foreach ($course->sections as $section )
                        <article class="mb-4 shadow" @if($loop->first)
                            x-data='{open:true}'
                            @else
                            x-data='{open:false}'
                            @endif>
                            <header class="border border-gray-200 px-4 py-2 cursor-pointer text-gray-200"
                                x-on:click="open = ! open">

                                <h2 class="font-bold text-lg text-gray-600">{{$section->name}} <span>
                                        <i class="far fa-hand-pointer ml-3" title="push Open <-> Close"></i> <i
                                            class="fas fa-sync ml-3"></i> </span></h2>
                            </header>
                            <div class="bg-white py-2 px-4" x-show="open">
                                <ul class="grid grid-cols-1 gap-2 ">
                                    @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i
                                            class="fas fa-play-circle mr-2 text-sm"></i>{{$lesson->name}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                        @endforeach

                    </div>
                </section>
                <section class="px-6">
                    <h2 class="font-bold text-xl">requeriments</h2>
                    <ul class="list-disc list-inside">
                        @foreach ($course->requirements as $requirement )
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                        @endforeach
                    </ul>
                </section>
                <section class="px-4 py-2 bg-white my-10">
                    <h2 class="text-3xl">{{__('Description')}}</h2>
                    <div class="text-gray-600">
                        <p>{!! $course->description !!}</p>
                    </div>
                </section>
            </div>
        </div>
        <div class="cols-span-1 order-1 lg:order-2">
            <section class="card">
                <div class="card-body">
                    <div class="flex mb-3 items-center">
                        <img class="rounded-full shadow-lg h-12 w-12" src="{{$course->teacher->profile_photo_url}}"
                            alt="{{$course->teacher->name}}">
                        <div class="ml-4 flex items-center flex-col">
                            <h2 class="font-bold  text-gray-600 text-lg">{{$course->teacher->name}}</h2>

                        </div>
                    </div>


                        <form action="{{route('admin.courses.show',$course)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn-primary w-full">
                                {{__('Aporbar Curso')}}
                            </button>
                        </form>

                        <a href="{{route('admin.courses.observation',$course)}}" class="btn btn-danger block mt-2 text-center">Observaciones</a>


                </div>
            </section>


        </div>
    </div>


</x-app-layout>
