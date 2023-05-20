<script setup>
defineProps({
    cartItems: Object
})
</script>

<template>
    <div class="w-full">
        <div class="lg:w-2/3 w-full mx-auto mt-8 overflow-auto">
            <div class="text-gray-900 text-xl title-font font-medium mb-4 text-center font-bold">سبد خرید</div>
            <form name="form">
                <div class="flex flex-row">
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm rounded-tl rounded-bl font-bold">کالا</div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold">تعداد</div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold">قیمت</div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold">اقدامات</div>
                </div>
                <div class="divide-y divide-solid m-4">
                    <div></div>
                    <div></div>
                </div>
                <div class="flex flex-row" v-for="item in cartItems" :key="item.id">
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font font-medium text-gray-900 text-sm" v-text="item.name"></div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font font-medium text-gray-900 text-sm" v-text="item.qty"></div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font font-medium text-gray-900 text-sm">{{ formatCurrency(item.price) }}</div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font font-medium text-gray-900 text-sm">
                        <div class="flex flex-row">
                                <div class="basis-1/4">
                                    <Link @click="$emit('incrementByOne', item)" preserve-state>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                    </Link>
                                </div>
                                <div class="basis-1/4">
                                    <Link @click="$emit('decrementByOne', item)" preserve-state>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </Link>
                                </div>
                                <div class="basis-1/4">
                                    <Link @click="$emit('deleteItem', item)" preserve-state>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-500 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="divide-y divide-solid m-4">
                    <div></div>
                    <div></div>
                </div>
                <div class="flex flex-row">
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm rounded-tl rounded-bl font-bold">کل تعداد</div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold"></div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold"></div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold" v-text="orderTotalQuantity"></div>
                </div>
                <div class="flex flex-row">
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm rounded-tl rounded-bl font-bold">قیمت کل</div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold"></div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold"></div>
                    <div class="basis-1/3 md:basis-1/3 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm font-bold" v-text="orderTotalPrice"></div>
                </div>
                <div class="m-4">
                    <Link :href="route('checkout.index')">
                        <button class="w-full bg-yellow-500 hover:bg-yellow-500 font-bold p-3 rounded text-white focus:outline-none hover:bg-yellow-600 rounded">
                            به سمت پرداخت
                        </button>
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {

    name: "Summary.vue",
    components: {
        Link
    },
    props: {
        errors: Object,
        message: Object
    },
    methods: {
        formatCurrency(price) {
            price = (price /100);
            return price.toLocaleString('en-GB', { style: 'currency', currency: 'GBP'})
        },
        proceedToCheckout() {
            return this.$inertia.get(this.route('checkout.index'))
        }
    },
    computed: {
        orderTotalQuantity() {

            let itemsToArray = this.convertCartItemToArray
            let quantity = 0

            for(let i in itemsToArray){
                quantity += Number(itemsToArray[i]['qty'])
            }

            return quantity

        },
        convertCartItemToArray() {

            let convertItemsToArray = [];

            for(let items in this.cartItems){
                convertItemsToArray.push(this.cartItems[items])
            }

            return convertItemsToArray
        },
        orderTotalPrice() {

            let itemsToArray = this.convertCartItemToArray
            let amount = 0
            let quantity = 0
            let totalAmount = 0

            for(let i in itemsToArray){
                amount = Number(itemsToArray[i]['price'])
                quantity = Number(itemsToArray[i]['qty'])
                //console.log(quantity)
                totalAmount += amount * quantity;
            }

            totalAmount = (totalAmount / 100);

            return totalAmount.toLocaleString('en-GB', { style: 'currency', currency: 'GBP' });

        }
    },
    created() {
        this.cartItems
    },
}
</script>

<style scoped>

</style>
