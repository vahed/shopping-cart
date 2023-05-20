<template>
    <div class="flex">
        <a href="#" class="flex items-center py-4 px-2">
            <div class="font-semibold text-gray-500 text-lg trigger font-semibold hover:text-yellow-500 transition duration-300" @click="toggle">
                <i class="fa fa-bars float-left" aria-hidden="true"><span class="m-1">دسته‌بندی کالاها</span></i>
            </div>
            <div class="menu">
                <div class="closeButton" @click="closeMenu">&times;</div>
                <Category :categoryItems = "$page.props.categoryItems"/>
            </div>
        </a>
    </div>
</template>

<script>
import {Head, Link } from "@inertiajs/inertia-vue3"
import Category from "@/Pages/Products/Category.vue"

export default {
    name: "Categories.vue",
    components: {
        Head,
        Link,
        Category
    },
    props: {
        category: Object
    },
    methods: {

        toggle() {
            console.log('menu working');
            const element = document.querySelector('.menu');
            element.style.marginRight = '0px'
        },
        closeMenu() {
            const element = document.querySelector('.menu');
            element.style.marginRight = '-320px'
        }
    }
}
</script>
