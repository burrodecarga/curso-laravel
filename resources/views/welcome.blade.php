<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/portada.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <h1 class="text-white font-bold text-4xl">Aprende desde casa</h1>
                <p class="text-white text-lg mt-2 mb-4">Con tegnologia digital</p>
@livewire('search')
            </div>
        </div>
    </section>
    <section class="mt-8" >
        <h2 class="text-gray-500 text-center text-2xl p-4">Contenido</h2>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                <article>
                    <figure>
                           <img class="rounded-xl w-full object-cover" src="{{asset('img/home/portada.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="mx-auto text-center text-gray-700 text-xl">Cursos y proyectos</h1>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis earum nemo, nihil nesciunt veritatis ipsa placeat voluptatem dignissimos non quibusdam rem quidem, cum ea! Eaque esse est autem officia assumenda?
                        </p>
                    </header>
                </article>
                 <article>
                    <figure>
                           <img class="rounded-xl w-full object-cover" src="{{asset('img/home/pic1.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="mx-auto text-center text-gray-700 text-xl">Cursos y proyectos</h1>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis earum nemo, nihil nesciunt veritatis ipsa placeat voluptatem dignissimos non quibusdam rem quidem, cum ea! Eaque esse est autem officia assumenda?
                        </p>
                    </header>
                </article>

                <article>
                    <figure>
                           <img class="rounded-xl w-full object-cover" src="{{asset('img/home/pic2.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="mx-auto text-center text-gray-700 text-xl">Cursos y proyectos</h1>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis earum nemo, nihil nesciunt veritatis ipsa placeat voluptatem dignissimos non quibusdam rem quidem, cum ea! Eaque esse est autem officia assumenda?
                        </p>
                    </header>
                </article>

                <article>
                    <figure>
                           <img class="rounded-xl w-full object-cover" src="{{asset('img/home/pic3.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">
                        <h1 class="mx-auto text-center text-gray-700 text-xl">Cursos y proyectos</h1>
                        <p class="text-sm text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis earum nemo, nihil nesciunt veritatis ipsa placeat voluptatem dignissimos non quibusdam rem quidem, cum ea! Eaque esse est autem officia assumenda?
                        </p>
                    </header>
                </article>
            </div>
        </div>
        </div>
    </section>
    <section class="mt-8 bg-gray-700 py-12">
        <h2 class="text-3xl text-white text-center">Catálogo de cursos</h2>
        <p class="text-2sm text-center text-gray-200">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet nemo reprehenderit suscipit?</p>
        <div class="flex justify-center mt-4"><a href="{{route('courses.index')}}" class="bg-blue-600 hover:bg-blue-400 py-2 px-4 text-white rounded" >Ver Catálogo</a></div>
    </section>
    <section class="mt-8" >
        <h2 class="text-gray-600 text-center font-semibold text-2xl p-4">Últimos Cursos</h2>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($courses as $course)
                 <x-course-card :course="$course"/>
                @endforeach
            </div>
        </div>
        </div>
    </section>

</x-app-layout>
