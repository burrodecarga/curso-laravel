<section class="mt-3">
    @can('isEnrolled', $course)

    <article class="mb-3">
        <h1 class="text-2xl font-bold">Valoraciones</h1>
        @can('value', $course)
        <h1 class="text-xl font-bold">Reseña de Curso</h1>
        @error('comment')
        <span class="text-red-600 text-sm">{{$message}}</span>
        @enderror
        <textarea wire:model="comment" cols="2" class="form-input w-full rounded"
            placeholder="Ingrese Reseña del Curso"></textarea>
        <div class="flex items-center">
            <button class="btn btn-primary mr-2" wire:click="store">guardar</button>
            <ul class="flex text-sm justify-center mb-y">
                <li class="cursor-pointer" wire:click="$set('rating',1)"><i
                        class="fas fa-star mr-1 text-{{$rating>=1 ? 'yellow':'gray'}}-400"></i>
                </li>
                <li class="cursor-pointer" wire:click="$set('rating',2)"><i
                        class="fas fa-star mr-1 text-{{$rating>=2 ? 'yellow':'gray'}}-400"></i>
                </li>
                <li class="cursor-pointer" wire:click="$set('rating',3)"><i
                        class="fas fa-star mr-1 text-{{$rating>=3 ? 'yellow':'gray'}}-400"></i>
                </li>
                <li class="cursor-pointer" wire:click="$set('rating',4)"><i
                        class="fas fa-star mr-1 text-{{$rating>=4 ? 'yellow':'gray'}}-400"></i>
                </li>
                <li class="cursor-pointer" wire:click="$set('rating',5)"><i
                        class="fas fa-star mr-0 text-{{$rating>=5 ? 'yellow':'gray'}}-400"></i>
                </li>
            </ul>
        </div>


        @else
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
            <p>Usted ya ha valorado este curso.</p>
        </div>
        @endcan
    </article>
    @endcan


    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{$course->reviews->count()}} valoraciones</p>
            @foreach ($course->reviews as $review)
            <article class="flex mb-4 items-center">
                <figure><img class="h-12 w-12 object-cover rounded-full mr-3 shadow-lg"
                        src="{{$review->user->profile_photo_url}}" alt="{{$review->user->name}}">
                </figure>
                <div class="card flex-1">
                    <div class="card-body">
                        <p><b> {{$review->user->name}}</b><i class="fas fa-star text-yellow-600 mx-3"></i>
                            {{$review->rating}}</p>
                        {{$review->comment}}
                    </div>

                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
