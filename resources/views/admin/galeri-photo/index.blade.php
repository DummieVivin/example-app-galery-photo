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

                    {{-- Start Tombol Tambah --}}
                    <div class="flex items-center gap-4">
                        <button
                        type="button"
                        class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <a href="{{ route('admin-create-galeri-photo') }}">
                                Tambah Galeri Photo
                            </a>
                    </button>
                    @if (session('status') === 'deleted-successfuly')
                        <div x-data="{ show: true }"
                             x-show="show"
                             x-transition
                             x-init="setTimeout(() => show = false, 2500)"
                             class="flex items-center p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Berhasil menghapus!</span>
                                </div>
                        </div>
                    @endif
                </div>
                    {{-- End Tombol Tambah --}}

                    {{-- Start Display Data Product --}}
                        <div class="mt-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Album
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Deskripsi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Gambar
                                        </th>
                                        {{-- <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th> --}}
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listPost as $post)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                          {{ $loop->iteration }}
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $post->title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $post->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ( count ( $post->images ) > 0 )
                                                Gambar({{count ( $post->images )}})
                                            @else
                                                Gambar(0)
                                            @endif
                                            {{-- {{ asset() $post->images }} --}}
                                                {{-- @foreach ($post->images as $image)
                                                    <img
                                                        class="h-20 w-20"
                                                        src="{{ asset('storage/' . $image->path) }}"
                                                        alt="">
                                                @endforeach --}}
                                        </td>
                                        {{-- <td class="px-6 py-4">
                                            {{ $post->category }}
                                        </td> --}}
                                        <td class="px-6 py-4 text-right flex gap-2">
                                            <a
                                                href="{{ route('admin-edit-galeri-photo', [$post->slug]) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                Edit
                                            </a>
                                            <a
                                                href="{{ route('admin-show-galeri-photo', [$post->slug]) }}"
                                                class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                                View
                                            </a>
                                            <form method="POST" action="{{ route('admin-delete-album', $post) }}">
                                                @csrf
                                                @method('delete')
                                                <a href="route('admin-delete-album', $post)"
                                                   onclick="event.preventDefault(); if(confirm('Yakin Untuk Dihapus?')) this.closest('form').submit();"
                                                   class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    {{ __('Delete') }}
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty

                                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                     <span class="font-medium">Galeri Photo Belum adaa...</span>
                                </div>

                                 @endforelse

                                </tbody>
                            </table>
                        </div>

                        </div>

                    {{-- End Display Data Product --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
