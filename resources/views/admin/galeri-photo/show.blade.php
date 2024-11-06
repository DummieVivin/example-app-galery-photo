<x-app-layout>
    <title>{{ $pageTitle }} | {{ config('app.name') }}</title>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $album->title }}
            </h2>
        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Start Edit Form Galeri Photo --}}
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        {{__('Halaman Show Album Galeri Photo')}}
                    </div>
                    {{-- End Edit Form Galeri Photo --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
