<div>
  {{-- <x-slot name="course">
      {{$course->slug}}
  </x-slot> --}}

  <h1 class="text-xl font-bold mb-4 text-center">Estudiantes Registrados</h1>

<div class="container60">
    <x-table-responsive>
        <div class="py-6 px-4 flex">
            <input type="text" class="form-control flex-1 rounded" placeholder="ingrese nombre  o email" wire:model='search' wire:keydown="$set('page',1)">

        </div>
      @if ($students->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 email
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($students as $student)
                      <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        @isset($student->profile_photo_url)
                      <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="{{$student->name}}">
                      @else
                      <img id="picture" src="{{asset('assets/jobs/bg.jpg')}}" alt="" class="h-10 w-10 rounded-full object-cover object-center">
                      @endisset
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                      {{$student->name}}
                      </div>
                      <div class="text-sm text-gray-500">
                       {{$student->email}}
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
                @endforeach

            </tbody>
        </table>
        @else
        <div class="py-6 px-4">
    <h2 class="text-red-300 text-xl text-center">No matches</h2>
        </div>
        @endif            <!-- More people... -->



    </x-table-responsive>
    {{$students->links()}}
 </div>

</div>
