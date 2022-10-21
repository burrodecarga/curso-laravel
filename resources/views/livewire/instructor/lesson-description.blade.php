<div class="my-3">
    <article class="card" x-data="{open:false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 class="cursor-pointer" x-on:click="open=!open">Descripción de la lección <i class="far fa-hand-pointer"></i></h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                <form wire:submit.prevent="update">
                    <textarea cols="30" rows="2" class="form-input w-full rounded" wire:model="description.name" placeholder="Agregue descripción de la lección"></textarea>
                    @error('description.name')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div>
                        <button class="btn btn-danger text-xs" type="button" wire:click="destroy">eliminar</button>
                        <button class="btn btn-primary text-xs" type="submit">actualizar</button>
                    </div>
                </form>
                @else
                <div>
                    <textarea cols="30" rows="2" class="form-input w-full rounded" wire:model="name" placeholder="Agregue descripción de la lección">    </textarea>
                    @error('name')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div>
                        <button class="btn btn-primary text-xs" wire:click="store">crear</button>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </article>
</div>
