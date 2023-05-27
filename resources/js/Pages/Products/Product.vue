<template>
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>


    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 mt-5">
        محصولات
    </h2>

    <div class="grid xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2">
        <div v-for="product in products.data" :key="product.id">
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
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        showProduct(product) {
            console.log(product.id)
            this.$inertia.get(this.route('products.show',product.id),{
                onBefore: (visit) => {console.log('before')},
                onStart: (visit) => {console.log('on start')},
                onProgress: (progress) => {console.log('progress')},
                onSuccess: (page) => {console.log('page')},
                onError: (errors) => {console.log('errors')},
                onCancel: () => {console.log('cancel')},
                onFinish: visit => {console.log('visit')},
            })
        }
    }
}
</script>

<style scoped>
@media screen and (max-width: 639px) {
    .mobileImgView {
        background-color: blue;
        width: 50%;
    }
}
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
