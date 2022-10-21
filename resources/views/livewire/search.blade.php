<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <input
        class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
        type="search" name="search" placeholder="Search" wire:model="search">
    <button type="submit"
        class="absolute right-0 top-0  py-2 px-4 mt-2 bg-blue-600 hover:bg-blue-400 text-white rounded">
        search
    </button>
    @if ($this->search)
        <ul class="absolute w-full text-gray-600 bg-white mt-1 rounded-lg z-50">
        @forelse ($this->results as $result )
        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-500 hover:text-white overflow-hidden">
            <a href="{{route('courses.show',$result)}}">
            {{$result->title}}</a></li>
         @empty
         <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-500 hover:text-white overflow-hidden">
            <a href="#">
            No Macth </a></li>
        @endforelse
    </ul>
    @endif

</form>
