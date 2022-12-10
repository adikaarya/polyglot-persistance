<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800">
			{{ __('Detail Movies') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
			<div class="overflow-hidden bg-white shadow sm:rounded-lg">
				<div class="px-4 py-5 sm:px-6">
					<h3 class="text-lg font-medium leading-6 text-gray-900">Movie Details</h3>
					<p class="max-w-2xl mt-1 text-sm text-gray-500">Movie details and description.</p>
				</div>
				<div class="border-t border-gray-200">
					<dl>
						<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Title</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$movie->title}}</dd>
						</div>
						<div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Director</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$movie->director}}</dd>
						</div>
						<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Year</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$movie->year}}</dd>
						</div>
						<div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Description</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$movie->description}}
							</dd>
						</div>
						<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Rating</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$movie->rating}}</dd>
						</div>
						<div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Image</dt>
							<dd class="mt-1 mb-4 text-sm text-gray-900 rounded-lg sm:col-span-2 sm:mt-0">
								<img src="{{$movie->imageUrl}}" alt="{{$movie->title}}"
									class="object-cover w-1/2 rounded-lg d-block">
							</dd>
						</div>
					</dl>
				</div>
			</div>

			{{-- add back button --}}
			<div class="flex justify-end mt-4">

				<button onclick="window.location='/movie'"
					class="px-4 py-2 text-sm font-medium bg-gray-200 border border-transparent rounded-md text-dark hover:bg-gray-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-gray-400">
					Back
				</button>

				@if (Auth::user())
				<button onclick="window.location='/movie/edit/{{$movie->_id}}'"
					class="px-4 py-2 ml-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500">
					Edit
				</button>

				{{-- alpine modal and delete form --}}
				<div x-data="{ open: false }" @keydown.escape="open = false">
					<button @click="open = true"
						class="px-4 py-2 ml-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500">
						Delete
					</button>

					<div x-show="open" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
						role="dialog" aria-modal="true">
						<div
							class="flex justify-center min-h-screen px-4 pt-4 pb-20 text-center items end sm:block sm:p-0">
							<div x-show="open" @click.away="open = false" class="fixed inset-0 transition-opacity"
								aria-hidden="true">
								<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
							</div>

							<span class="hidden sm:inline-block sm:align-middle sm:h-screen"
								aria-hidden="true">&#8203;</span>

							<div x-show="open"
								class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
								role="dialog" aria-modal="true" aria-labelledby="modal-headline">
								<div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
									<div class="sm:flex sm:items-start">
										<div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
											<h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
												Delete Movie
											</h3>
											<div class="mt-2">
												<p class="text-sm text-gray-500">
													Are you sure you want to delete this movie? All of your data will be
													permanently removed. This action cannot be undone.
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse sm:gap-2">
									<form action="/movie/delete/{{$movie->_id}}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit"
											class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500">
											Delete
										</button>
									</form>
									<button @click="open = false"
										class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md hover:bg-gray-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-gray-500">
										Cancel
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif

			</div>
		</div>
	</div>
</x-app-layout>