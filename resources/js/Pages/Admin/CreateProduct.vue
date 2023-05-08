<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';

defineProps({
    'categories': Object,
    'brands': Object,
    'categoryItems': Object,
    errors: Object,
    error: null,
    success: null
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
                    <div class="p-6 bg-white border-gray-200">

                        <div class="m-5" v-if="$page.props.flash.error" id="dialog" preserveScroll>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $page.props.flash.error }}</span>
                            </div>
                        </div>

                        <div class="m-5" v-if="$page.props.flash.success" id="dialog" preserveScroll>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ $page.props.flash.success }}</span>
                            </div>
                        </div>

                        <div class="text-center text-2xl mb-10">ایجاد محصول جدید</div>
                        <form class="w-full max-w-lg mx-auto" @submit.prevent="submit">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        اسم محصول
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500"
                                           id="grid-password"
                                           type="text"
                                           v-model="form.productName"
                                    >
                                    <div v-if="errors.productName" class="text-red-500">{{ errors.productName }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        کُد محصول
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border
                                                border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                                                focus:bg-white focus:border-gray-500" id="grid-password"
                                           type="text"
                                           v-model="form.productCode"
                                    >
                                    <div v-if="errors.productCode" class="text-red-500">{{ errors.productCode }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        اسم برند
                                    </label>
                                    <select v-model="form.brandName">

                                        <option v-for="option in brands" :value="option['id']">
                                            {{ option['brand_name'] }}
                                        </option>

                                    </select>
                                    <div v-if="errors.brandName" class="text-red-500">{{ errors.brandName }}</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        دسته بندی محصول
                                    </label>
                                    <select v-model="form.productCategory">
                                        <option v-for="option in cat(categoryItems)" :value="option.id">
                                            {{ option.name }}
                                        </option>
                                    </select>

                                    <div v-if="errors.productCategory" class="text-red-500">{{ errors.productCategory }}</div>
                                </div>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    class="float-left defaultButton mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    محصول اضافه کنید
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
  import {isEmpty} from "lodash/lang";

  export default {
    data() {
      return {

        form: {
            productName: null,
            productCode: null,
            productCategory: null,
            brandName: null
        },
      }
    },
    methods: {
        cat(obj) {
            let result = []
            function recursiveFx(obj) {
                for (let key in obj) {
                    if (typeof obj[key] === "object") {
                        recursiveFx(obj[key])
                    }
                    if (isEmpty(obj.children) && obj.name) {
                        let newObj = {}
                        newObj["id"] = obj.id
                        newObj["name"] = obj.name
                        result.push(newObj)
                    }
                }
                //filter result based on category id
                return Object.values(
                    result.reduce( (c, e) => {
                        if (!c[e.id]) c[e.id] = e;
                        return c;
                    }, {})
                );

            }
            return recursiveFx(obj)
        },
        submit() {
            console.log(this.form)
            this.$inertia.post('/adminProduct', this.form , {
                onSuccess: () => this.form.reset(),
            })
        }

    }
  }
  </script>
