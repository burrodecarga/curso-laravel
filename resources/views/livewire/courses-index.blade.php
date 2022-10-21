<div>
    <div class="py-4 bg-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex">
            <button
                class="focus:outline-none bg-white shadow h-12 px-4 text-center rounded-lg text-gray-600 items-center"
                wire:click="iniciar">
                <i class="fas fa-archway text-xs my-2"></i>
                All Courses</button>

            <div class="relative" x-data="{open:false}" x-on:click="open =!open">
                <button class="bg-white shadow h-12 px-6 ml-4 text-center rounded-lg text-gray-600">
                    <i class="fas fa-tags text-sm ml-2"></i>
                    Category<i class="fas fa-angle-down text-sm ml-2"></i>
            </button>

                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open">
                    @foreach ($categories as $category )
                    <a href="javascript:voit(0)"
                        class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="$set('category_id',{{$category->id}})">
                        {{$category->name}} </a>
                    @endforeach
                </div>
            </div>
            <div class="relative" x-data="{open:false}" x-on:click="open =!open">
                <button class="bg-white shadow h-12 px-6 ml-4 text-center rounded-lg text-gray-600">
                    <i class="fas fa-tags text-sm ml-2"></i>
                    Level<i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open">
                    @foreach ($levels as $level )
                    <a href="javascript:voit(0)"
                        class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="$set('level_id',{{$level->id}})">{{$level->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <section class="mt-8">
        <h2 class="text-gray-600 text-center font-semibold text-2xl p-4">Últimos Cursos</h2>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                    @foreach ($courses as $course)
                     <x-course-card :course="$course"/>
                    @endforeach


            </div>
            <div class="flex  my-4 text-base text-gray-500 item">
                {{ $courses->links('vendor.pagination.pagination-links') }}</div>
                </div>

            </div>
        </div>
    </section>
</div>
