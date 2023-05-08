<template>
    <nav class="bg-white bg-yellow-100">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 bg-yellow-100">

            <form @submit.prevent="submit">
                <div class="flex mx-auto pt-2 pb-2 lg:w-2/3 xl:w-1/2 md:w-2/3 sm:w-full">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
<!--                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>-->
<!--                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">-->
<!--                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">-->
<!--                            <li>-->
<!--                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
                    <div class="relative w-full">
                        <input v-model="form.searchInput" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-yellow-400 focus:border-yellow-400 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-yellow-500" required>
                        <button type="submit" class="absolute top-0 left-0 p-2.5 text-sm font-medium text-white bg-yellow-500 border border-yellow-600 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-600 dark:focus:ring-yellow-700">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Search",
    data() {
        return {
            form: {
                searchInput: null
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post(this.route('products.searchProducts',  this.form ));
        }
    }
}
</script>

<style scoped>

</style>
