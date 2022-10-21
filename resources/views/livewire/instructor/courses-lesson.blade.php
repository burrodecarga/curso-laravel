<article>
    @foreach ($section->lessons as $item )
    <article class="card mt-4" x-data="{open:false}">
        <div class="card-body">
            @if ($item->id == $lesson->id)
            <form wire:submit.prevent="update">
                <h2 class="text-gray-500 text-xl"><strong>Edit Lesson</strong>: </h2>
                <div class="flex items-center">
                    <label class="w-32">nombre</label>
                    <input type="text" class="form-input w-full rounded" wire:model="lesson.name">
                    @error('lesson.name')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex item-center mt-4">
                    <label class="w-32">Plataforma</label>
                    <select wire:model="lesson.platform_id" class="w-full rounded">
                        @foreach ($platforms as $platform )
                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center mt-3">
                    <label for="lesson.url" class="w-32">URL</label>
                    <input type="text" class="form-input w-full rounded" wire:model="lesson.url">
                    @error('lesson.url')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-end my-3">
                    <button type="button" class="btn btn-danger mr-3" wire:click="cancel">cancel</button>
                    <button type="submit" class="btn btn-primary">actualizar</button>
                </div>
            </form>
            @else
            <header >
                <h1>
                    <i class="far fa-play-circle text-xs text-blue-500 mr-1">

                    </i>
                    lección : {{$item->name}} {{$item->id}}
                    <i class="far fa-hand-pointer mr-2 cursor-pointer text-green-600" x-on:click="open =!open"></i>
                </h1>
            </header>
            <div class="ml-5" x-show="open">
                <hr class="my-2">
                <p class="text-sm">plataforma: {{$item->platform->name}}</p>
                <p class="text-sm text-blue-600">enlace: <a href="{{$item->url}}" target="_blank">{{$item->url}}</a>
                </p>
                <div class="mt-2">
                    <button class="text-sm btn btn-danger" wire:click="destroy({{$item}})">eliminar</button>
                    <button class="text-sm btn btn-primary" wire:click="edit({{$item}})">editar</button></div>
            </div>
            <div class="mb-4">
                @livewire('instructor.lesson-description',['lesson'=>$item],key('lesson-description'.$item->id))
            </div>
            <div>
                @livewire('instructor.lesson-resource',['lesson'=>$item],key('lesson-resource'.$item->id))
            </div>

            @endif
        </div>
    </article>
    @endforeach

    <div class="flex item-center cursor-pointer mt-3" x-data="{open:false}">
        <a x-on:click="open =!open" x-show="!open">
            <i class="far fa-plus-square text-lg text-red-500 mr-2">
                nueva Lección</i>
        </a>
        <article class="card w-full" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar nueva Lección</h1>
                <div class="flex items-center">
                    <label class="w-32">nombre</label>
                    <input type="text" class="form-input w-full rounded" wire:model="name">
                    @error('name')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex item-center mt-4">
                    <label class="w-32">Plataforma</label>
                    <select wire:model="platform_id" class="w-full rounded">
                        @foreach ($platforms as $platform )
                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                        @endforeach
                    </select>
                    @error('platform_id')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex items-center mt-3">
                    <label for="url" class="w-32">URL</label>
                    <input type="text" class="form-input w-full rounded" wire:model="url">
                    @error('url')
                    <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-end my-3">
                    <button class="btn btn-danger mr-3" wire:click="cancel">cancel</button>
                    <button class="btn btn-primary" wire:click="store">crear lección</button>
                </div>
            </div>
        </article>
    </div>
</article>
