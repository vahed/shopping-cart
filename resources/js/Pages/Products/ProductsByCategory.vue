<template>
<!--    <div class="grid grid-cols-1">-->
<!--        <div><Navbar /></div>-->
<!--        <div><Search /></div>-->
<!--    </div>-->
    <Navbar />
    <Search />

    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 mt-10">
        Products
    </h2>

    <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2">
        <div v-for="product in productsByCategory.data[0].products" :key="product.id">
            <div class="bg-white overflow-hidden" @click="showProduct(product)">
                <div class="p-4">
                    <img class="w-full mb-4" :src="product.product_features[0].images[0].image_url">
                    <div class="flex justify-between">
                        <div class="text-sm font-mont">{{ product.name }}</div>
                        <div class="text-sm font-mont">{{ formatCurrency(product.product_features[0]["price"]) }}</div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <Pagination :products="productsByCategory" />

</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from "@/Shared/Navbar.vue";
import Pagination from "@/Components/Pagination.vue"
import Search from "@/Layouts/Search.vue";

export default {
    name: "ProductByCategory.vue",
    components: {
        Search,
        Navbar,
        Head,
        Link,
        Pagination
    },
    props: {
        productsByCategory: Object,
        errors: Object,
        message: Object
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        showProduct(product) {
            this.$inertia.get(this.route('products.show',product.id))
        }
    }
}
</script>

<style scoped>

</style>
