<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-2 px-8 py-3 mt-6 gap-y-10 gap-x-6 md:grid-cols-3 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($movies as $movie)
                    <div class="relative w-full group" onclick="window.location='/movie/detail/{{$movie->_id}}'">
                        <div
                            class="bg-gray-200 min-h-80 group-hover:opacity-75 aspect-[3/4] rounded-md overflow-hidden">
                            <img src="{{$movie->imageUrl}}" alt="{{$movie->title}}"
                                class="object-cover object-center w-full h-full">
                        </div>
                        <div class="flex justify-between px-3 mt-4 mb-4">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{$movie->title}}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{$movie->director}}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{$movie->year}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>