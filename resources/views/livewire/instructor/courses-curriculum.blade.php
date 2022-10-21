<div>
    {{-- <x-slot name="course">
        {{$course->slug}}
    </x-slot> --}}

    
    <h1 class="text-2xl font-bold">Lecciones del Curso</h1>
    <hr class="mt-2 mb-6">
    {{-- {{$section}} --}}
    @foreach ($course->sections as $item )
    <article class="card mb-6">
        <div class="card-body bg-gray-100" x-data="{open:true}">
            @if ($item->id == $section->id)
            <form wire:submit.prevent="update">
                <input type="text" placeholder="Ingrese nombre de sección" class="form-input w-full rounded"
                    wire:model="section.name">
                @error('section.name')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </form>
            @else
            <header class="flex items-center justify-between" >
                <h1 class="cursor-pointer" >
                    <strong> sección :</strong>{{$item->name}}</h1>
                    <i class="far fa-hand-pointer text-green-600 ml-2 cursor-pointer"x-on:click="open =!open"></i>
                <div>
                    <i class="fas fa-edit  cursor-pointer text-blue-500 mr-3" wire:click="edit({{$item}})"></i>
                    <i class="fas fa-trash cursor-pointer text-red-500" wire:click="delete({{$item->id}})"></i>
                </div>
            </header>
            <div x-show="open">
                @livewire('instructor.courses-lesson',['section'=>$item,'key'=>'courses-lesson'.$item->id])
            </div>
            @endif
        </div>
    </article>
    @endforeach
    <div class="flex item-center cursor-pointer" x-data="{open:false}">
        <a href="#" x-on:click="open =!open" x-show="!open">
            <i class="far fa-plus-square text-xl text-red-500 mr-2">
                nueva sección</i>
        </a>
        <article class="card w-full" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar nueva seccion</h1>
                <input type="text" class="form-input w-full rounded mb-4" placeholder="agregar nueva sección"
                    wire:model="name">
                @error('name')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
                <div class="flex justify-end">
                    <div class="btn btn-danger" x-on:click="open =false">cancelar</div>
                    <div class="btn btn-primary ml-2" wire:click="store">crear</div>
                </div>

            </div>
        </article>
    </div>
</div>
