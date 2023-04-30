<script setup>
import Navbar from "@/Shared/Navbar.vue"
import Footer from "@/Layouts/Footer.vue"
import { Head } from '@inertiajs/inertia-vue3'
</script>

<template>
<!--    <Head title="Checkout" />-->

    <!-- Navbar -->
<!--    <div class="grid grid-cols-1 divide-y">-->
<!--        <Navbar />-->
<!--    </div>-->

<!--    <div class="container mx-auto mt-8">-->
<!--         <form class="w-full max-w-lg mx-auto">-->
<!--            <div class="flex flex-wrap -mx-3 mb-6">-->
<!--                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">-->
<!--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">-->
<!--                    First Name-->
<!--                </label>-->
<!--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">-->
<!--                <p class="text-red-500 text-xs italic">Please fill out this field.</p>-->
<!--                </div>-->
<!--                <div class="w-full md:w-1/2 px-3">-->
<!--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">-->
<!--                    Last Name-->
<!--                </label>-->
<!--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="flex flex-wrap -mx-3 mb-6">-->
<!--                <div class="w-full px-3">-->
<!--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">-->
<!--                    Password-->
<!--                </label>-->
<!--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">-->
<!--                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="flex flex-wrap -mx-3 mb-2">-->
<!--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">-->
<!--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">-->
<!--                    City-->
<!--                </label>-->
<!--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">-->
<!--                </div>-->
<!--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">-->
<!--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">-->
<!--                    State-->
<!--                </label>-->
<!--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" type="text" placeholder="State">-->
<!--                </div>-->
<!--                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">-->
<!--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">-->
<!--                    Zip-->
<!--                </label>-->
<!--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mt-5 w-full">-->
<!--                <button-->
<!--                    class="flex float-right text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg"-->
<!--                    @click="processPayment"-->
<!--                    :disabled="paymentProcessing"-->
<!--                    v-text="paymentProcessing ? 'Processing' : 'Pay Now'"-->
<!--                ></button>-->
<!--            </div>-->
<!--        </form>-->

<!--&lt;!&ndash;        <form class="w-full max-w-lg mx-auto" method="post" @submit.prevent="submit">&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="text" v-model="form.price">&ndash;&gt;-->
<!--&lt;!&ndash;            <button&ndash;&gt;-->
<!--&lt;!&ndash;                    class="flex float-right text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"&ndash;&gt;-->
<!--&lt;!&ndash;                    :disabled="paymentProcessing"&ndash;&gt;-->
<!--&lt;!&ndash;                    v-text="Pay ? 'Processing' : 'Pay Now'"&ndash;&gt;-->
<!--&lt;!&ndash;                ></button>&ndash;&gt;-->
<!--&lt;!&ndash;        </form>&ndash;&gt;-->
<!--    </div>-->

    <!-- footer -->
<!--    <footer class="bg-gray-100 mt-10 ">-->
<!--        <Footer />-->
<!--    </footer>-->

    <body class="flex flex-col min-h-screen ">
    <header>
        <Head title="Checkout" />
        <div class="grid grid-cols-1 divide-y">
            <Navbar />
        </div>
    </header>
    <main class="flex-grow">
        <div class="container mx-auto mt-8">
            <form class="w-full max-w-lg mx-auto">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            First Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Last Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Password
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                        <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                            City
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                            State
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" type="text" placeholder="State">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                            Zip
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
                    </div>
                </div>
                <div class="mt-5 w-full">
                    <button
                        class="flex float-right text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg"
                        @click="processPayment"
                        :disabled="paymentProcessing"
                        v-text="paymentProcessing ? 'Processing' : 'Pay Now'"
                    ></button>
                </div>
            </form>

        </div>
    </main>
    <footer class="bg-gray-100 mt-10">
            <Footer />
    </footer>
    </body>
</template>

<script>
export default {
    name: "Checkout.vue",
    data() {
        return {
            // stripe: {},
            // cardElement: {},
            // customer: {
            //     first_name: '',
            //     last_name: '',
            //     email: '',
            //     address: '',
            //     city: '',
            //     state: '',
            //     zip_code: ''
            // },
            form: {
                price: null
            },
            paymentProcessing: false
        }
    },
    methods: {
        submit() {
            this.$inertia.post('shop', this.form)
        }
    }
}
</script>

<style scoped>

</style>
