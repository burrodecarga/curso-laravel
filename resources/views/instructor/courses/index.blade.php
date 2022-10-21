<x-app-layout>
    <div class="container my-4 rounded p-6">
         <h1 class="text-2xl font-bold">Listado de cursos : <strong class="text-xl">{{auth()->user()->name}}</strong></h1>
    <hr class="mt-2 mb-6">
    @livewire('instructor.courses-index')
    </div>

</x-app-layout>
