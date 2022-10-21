<x-instructor-layout :course="$course">
    {{-- <x-slot name="course">
        {{$course->slug}}
    </x-slot> --}}

    
    <article>
        @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals'.$course->id))
    </article>

    <article>
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements'.$course->id))
    </article>

    <article>
        @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences'.$course->id))
    </article>
</x-instructor-layout>
