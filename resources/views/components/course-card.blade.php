@props(['course'])
<article class="bg-white shadow-sm rounded-lg overflow-hidden flex flex-col">
    <figure>
        <img class="w-full object-cover" src="{{asset('storage/'.$course->image->url)}}" alt="{{$course->title}}">
        <div class="px-6 py-4 flex-1">
            <h2 class="text-center text-gray-700 text-lg mb-2 leading-6">
                {{Str::limit($course->title,40)}}
            </h2>
            <p class="text-xs text-center text-gray-600 mb-2">Teacher:{{$course->teacher->name}} </p>
            <ul class="flex text-sm justify-center mb-y">
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
            </ul>
            <p class="text-gray-400 text-center text-xs">
                <i class="fas fa-users"></i>
                register : {{$course->students_count}}
            </p>
        </div>
        <p class="text-gray-500 my-2 font-bold text-center">
            @if ($course->price->value)
              Price: ${{$course->price->value}}
            @else
            Gratis
            @endif

        </p>
        <a class="w-full block rounded-lg py-3 px6 bg-blue-600 text-center text-white hoover:bg-blue-400"
            href="{{route('courses.show',$course)}}">See more...</a>
    </figure>
</article>
