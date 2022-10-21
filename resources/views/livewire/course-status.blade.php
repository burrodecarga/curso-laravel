<div class="mt-8 ">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8 p-4">
        <div class="col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>
            @if ($current->description)
            <div class="text-sm text-gray-600">
                {{$current->description->name}}
            </div>
            @endif
        <div class="flex justify-between items-center ">
            <div class="flex  cursor-pointer items-center" wire:click="completed">
                @if ($current->completed)
                <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                <p class="ml-2 text-sm">Marcar culminada</p>
                @endif
            </div>
            @if ($current->resource)
                <div class="flex cursor-pointer items-center " wire:click="download">
                <i class="fas fa-download text-2xl text-gray-600"></i>
                <p class="ml-2 text-sm">Descargar Recursos</p>
            </div>
            @endif

        </div>
            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                    <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">prev</a>
                    @endif
                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">next</a>
                    @endif

                </div>
            </div>

            <div>
                {{-- <p>{{$current->name}}</p> --}}
                {{-- <p>indice: {{$this->index}}</p> --}}
                <p>
                    @if ($this->previous)
                    {{-- <p>previous: {{$this->previous->id}}</p> --}}
                    @endif
                    @if ($this->next->id)
                    {{-- <p>next : {{$this->next->id}}</p> --}}
                    @endif
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-gray-500 text-lg mb-3">
                    {{$course->title}}
                </h1>
                <div class="flex item-center">
                    <figure>
                        <img class="rounded-full w-12 h-12" src="{{$course->teacher->profile_photo_url}}"
                            alt="{{$course->teacher->name}}">
                    </figure>
                    <div class="ml-3">
                        <p class="">Prof: {{$course->teacher->name}}</p>
                        <p class="text-xs text-blue-500">{{'@'.Str::slug($course->teacher->name,'')}}</p>
                    </div>

                </div>
                <div class="my-4 p-2">
                    <div class="relative pt-1">
                        <div class="relative pt-1">
                            <p class="gray-600 text-sm"> {{$this->advance}} % completado</p>

                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                <div style="width:{{$this->advance}}%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section )
                    <li class="font-bold">{{$section->name}}
                        <ul>
                            @foreach ($section->lessons as $lesson )
                            <li class="flex font-light text-gray-300 text-xs">
                                <div>
                                <a class="cursor-pointer" wire:click="changeLesson({{$lesson->id}})">
                                    @if ($lesson->completed)
                                        @if ($current->id == $lesson->id)
                                        <span class="inline-block w-4 h-4 border-yellow-500 border-2 rounded-full mr-2 mt-1"></span>
                                        @else
                                        <span
                                            class="inline-block w-4 h-4 bg-yellow-500  rounded-full mr-2 mt-1"></span>
                                        @endif
                                    @else
                                        @if ($current->id == $lesson->id)
                                        <span
                                            class="inline-block w-4 h-4 border-gray-500 border-2 rounded-full mr-2 mt-1"></span>
                                        @else
                                        <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                        @endif
                                    @endif

                                    {{$lesson->name}}
                                </a>
                                </div>

                            </li>
                            @endforeach
                        </ul>

                    </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>

</div>
