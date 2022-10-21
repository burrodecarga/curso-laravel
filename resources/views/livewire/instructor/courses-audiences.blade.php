<section>
    <h1 class="text-2xl font-bold">Audiencia del Curso</h1>
    <hr class="mt-2 mb-4">
    @foreach ($course->audiences as $item)
    <article class="card my-2">
        <div class="card-body bg-gray-100">
            @if ($item->id == $audience->id)
             <form wire:submit.prevent="update">
                 <input type="text" wire:model="audience.name" class="w-full rounded">
                 @error('audience.name')
<span class="text-red-600 text-xs">{{$message}}</span>
                 @enderror

             </form>
            @else
            <header class="flex items-center justify-between">
              <h1>{{$item->name}}</h1>
              <div>
                  <i class="fas fa-edit cursor-pointer text-blue-600" wire:click="edit({{$item}})"></i>
              <i class="fas fa-trash-alt cursor-pointer text-red-600 ml-3" wire:click="destroy({{$item}})"></i>
              </div>
            </header>
            @endif
        </div>
    </article>
    @endforeach
    <article class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <input type="text" class="w-full rounded" placeholder="agregar nombre de la meta" wire:model="name">
                @error('name')
                <span class="text-red-600 text-xs">{{$message}}</span>

                @enderror
                <div class="flex justify-end my-2">
                            <button class="btn btn-primary" type="submit">agregar meta</button>

                </div>
            </form>
        </div>
    </article>

</section>
