<div>
    <div class="card">
        <div class="card-body bg-gray-100" x-data="{open:false}" >
            <header>
                <h1 x-on:click="open =!open">Recursos de la lección <i class="far fa-hand-pointer ml-2 cursor-pointer text-green-600" ></i></h1>
            </header>
            <article x-show="open">
                <hr class="my-2">
                @if ($lesson->resource)
                <div class="flex justify-between items-center"  x-show="open">
                    <a>
                        <i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer">
                        </i>
                        {{$lesson->resource->url}}
                    </a>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer">
                    </i>
                </div>
                @else
                <form wire:submit.prevent="save" >
                    <div class="fex items-center">
                        <input wire:model="file" type="file" class="form-input rounded flex-1"/>
                        @error('file')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <button class="btn btn-primary text-sm ml-3" type="submit">
                            guardar
                        </button>
                        <div class="font-bold text-blue-500" wire:loading wire:target="file">
                            cargando...
                        </div>
                    </div>
                </form>
                @endif
            </article>
        </div>
    </div>
</div>
