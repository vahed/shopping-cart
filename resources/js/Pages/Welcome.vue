<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Footer from '@/Layouts/Footer.vue';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
})

</script>

<template>

    <Head title="Welcome" />

    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>

    <Carousel />

    <!-- main -->

    <section class="container mx-auto px-6 p-10">
        <h1 class="text-2xl text-center font-black">Choose the category suitable for your need</h1>
        <div class="grid grid-cols-3 gap-3 mt-5">
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/4960250/pexels-photo-4960250.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/4066296/pexels-photo-4066296.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/1471628/pexels-photo-1471628.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 p-10">
        <h1 class="text-1xl text-center font-black">Look at our fine stylish foot ware</h1>
        <div class="grid grid-cols-4 gap-2 mt-5">
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/786003/pexels-photo-786003.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/267320/pexels-photo-267320.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/1478442/pexels-photo-1478442.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>
            <div>
                <img class="carousel-height block w-full" src="https://images.pexels.com/photos/2351858/pexels-photo-2351858.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="First slide" />
            </div>

        </div>
    </section>


    <!-- footer -->
    <footer class="bg-gray-100">
        <Footer />
    </footer>

</template>

<script>
import Carousel from '../Components/Carousel.vue'

export default {
    components : {
        Carousel
    },
}
</script>
<style scoped>
body {
  margin: 0;
}

a {
  color: #FFF;
  display: block;
}
</style>
