<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot> --}}
    <title> {{ $pageTitle }} | {{ config('app.name') }} </title>

    <div class="py-12" id="vue-app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Modal toggle -->
                <div class="p-6 text-gray-900 dark:text-gray-100" v-if= "isOpenForm == false">
                    <button
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" @click="openForm">
                        @{{ message }}
                    </button>
                </div>
                <!-- End toggle -->

                <!-- Main Modal -->
                <div v-if="isOpenForm"
                    class="fixed flex inset-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">

                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Product
                            </h3>
                            <button @click="closeForm"
                                    type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <form @submit.prevent="onSubmit" class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">

                                <div class="col-span-2">
                                    <label for="name"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text"
                                               v-model="nameProject"
                                               id="name"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="Type product name" required="">
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="number"
                                           v-model="priceProject"
                                           id="price"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           placeholder="$2999" required="">
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        <option v-for="option in options" :key="option" :value="option">@{{option}}</option>
                                    </select>
                                </div>

                                <div class="col-span-2">
                                    <label for="description"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                           Product Description</label>
                                    <textarea id="description"
                                              rows="4"
                                              v-model="description"
                                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                              placeholder="Write product description here"></textarea>
                                    </div>
                                </div>

                                <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                              clip-rule="evenodd"></path></svg>
                                    Add new product
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

            </div>
        </div>
    </div>

    <script type="module">
        import {
            createApp,
            ref,
            reactive
        } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

        createApp({
            setup() {
                const message = ref('Hello Vue!')
                const isOpenForm = ref(false);
                const nameProject = ref("");
                const priceProject = ref(0);
                const selectedOption = ref("");
                const description = ref("");
                const options = ["TV/Monitors","PC","Gaming/Console","Phones","Website"];
                const errors = reactive({
                    nameProject:'',
                    priceProject:'',
                    selectedOption:'',
                    description:    ''
                });

                function openForm() {
                    return isOpenForm.value = true;
                }

                function closeForm() {
                    return isOpenForm.value = false;
                }
                function onSubmit(){
                    console.log(nameProject, priceProject, description, selectedOption);
                }

                return {
                    onSubmit,
                    nameProject,
                    priceProject,
                    selectedOption,
                    description,
                    options,
                    errors,
                    message,
                    openForm,
                    closeForm,
                    isOpenForm
                }
            }
        }).mount('#vue-app')
    </script>

</x-app-layout>
