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

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Movies</h3>
                                    <p class="mt-1 text-sm text-gray-600">Add a new movies.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form action="/create-movie" method="POST">
                                    @csrf
                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                                    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                                                    <input type="number" name="year" id="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="director" class="block text-sm font-medium text-gray-700">Director</label>
                                                    <input type="text" name="director" id="director" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                                    <input type="text" name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="imageurl" class="block text-sm font-medium text-gray-700">Image URL</label>
                                                    <input type="text" name="imageurl" id="imageurl" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                                                    <input type="number" max="5" step="0.01" name="rating" id="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
