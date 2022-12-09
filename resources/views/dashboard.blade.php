<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
                    <div class="bg-white">
                        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                @foreach($movies as $movie)
                                    <div class="group relative">
                                        <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                            <img src="{{$movie->imageUrl}}" alt="{{$movie->title}}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                        </div>
                                        <div class="mt-4 flex justify-between">
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


                                <!-- More products... -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
