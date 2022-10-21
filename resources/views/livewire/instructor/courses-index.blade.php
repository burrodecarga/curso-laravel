
<div class="container">
    <x-table-responsive>
      <div class="py-6 px-4 flex">
          <input type="text" class="form-control flex-1 rounded" placeholder="ingrese curso" wire:model='search' wire:keydown="$set('page',1)">
          <a class="btn btn-primary ml-2" href="{{route('instructor.courses.create')}}">Nuevo curso</a>
      </div>
      @if ($courses->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  matriculados
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 calificacion
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                status
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                      <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        @isset($course->image)
                      <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}">
                      @else
                      <img id="picture" src="{{asset('assets/jobs/bg.jpg')}}" alt="" class="h-10 w-10 rounded-full object-cover object-center">
                      @endisset
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                      {{$course->title}}
                      </div>
                      <div class="text-sm text-gray-500">
                       {{$course->category->name}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                  <div class="text-sm text-gray-500">Alumnos Matriculados</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex flex-item-center">
                    <div class="text-sm text-gray-900">{{$course->rating}}</div>
                    <div class="text-sm text-gray-500">   <ul class="flex text-sm justify-center mb-y ml-2">
                        <li><i class="fas fa-star mr-1 text-{{$course->rating>=1 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li><i class="fas fa-star mr-1 text-{{$course->rating>=2 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li><i class="fas fa-star mr-1 text-{{$course->rating>=3 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li><i class="fas fa-star mr-1 text-{{$course->rating>=4 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li><i class="fas fa-star mr-0 text-{{$course->rating>=5 ? 'yellow':'gray'}}-400"></i>
                        </li>
                    </ul></div>
                  </td>
                <td>
                 @switch($course->status)
                     @case(1)
                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">Borrador</span>
                         @break
                     @case(2)
                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-green-800">Revision</span>
                         @break
                     @case(3)
                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">   Active</span>
                         @break
                     @default

                 @endswitch
                   @if ($course?->observation)
                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-600 text-white">   Observaciones</span>
                   @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{route('instructor.courses.edit',$course)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
    {{$courses->links()}}
 </div>
