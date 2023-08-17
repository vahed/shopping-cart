<script setup>
import { ref } from 'vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Footer from '@/Layouts/Footer.vue';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";

const showingNavigationDropdown = ref(false);

defineProps({
    urlBeforeLogin: String,
    orders: Object
});

</script>

<template>
    <Head title="Dashboard" />
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>
    <div id="previous-page">
        <div class="text-4xl mt-10 font-bold text-center text-gray-800 mb-8">
            داشبورد کاربر
        </div>
        <div v-if="urlBeforeLogin">
            <Link :href="urlBeforeLogin">بازگشت به صفحه اولیه</Link>
        </div>
        <div class="bg-gray-100 rounded-md xl:mx-10 lg:mx-10 md:mx-10 sm:mx-10 m3">
            <div v-if="orders">
                <br/>
                <div class="text-center text-2xl mb-12">تاریخچه سفارشات</div>
                <div class="container mx-auto">
                    <div class="sm:grid sm:grid-cols-12 xs:flex" v-for="order in orders.data" :key="order.id">
                        <div
                            class="flex justify-center items-center bg-gray-100 sm:mb-8"
                        >
                            <img :src="order.image_url" class="h-40 rounded-md"/>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 overflow-x-auto col-span-10 border-gray-200 border-b-2 mb-5">
                            <div
                                class="flex justify-center p-6 text-lg bg-gray-100 pb-1 sm:p-2 lg:p-2 xl:p-2 md:p-2"
                            >
                                {{ order.name }}
                            </div>
                            <div
                                class="flex justify-center p-6 text-lg bg-gray-100 p-0"
                            >
                                {{ order.quantity }}
                            </div>
                            <div
                                class="flex justify-center p-6 text-lg bg-gray-100 p-0 mb-3"
                            >
                                {{ order.price }}
                            </div>
                        </div>
                    </div>
                </div>



                <div class="mb-20 mt-5">
                    <Pagination :products="orders" />
                </div>
            </div>

            <div v-else>
                <div class="text-xl bg-white mb-80">داشبورد شما خالی است</div>
            </div>
        </div>
    </div>
    <Footer />
</template>

<script>
import Pagination from "@/Components/Pagination.vue"

export default {
    components: {
        Pagination
    },
    methods: {
    }
}
</script>
