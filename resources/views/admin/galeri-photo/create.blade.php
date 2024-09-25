<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <title>{{$pageTitle}} | {{ config('app.name', 'Laravel') }}</title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Start Form Galeri Photo --}}
                    <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal body -->
                            <form method="POST"
                                  action="{{route("admin-store-galeri-photo")}}"
                                  enctype="multipart/form-data"
                                  class="p-4 md:p-5">
                                  @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Nama Album
                                        </label>
                                        <input type="text"
                                               name="title"
                                               id="title"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="Ketik Nama Album">
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                               for="multiple_files">
                                               Upload multiple files
                                        </label>
                                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                               id="multiple_files"
                                               type="file"
                                               multiple>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="category"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                        <select id="category"
                                                name="category"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">Select Category</option>
                                                    @foreach ($listCategory as $key => $value)
                                                    <option value="{{$value}}">{{$key}}</option>
                                                    @endforeach
                                        </select>

                                    </div>
                                    <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                        <textarea id="description"
                                                  name="description"
                                                  rows="4"
                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                  placeholder="Write album description here">
                                        </textarea>
                                    </div>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Tambah Album
                                </button>
                            </form>
                        </div>
                    {{-- End Form Galeri Photo --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
