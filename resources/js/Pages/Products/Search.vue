<template>
    <Navbar />

    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 mt-5">
        Products
    </h2>

    <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2">
        <div v-for="product in products.data" :key="product.id">
            <div class="m-4 bg-white rounded shadow overflow-hidden " @click="showProduct(product)">
                <div class="p-4">
                    <img class="w-full mb-4" :src="product.product_features[0].images[0].image_url">
                    <div class="font-semibold text-sm font-mont">{{ product.name }}</div>
                </div>
                <div class="border-t px-4 py-2 fonr-bold text-sm font-mont">{{ formatCurrency(product.product_features[0]["price"]) }}</div>
            </div>
        </div>
    </div>


    <Pagination :products="products" />
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from "@/Shared/Navbar.vue";
import Pagination from "@/Components/Pagination.vue"
export default {
    name: "Search"
}
</script>

<style scoped>

</style>
