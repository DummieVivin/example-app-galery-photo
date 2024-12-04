<x-app-layout>
    <title>{{ $pageTitle }} | {{ config('app.name', 'Laravel') }}</title>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ini Halaman Edit') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Modal body -->

                {{-- start of label category --}}
                <div class="ml-5 mt-2">
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                        {{ $album->category }}
                    </span>
                </div>
                {{-- end of label category --}}
                {{-- start of content --}}


                <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                        <!-- Item 1 -->
                        @foreach ($album->images as $images)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('storage/' . $images->path) }}"
                                alt="Image of {{ $album->title }}"
                                class="h-20 w-20 object-cover border rounded-sm" />
                            </div>
                        @endforeach

                    </div>
                    <div class="flex justify-center items-center pt-4">
                        <button type="button"
                            class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                ngewew            data-carousel-next>
                            <span
                                class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>

                {{-- end of content --}}

                <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Album
                    </label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <p a
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        {{ $album->title }} </p>
                </div>
                </h1>
            </div>
        </div>
    </div>
cium
</x-app-layout>
