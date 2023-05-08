<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    'brands': Object,
    errors: Object,
    success: null,
    error: null
})
</script>

<template>
    <Head title="Create product" />

    <AuthenticatedLayout>
        <template #header>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="m-5" v-if="$page.props.flash.success" id="dialog" preserveScroll>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $page.props.flash.success }}</span>
                            </div>
                        </div>

                        <div class="text-center text-2xl mb-10">ایجاد برند جدید</div>

                        <form class="w-full max-w-lg mx-auto" @submit.prevent="submit">
                            <div class="flex flex-wrap -mx-3 mb-6" v-if="brands">
                                <div class="w-full px-3">
                                    <p class="mb-2 text-blue-600 text-xs italic">اسامی برندهای موجود در بانک داده‌هاجهت یادآوری۰</p>
                                    <select>
                                        <option v-for="option in brands">
                                            {{ option.brand_name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        اسم برند
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500"
                                           id="grid-password"
                                           type="text"
                                           v-model="form.brandName"
                                    >
                                    <div v-if="errors.brandName" class="text-red-500">{{ errors.brandName }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        رنگ برند
                                    </label>
                                    <select v-model="form.brandColor" @change="showColor(form.brandColor)">
                                        <option v-for="(option, key) in colors" :value="option">
                                            {{ key}}
                                        </option>
                                    </select>
                                    <span class="p-3 mr-5 w-24" :style="{'background-color':color}">
                                    </span>
                                    <div v-if="errors.brandColor" class="text-red-500">{{ errors.brandColor }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        سایز برند
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           v-model="form.brandSize"
                                    >
                                    <div v-if="errors.brandSize" class="text-red-500">{{ errors.brandSize }}</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <button
                                    type="submit"
                                    class="defaultButton ml-3 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    برند اضافه کنید
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "CreateBrand",
    data() {
        return {
            isButton: true,
            form: {
                brandName: null,
                brandColor: null,
                brandSize: null
            },
            color: null,
            colors: {
                "سفید" : "#FFFFFF",
                "توسی" : "#C0C0C0",
                "خاکستری" : "#808080",
                "مشکی" : "#000000",
                "قرمز" : "#FF0000",
                "قرمز آلبالویی" : "#800000",
                "زرد" : "#FFFF00",
                "زیتونی" : "#808000",
                "لیمویی" : "#FAFAD2",
                "سبز" : "#008000",
                "فیروزه‌ای" : "#00FFFF",
                "آبی" : "#0000FF",
                "لاجوردی" : "#000080",
                "نارنجی" : "#FFA500",
                "صورتی" : "#FFA500",
                "ارغوانی" : "#C71585",
                "بنفش" : "#9932CC",
                "نخودی" : "#EEE8AA",
                "ارکیده" : "#DA70D6",
                "طلایی" : "#FFD700",

            }
        }
    },
    methods: {
        submit() {
            console.log(this.form)
            this.$inertia.post('/createNewBrand', this.form, { preserveState: false })

        },
        showColor(color) {
            this.color = color
        }
    }
}
</script>

<style scoped>

</style>
