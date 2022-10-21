<x-instructor-layout :course="$course"  >
    <h1 class="text-gray-400 text-xl font-bold mb-3">
        Observaciones
    </h1>
    <p class="text-lg font-light text-gray-400 text-wrap">
    {!! $course->observation->body !!}</p>
</x-instructor-layout>
