<script setup>
import { ref, watch } from 'vue'

let props = defineProps({
    products: Object,
    default: () => ({}),
})

let search = ref('')

watch(search, value => {
    this.$inertia.get(this.route('products.index',{search: value }),{
        preserveState: true,
        replace: true,
    })
})
</script>

<template>
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>


    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 mt-5">
        محصولات
    </h2>

    <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-2">
        <div v-for="product in products['data']" :key="product.id">
            <div class="bg-white overflow-hidden" @click="showProduct(product)">
                <div class="p-4">
                    <img class="w-full mb-4" :src="product['product_features'][0].images[0]['image_url']" alt="product.id">
                    <div class="flex justify-between">
                        <div class="text-sm font-mont">{{ product.name }}</div>
                        <div class="text-sm font-mont">{{ product['product_features'][0]["price"] }}</div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="mb-20 mr-3 mt-5">
        <Pagination :products="products" />
    </div>


    <footer>
        <Footer />
    </footer>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from "@/Shared/Navbar.vue";
import Pagination from "@/Components/Pagination.vue"
import Search from "@/Layouts/Search.vue";
import Footer from "@/Layouts/Footer.vue";

export default {
    name: "Product.vue",
    components: {
        Footer,
        Search,
        Navbar,
        Head,
        Link,
        Pagination
    },
    props: {
        products: Object,
        errors: Object,
        message: Object
    },
    methods: {
        // formatCurrency(price) {
        //     price = (price /100);
        //     return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        // },
        showProduct(product) {
            console.log(product.id)
            this.$inertia.get(this.route('products.show',product.id),{
            })
        }
    }
}
</script>
