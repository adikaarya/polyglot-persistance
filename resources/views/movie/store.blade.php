<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800">
			{{ __('Add Movie') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
			<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900">

					<div class="mt-10 sm:mt-0">
						<div class="md:grid md:grid-cols-3 md:gap-6">
							<div class="md:col-span-1">
								<div class="px-4 sm:px-0">
									<h3 class="text-lg font-medium leading-6 text-gray-900">Movies</h3>
									<p class="mt-1 text-sm text-gray-600">Add a new movies.</p>

									@if (isset($errors) && $errors->any())
									<div class="mt-5" id="error-container">
										<div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
											role="alert">
											<strong class="font-bold">Whoops!</strong>
											<span class="block sm:inline">Something went wrong.</span>
											<span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="error-close">
												<svg class="w-6 h-6 text-red-500 fill-current" role="button"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
													<title>Close</title>
													<path
														d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
												</svg>
											</span>
											<ul>
												@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									</div>
									<script>
										const errorContainer = document.getElementById('error-container');
                                        const errorClose = document.getElementById('error-close');
                                        errorClose.addEventListener('click', () => {
                                            errorContainer.style.display = 'none';
                                        });
									</script>
									@endif

								</div>
							</div>
							<div class="mt-5 md:col-span-2 md:mt-0">
								<form action="/movie/create" method="POST">
									@csrf
									@method('POST')
									<div class="overflow-hidden">
										<div class="px-4 py-5 bg-white sm:p-6">
											<div class="grid grid-cols-6 gap-6">
												<div class="col-span-6 sm:col-span-3">
													<label for="title"
														class="block text-sm font-medium text-gray-700">Title</label>
													<input type="text" name="title" id="title"
														class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
														value="{{ old('title') }}">
												</div>

												<div class="col-span-6 sm:col-span-3">
													<label for="year"
														class="block text-sm font-medium text-gray-700">Year</label>
													<input type="number" name="year" id="year"
														class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
														value="{{ old('year') }}">
												</div>

												<div class="col-span-6 sm:col-span-3">
													<label for="director"
														class="block text-sm font-medium text-gray-700">Director</label>
													<input type="text" name="director" id="director"
														class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
														value="{{ old('director') }}">
												</div>

												<div class="col-span-6">
													<label for="description"
														class="block text-sm font-medium text-gray-700">Description</label>
													<input type="text" name="description" id="description"
														class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
														value="{{ old('description') }}">
												</div>

												<div class="col-span-6">
													<label for="imageurl"
														class="block text-sm font-medium text-gray-700">Image
														URL</label>
													<input type="text" name="imageurl" id="imageurl"
														class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
														value="{{ old('imageurl') }}">
												</div>

												<div class="col-span-6 sm:col-span-3">
													<label for="rating"
														class="block text-sm font-medium text-gray-700">Rating</label>
													<input type="number" max="10" step="0.1" name="rating" id="rating"
														class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
														value="{{ old('rating') }}">
												</div>
											</div>
										</div>
										<div class="px-4 py-3 text-right sm:px-6">
											<button type="submit"
												class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
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