<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    'products': Object,
    'productFeatures': Object,
    errors: Object,
    error: null,
    success: null
})
</script>
<template>
    <Head title="Create product feature" />

    <AuthenticatedLayout>
        <template #header>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="m-5" v-if="$page.props.flash.error" id="dialog" preserveScroll>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $page.props.flash.error }}</span>
                            </div>
                        </div>

                        <div class="m-5" v-if="$page.props.flash.success" id="dialog" preserveScroll>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $page.props.flash.success }}</span>
                            </div>
                        </div>

                        <div class="text-center text-2xl mb-10">Add Product Image</div>
                        <form class="mx-auto" @submit.prevent="submit">

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Name
                                    </label>
                                    <select v-model="form.productName" @change="findProductFeatures($event)">
                                        <option v-for="product in products" :value="product.id">
                                            {{ product.name }}
                                        </option>
                                    </select>

                                    <div v-if="errors.productFeatureId" class="text-red-500">{{ errors.productFeatureId }}</div>
                                </div>
                            </div>


                            <table class="table-auto" v-if="productFeatures">
                                <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Feature Id</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Description</th>
                                    <th>Discount</th>
                                    <th>Stock</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="productFeature in productFeatures"
                                        @click="addImageURL(productFeature.id)"
                                        :key="productFeature.id"
                                        class="hover:bg-slate-200"
                                    >
                                        <td>
                                            {{ productFeature.id }}
                                        </td>
                                        <td>
                                            {{ productFeature.product_id }}
                                        </td>
                                        <td>
                                            {{ productFeature.price }}
                                        </td>
                                        <td>
                                            {{ productFeature.quantity }}
                                        </td>
                                        <td>
                                            {{ productFeature.size }}
                                        </td>
                                        <td>
                                            {{ productFeature.description }}
                                        </td>
                                        <td>
                                            {{ productFeature.discount }}
                                        </td>
                                        <td>
                                            {{ productFeature.in_stock }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="m-5" v-if="selected" id="dialog" preserveScroll>
                                <div class="bg-slate-100 border border-slate-400 text-slate-700 px-4 py-3 rounded relative" role="alert">
                                    <span class="block sm:inline">The feature product with id {{ form.productFeatureId }} is selected to and ready to add image</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Image URL
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product code"
                                           v-model="form.imageURL"
                                    >
                                    <div v-if="errors.imageURL" class="text-red-500">{{ errors.imageURL }}</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <button
                                    @click="submitAdminImage"
                                    type="submit"
                                    class="defaultButton ml-3 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Add new image
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
    name: "CreateProductImage",
    data() {
        return {
            form: {
                //productName: null,
                productFeatureId: null,
                imageURL: "https://loremflickr.com/320/240"
            },
            selected: false
        }
    },
    methods: {
        findProductFeatures(event) {
            //console.log(event.target.value)
            this.$inertia.post('adminGetProductFeature', {"productName":event.target.value})
        },
        addImageURL(value) {
            console.log(value);
            this.form.productFeatureId = value

            this.selected = true
        },
        submitAdminImage() {
            console.log(this.form)
            this.$inertia.post('adminGetProductFeature/storeImage', this.form)
        }
    }
}
</script>

<style scoped>
</style>
