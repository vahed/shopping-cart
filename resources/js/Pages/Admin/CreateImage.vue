<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    'images': Object,
    'products': Object,
    success: null,
    error: null
})
</script>

<template>
    <Head title="Create product" />

    <AuthenticatedLayout>
        <template #header>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="m-5" v-if="$page.props.flash.success" id="dialog" preserveScroll>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $page.props.flash.success }}</span>
                            </div>
                        </div>

                        <div class="text-center text-2xl mb-10">Create Brand</div>
                        <form class="w-full max-w-lg mx-auto" @submit.prevent="submit">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Available Brand Name
                                    </label>
                                    <p class="mb-2 text-gray-600 text-xs italic">These are the list of available brands in the database.</p>
                                    <select>
                                        <option v-for="product in products">
                                            {{ product.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Image URL
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500"
                                           id="grid-password"
                                           type="text"
                                           placeholder="Product name"
                                           v-model="form.brandName"
                                    >
                                    <div v-if="errors.brandName" class="text-red-500">{{ errors.image_url }}</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <button
                                    type="submit"
                                    class="defaultButton ml-3 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Add new brand
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "CreateImage",
    data() {
        return {
            isButton: true,
            form: {
                Name: null,
                brandColor: null,
                brandSize: null
            },
        }
    },
    methods: {
        submit() {
            console.log(this.form)
            this.$inertia.post('/createNewImage', this.form, { preserveState: false })

        }
    }
}
</script>

<style scoped>

</style>
