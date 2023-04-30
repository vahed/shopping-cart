<script setup>
defineProps({
    cartItems: Object
})
</script>

<template>

    <Navbar />
    <div class="m-5" v-if="$page.props.flash.error" id="dialog">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $page.props.flash.error }}</span>
        </div>
    </div>

    <div class="grid grid-cols-12 mx-2 gap-2">
        <div class="divide-y divide-solid xl:col-span-7 lg:col-span-7 md:col-span-7 col-span-12">
            <div class="text-2xl ml-5 font-semibold mt-20">Shopping Basket</div>
            <div class="mt-5" v-if="cartItems.length === 0">
                <Link :href="route('products.index')">Browse to product page</Link>
            </div>
            <div class="flex flex-row mt-5" v-for="(cartItem, key) in cartItems" :key="key">
                <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm rounded-tl rounded-bl font-bold">
                    <a href="">
                        <img  class="w-1/3" src="https://via.placeholder.com/440x200" alt=""/>
                    </a>
                </div>
                <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold">
                    {{ cartItem.name }}
                    <div class="flex flex-row mt-5">
                        <div class="basis-1/3" v-text="cartItem.qty">
                        </div>
                        <div class="basis-1/3">
                            <Link @click="incrementCount(cartItem)" preserve-state>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </Link>
                        </div>
                        <div class="basis-1/3">
                            <Link @click="decrementCount(cartItem)" preserve-state>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </Link>
                        </div>
                        <div class="basis-1/3">
                            <Link class="text-blue-500" @click="deleteSingleItem(cartItem)" preserve-state>
                                Delete
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:col-span-5 lg:col-span-5 md:col-span-5 col-span-12">
            <Summary
                @increment-by-one="incrementCount($event)"
                @decrement-by-one="decrementCount($event)"
                @delete-item="deleteSingleItem($event)"
                :cartItems="cartItems"
                @formatCurrency="formatCurrency($event)"
            >
            </Summary>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import Navbar from "@/Shared/Navbar.vue"
import Summary from "@/Pages/Cart/Summary.vue"

export default {
    name: "Cart.vue",
    data() {
        return {
        }
    },
    components: {
        Navbar,
        Summary,
        Inertia,
        Link
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        incrementCount(item) {
            this.$inertia.put(this.route('cart.incrementItem', item.rowId), item, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            })
        },
        decrementCount(item) {
            this.$inertia.put(this.route('cart.decrementItem', item.rowId), item, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            })
        },
        deleteSingleItem(item) {

            this.$inertia.delete(this.route('cart.delete', item.rowId), item, {
                preserveScroll: true,
                preserveState: true,
                resetOnSuccess: false
            })
        },

    },

}
</script>

<style scoped>
</style>
