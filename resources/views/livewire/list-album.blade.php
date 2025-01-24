<div>
    @forelse ($listAlbum as $album)

    <div class="w-full mb-3 max-w-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <div class="grid gap-4">
            <div class="m-2 grid grid-cols-5 gap-4">
                <div>
                    @foreach ($album->images as $image)
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/'. $image->path) }}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
            {{-- @foreach ($album->images as $image)
                <img class="p-8 rounded-t-lg" src="{{ asset('storage/'. $album->path) }}" alt="product image" />
            @endforeach --}}

        <div class="px-5 pb-5">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"> {{ $album->title }} </h5>
            <div class="flex items-center mt-2.5 mb-5">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    {{-- <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg> --}}
                </div>
                <span
                    class="text-xs font-semibold px-2.5 py-0.5 rounded text-white
                    @if ($album->category == 'makanan') bg-red-500
                    @elseif ($album->category == 'pendidikan') bg-yellow-500
                    @elseif ($album->category == 'olahraga') bg-green-500
                    @elseif ($album->category == 'travelling') bg-blue-500
                    @else bg-gray-500 @endif">
                    {{ $album->category }}
                </span>

                {{-- <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">
                    {{ $album->category }}
                </span> --}}
            </div>
            <div class="flex justify-start">
                <div class="flex p-2 justify-center items-center">

                    {{-- Heart button --}}
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </a>

                    <span class="text-sm font-bold text-gray-900 dark:text-white">
                        $599
                    </span>

                    {{-- Comment button --}}
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                        </svg>
                    </a>

                    <span class="text-sm font-bold text-gray-900 dark:text-white">
                        $599
                    </span>
                </div>

            </div>
        </div>
    </div>

    @empty

    @endforelse
</div>
