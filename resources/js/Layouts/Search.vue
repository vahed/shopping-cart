<template>
    <nav>
        <div class="mx-auto px-4 sm:px-6 lg:px-8" style="background-color: #FFC72C">

            <form @submit.prevent="submit">
                <div class="flex mx-auto pt-2 pb-2 lg:w-2/3 xl:w-1/2 md:w-2/3 sm:w-full">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
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
