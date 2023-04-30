<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    'categories': Object,
    'originalCategories': Object,
    errors: Object,
    error: null
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
        </template>


        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- categories form -->
                        <div class="mt-10 mb-10 text-gray-900 text-2xl text-center">All Categories</div>
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <form>
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                ID
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Name
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Slug
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Category Code
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Parent Id
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Created At
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Updated At
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                <span class="sr-only">Delete</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr v-for="category in originalCategories" :key="category.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ category.id }}
                                                </th>
                                                <td class="py-4 px-6">
                                                    <input
                                                        type="text"
                                                        class="text-base
                                                               font-normal
                                                               text-gray-700
                                                               bg-white bg-clip-padding
                                                               border border-solid border-gray-300
                                                               rounded
                                                               transition
                                                               ease-in-out
                                                               m-0
                                                               focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        v-model="category.name"
                                                    />
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input
                                                        type="text"
                                                        class="text-base
                                                               font-normal
                                                               text-gray-700
                                                               bg-white bg-clip-padding
                                                               border border-solid border-gray-300
                                                               rounded
                                                               transition
                                                               ease-in-out
                                                               m-0
                                                               focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        v-model="category.slug"
                                                        disabled
                                                    />
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input
                                                        type="text"
                                                        class="text-base
                                                               font-normal
                                                               text-gray-700
                                                               bg-white bg-clip-padding
                                                               border border-solid border-gray-300
                                                               rounded
                                                               transition
                                                               ease-in-out
                                                               m-0
                                                               focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        v-model="category.category_code"
                                                        disabled
                                                    />
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input
                                                        type="text"
                                                        class="text-base
                                                               font-normal
                                                               text-gray-700
                                                               bg-white bg-clip-padding
                                                               border border-solid border-gray-300
                                                               rounded
                                                               transition
                                                               ease-in-out
                                                               m-0
                                                               focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        v-model="category.parent_id"
                                                    />
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input
                                                        type="text"
                                                        class="text-base
                                                               font-normal
                                                               text-gray-700
                                                               bg-white bg-clip-padding
                                                               border border-solid border-gray-300
                                                               rounded
                                                               transition
                                                               ease-in-out
                                                               m-0
                                                               focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        v-model="category.created_at"
                                                    />
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input
                                                        type="text"
                                                        class="text-base
                                                               font-normal
                                                               text-gray-700
                                                               bg-white bg-clip-padding
                                                               border border-solid border-gray-300
                                                               rounded
                                                               transition
                                                               ease-in-out
                                                               m-0
                                                               focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        v-model="category.updated_at"
                                                    />
                                                </td>
                                                <td class="py-4 px-6 text-right">
                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                                <td class="py-4 px-6 text-right">
                                                    <a href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>

                            </form>
                        </div>

                        <!-- <div id="addButton"> -->
                            <button
                                v-show="isButton"
                                type="button"
                                @click="openAddCategory"
                                class="defaultButton mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Add new category
                            </button>
                            <div class="box nonVisible">

                                <div class="mt-10 mb-10 text-gray-900 text-2xl text-center">Add a new Category</div>
                                <div v-if="errors.name" class="text-center mb-5 text-red-500">{{ errors.name }}</div>
                                <div v-if="error" class="text-center mb-5 text-red-500">{{ error }}</div>
                                <form @submit.prevent="submit">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="py-3 px-6">
                                                        Category name
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Parent category name
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <td scope="row" class="py-4 px-6">
                                                        <input
                                                            type="text"
                                                            class="w-full
                                                                text-base
                                                                font-normal
                                                                text-gray-700
                                                                bg-white bg-clip-padding
                                                                border border-solid border-gray-300
                                                                rounded
                                                                transition
                                                                ease-in-out
                                                                m-0
                                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                            v-model="form.name"
                                                        />
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <select v-model="form.parentId" >
                                                            <option v-for="option in categories" :value="option.parent_id">
                                                                {{ option.name }}
                                                            </option>
                                                        </select>

                                                    </td>
                                                    <td class="py-4 px-6 text-right" @click="addCategory">
                                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" preserveScroll>Add Category</a>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    </th>
                                                    <td class="py-4 px-6">
                                                    </td>
                                                    <td class="py-4 px-6 text-right">
                                                        <button type="button"
                                                            @click="closeAddCategory"
                                                            class="resetDefaultButton mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                                        >
                                                            Reset default
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </form>

                                <div class="m-5" v-if="$page.props.flash.success" id="dialog" preserveScroll>
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <span class="block sm:inline">{{ $page.props.flash.success }}</span>
                                    </div>
                                </div>
                                <div class="m-5" v-if="$page.props.flash.error" id="dialog" preserveScroll>
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <span class="block sm:inline">{{ $page.props.flash.error }}</span>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>

export default {
    data() {
        return {
            isButton: true,
            form: {
                name: null,
                parentId: null
            },
        }
    },
    methods: {
        toggle() {
            const menu = document.querySelector('.menu')
            const trigger = document.querySelector('.trigger')
            menu.classList.toggle('menu--open')

            trigger.addEventListener('click', toggle)
        },
        openAddCategory() {
            this.isButton = !this.isButton
            const box = document.querySelector('.box')
            box.classList.remove('nonVisible')
        },
        closeAddCategory() {
            this.isButton = !this.isButton
            const box = document.querySelector('.box')

            box.classList.add('nonVisible')
        },
        addCategory() {
            console.log("tests"+this.form.parentId)
            this.$inertia.post('createNewCategory' , this.form, {
                preserveScroll: true,
                preserveState: false,
                resetOnSuccess: false
            })
        }

    }
}
</script>
<style scoped>
.nonVisible{
    visibility: hidden;
}
.visible {
    visibility: visible;
}
</style>
