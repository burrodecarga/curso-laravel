<x-app-layout>
    <div class="container60 py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="font-bold text-2xl">Crear nuevo Curso</h1>
                <hr class="mt-2 mb 6">
                {!!Form::open(['route'=>'instructor.courses.store','files'=>true,'enctype' => 'multipart/form-data']) !!}
                @csrf

                @include('instructor.partials.form')

                <div class="flex justify-end">
                    <a class="px-6 py-4 btn-danger mr-3 cursor-pointer" href="{{ route('instructor.courses.index') }}">back</a>
                    {!! Form::submit('Crear Nuevo Curso',['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>


</x-app-layout>
