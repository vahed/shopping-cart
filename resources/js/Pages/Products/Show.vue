<script setup>
import Navbar from "@/Shared/Navbar.vue"
import Search from "@/Layouts/Search.vue";
import { Head } from '@inertiajs/inertia-vue3'

</script>

<template>
    <Head>
        <title>Show product</title>
    </Head>

    <!-- Navbar -->
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>

    <section class="container mx-auto mt-10" v-if="product">
        <div class="grid xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 xm:grid-col-12 gap-4">

            <div class="xl:flex lg:flex md:flex xs:flex">
                    <div class="max-w-xl flex flex-col xs:m-3 sm:mb-16 xl:mb-20 lg:mb-20 md:mb-20 sm:mb-24">
                        <div class="flex items-center">
                            <div class="w-full sm:w-108 flex justify-center">
                                <img ref="mainImage" :src="photos[0]" class="w-full xs:w-auto sm:w-auto sm:h-80 m-l-10 m-r-10" loading="lazy" alt="img"/>
                            </div>
                        </div>

                        <div class="flex justify-center xs:justify-evenly mt-1 xs:bg-yellow-300 xs:border-gray-200-400 xs:m-4 xs:border-2">
                            <div v-for="(img, key) in photos" :key="key">
                                <img :src="img" :class="{'ring-2 opacity-50': currentPhoto === key}" class="h-16 xs-thumb-img sm-thumb-img md-thumb-img lg-thumb-img xl-thumb-img sm:m-1" alt="img" @click="pickPhoto(key)" />
                            </div>
                        </div>
                    </div>
            </div>

            <div class="xl:col-span-2 lg:col-span-2 md:col-span-2 sm:col-span-2 m-5">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0" >
                    <div class="grid grid-cols-2 gap-4">
                        <div class="title-font font-medium text-2xl text-gray-900 float-right">{{ product[0].name }}</div>
                        <!-- ... -->
                        <div class="float-right text-right font-bold">{{ formatCurrency(price) }}</div>
                    </div>
                    <div
                        class="mt-4 leading-relaxed"
                        v-text="description"
                    ></div>

                    <!-- display colors -->
                    <div v-for="(product_feature,key) in product[0].product_features" class="mt-3 flex inline-flex" :key="key">
                        <span class="p-3 m-1 rounded-full" :style="{'background-color':product_feature.color}" @click="changeColor(product_feature)">
                            <!-- {{ colors.color }} -->
                        </span>
                    </div>

                    <div class="font-semibold grid grid-cols-1 mt-4 gap-4 border-t-2 text-right">
                        <span
                            :class="checkQty(totalQuantity) === 'موجود نیست' ? 'text-red-600'
                                    : checkQty(totalQuantity) === 'تعداد کمی موجود است' ? 'text-red-400'
                                    : 'text-green-600'"
                            class="mt-4"
                        >{{ checkQty(totalQuantity) }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex border-yellow-200 mt-4">
                            <div
                                class="title-font font-medium text-2xl text-gray-900"
                            >تعداد
                            </div>
                        </div>
                        <div class="float-right text-right mt-4">
                                <select :v-model="quantity" @change="switchSelect($event)"
                                        class="float-right appearance-none bg-white border border-yellow-400 hover:border-yellow-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                >
                                    <option selected="selected">1</option>
                                    <option v-for="(quantity, key) in quantities" :value="quantity" :key="key">
                                        {{ quantity }}
                                    </option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-yellow-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
                                </div>
                        </div>

                    </div>

                    <div class="flex mt-6 pt-4 border-t-2 border-gray-200">
                        <button
                            class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded"
                            @click.prevent="addToCard(quantity)"
                        >به سبد اضافه کنید</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>

<script>
import Footer from '@/Layouts/Footer.vue';
export default {
    name: "Show.vue",
    components: { Footer},
    data() {
        return {
            photos: [],
            productName: String,
            color: String,
            size: String,
            productId: null,
            featureId: null,
            quantity: 1,
            quantities: [2,3,4,5,6,7,8,9,10],
            totalQuantity: 0,
            price: null,
            description: String,
            currentPhoto: -1,
            changePhotos: [],
            productFeature: Object
        }
    },
    props: {
        product: Object,
        errors: Object,
        message: Object,
    },
    methods: {
        switchSelect(event) {
            this.quantity = event.target.value;
        },
        nextPhoto() {
            if ( this.hasNext() ) {
                this.currentPhoto++;
                this.changePhoto();
            }
        },
        previousPhoto() {
            if ( this.hasPrevious() ) {
                this.currentPhoto--;
                this.changePhoto();
            }
        },
        changePhoto() {
            this.$refs.mainImage.src = this.photos[this.currentPhoto];
        },
        pickPhoto(index) {
            this.currentPhoto = index;
            this.changePhoto();
        },
        hasPrevious() {
            return this.currentPhoto > 0;
        },
        hasNext() {
            return this.photos.length > (this.currentPhoto + 1);
        },
        changeColor(product_feature) {
            let arr= []
            this.price = product_feature.price
            this.totalQuantity = product_feature.quantity
            this.size = product_feature.size
            this.color = product_feature.color
            this.name = product_feature.price
            this.description = product_feature.description
            this.featureId = product_feature.id

            Object.keys(product_feature.images).forEach(function(key) {
                arr.push(product_feature.images[key]['image_url'])
            });

            this.photos = arr

        },
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        addToCard(quantity) {
            this.$inertia.post(this.route('cart.store', {
                id: this.productId,
                featureId: this.featureId ,
                name: this.productName,
                color: this.color,
                size: this.size,
                price: this.price,
                description: this.description,
                quantity: quantity,
                totalQuantity: this.totalQuantity
            }, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            }))
        },
        checkQty(totalQuantity) {
            if(totalQuantity < 10 && totalQuantity > 0)
                return 'تعداد کمی موجود است'
            else if(totalQuantity === 0)
                return 'موجود نیست'
            else
                return 'موجود ا ست'
        }
    },
    created() {
        this.photos = this.defaultProductPhotos
        this.productFeature = this.product[0].product_features[0]
        this.productId = this.product[0].id
        this.productName = this.product[0].name
        this.color = this.product[0].product_features[0].color
        this.size = this.product[0].product_features[0].size
        this.price = this.product[0].product_features[0].price
        this.description = this.product[0].product_features[0].description
        this.totalQuantity = this.product[0].product_features[0].quantity
        this.featureId = this.product[0].product_features[0].id
    },
    computed: {
        defaultProductPhotos() {
            let arr= []
            let entries = Object.entries(this.product[0].product_features[0]['images'])
                entries.map( ([val] = entry) => {
                arr.push(val['image_url'])
            });
            this.photos = arr
            return arr
        }
    }

}
</script>

<style scoped>
</style>
