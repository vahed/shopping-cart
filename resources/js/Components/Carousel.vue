<template>
    <div>
        <swiper
            class=" cursor-grab cursor-gray-500 max-w-screen-lg m-auto mt-20"
            :modules="modules"
            :space-between="20"
            :loop="true"
            :navigation="false"
            :pagination="{ clickable: true }"
            :autoplay="{
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            }"
            :scrollbar="{ draggable: true }"
        >
            <swiper-slide v-for="text in swiperTextBase" :key="text.description" class="pb-14 ">
                <div>
                    <h1 class="text-center font-bold text-2xl pb-6 lg:text-3xl">{{text.header}}</h1>
                    <p class="text-center text-gray-500 mb-5">{{text.description}}</p>
                </div>
                <img :src="text.image" alt="image" class="w-full h-80 mt-5 m-auto lg:m-0"/>
            </swiper-slide>

        </swiper>
    </div>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination} from 'swiper';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import 'swiper/css/scrollbar';
import {ref} from 'vue'

// Import Swiper styles
export default {
    components: {Swiper, SwiperSlide},
    setup() {
        const swiperTextBase = ref([
            {
                image: "https://images.pexels.com/photos/298863/pexels-photo-298863.jpeg",
                header: "Welcome to your online store",
                description: "Our clothing is the one the finest collection of european styles"
            },
            {
                image: "https://images.pexels.com/photos/291762/pexels-photo-291762.jpeg",
                header: "Trendy styles",
                description: "We present our quality products"
            },
            {
                image: "https://images.pexels.com/photos/1040424/pexels-photo-1040424.jpeg",
                header: "Search our top brand collections",
                description: "Browse our chique and trendy looking fashions"
            }
        ]);
        return {modules: [Pagination, Autoplay], swiperTextBase}

    },
};
</script>

<style scoped>
.swiper-button-next{
    color: green !important;
}
</style>
