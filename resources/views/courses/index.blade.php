<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/resume.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <h1 class="text-white font-bold text-4xl">Cursos</h1>
                <p class="text-white text-lg mt-2 mb-4">Con tegnologia digital</p>
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('courses-index')
</x-app-layout>
