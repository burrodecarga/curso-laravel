<x-app-layout>
    <div class="max-w-4l mx-auto sm:px-6 lg:px-8 md:px-12">
        <h1 class="text-gray-500 text-2xl font-bold">Detalles de Compra</h1>
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover " src="{{Storage::url($course->image->url)}}"
                    alt="{{$course->title}}">
                    <h1 class="text-lg ml-2">{{$course->title}}</h1>
                    <p class="text-xl font-bold ml-auto"> ${{$course->price->value}}</p>
                </article>
<div class="flex justify-end items-center mx-3">
    <a href="#" class="btn btn-success mt- text-sm">comprar curso</a>
</div> <hr class="my-2">
    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum culpa eligendi deleniti ipsa tenetur? Nemo, aliquam recusandae! Nostrum amet nam pariatur libero quos beatae sapiente necessitatibus, animi officia! Non, ducimus!<a class="text-red-600 mx-3 text-sm" target="_blank" rel="noopener noreferrer">términos y condiciones</a></p>


            </div>
        </div>
    </div>
</x-app-layout>
