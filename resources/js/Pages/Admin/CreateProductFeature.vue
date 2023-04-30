<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    'products': Object,
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

                        <div class="text-center text-2xl mb-10">Create Product Feature</div>
                        <form class="w-full max-w-lg mx-auto" @submit.prevent="submit">

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Name
                                    </label>
                                    <select v-model="form.productName">
                                        <option v-for="product in products" :value="product.id">
                                            {{ product.name }}
                                        </option>
                                    </select>

                                    <div v-if="errors.productName" class="text-red-500">{{ errors.productName }}</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Price
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product price"
                                           v-model="form.productPrice"
                                    >
                                    <div v-if="errors.productPrice" class="text-red-500">{{ errors.productPrice }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Quantity
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product quantity"
                                           v-model="form.productQuantity"
                                    >
                                    <div v-if="errors.productQuantity" class="text-red-500">{{ errors.productQuantity }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Colour
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product colour"
                                           v-model="form.productColor"
                                    >
                                    <div v-if="errors.productColor" class="text-red-500">{{ errors.productColor }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Size
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product size"
                                           v-model="form.productSize"
                                    >
                                    <div v-if="errors.productSize" class="text-red-500">{{ errors.productSize }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Discount
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product discount"
                                           v-model="form.productDiscount"
                                    >
                                    <div v-if="errors.productDiscount" class="text-red-500">{{ errors.productDiscount }}</div>
                                    <p class="mb-2 text-gray-600 text-xs italic">Discount must be written only digits.</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product In Stock
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           placeholder="Product code"
                                           v-model="form.productInstock"
                                    >
                                    <div v-if="errors.productInstock" class="text-red-500">{{ errors.productInstock }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Description
                                    </label>
                                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                              rows="6"
                                              placeholder="Product description"
                                              v-model="form.productDescription"
                                    />
                                    <div v-if="errors.productDescription" class="text-red-500">{{ errors.productDescription }}</div>
                                </div>
                            </div>

<!--                            <div class="flex flex-wrap -mx-3 mb-6">-->
<!--                                <div class="w-full px-3">-->
<!--                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">-->
<!--                                        Product Image URL-->
<!--                                    </label>-->
<!--                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border-->
<!--                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none-->
<!--                                                focus:bg-white focus:border-gray-500" id="grid-password"-->
<!--                                           type="text"-->
<!--                                           placeholder="Product code"-->
<!--                                           v-model="form.imageURL"-->
<!--                                    >-->
<!--                                    <div v-if="errors.imageURL" class="text-red-500">{{ errors.imageURL }}</div>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <button
                                    type="submit"
                                    class="defaultButton ml-3 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Add new product
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
    name: "CreateProductFeature",
    data() {
        return {

            form: {
                productName: null,

                productPrice: null,
                productQuantity: null,
                productColor: null,
                productDiscount: 0,
                productDescription: null,
                productInstock: 1,
                productSize: null,
                //imageURL: "https://loremflickr.com/320/240"
            },
        }
    },
    methods: {
        submit() {
            console.log(this.form)
            this.$inertia.post('/adminProductFeature', this.form , {
                onSuccess: () => this.form.reset(),
            })
        }
    }
}
</script>

<style scoped>

</style>
