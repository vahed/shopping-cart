<template>
    <div class="flex" id="demo">
        <a href="#" class="flex items-center py-4 px-2">
            <div class="font-semibold text-gray-500 text-lg trigger font-semibold hover:text-white transition duration-300" @click="toggle">
                <i class="fa fa-bars float-left" aria-hidden="true"><span class="m-1 font-shabnam">دسته‌بندی کالاها</span></i>
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
            const element = document.querySelector('.menu');
            const closeButton = document.querySelector('.closeButton');
            closeButton.style.display = 'block'
            element.style.marginRight = '0px'
            document.getElementById('overlay').style.display = 'block'
        },
        closeMenu() {
            const element = document.querySelector('.menu');
            const closeButton = document.querySelector('.closeButton');
            closeButton.style.display = 'none'
            element.style.marginRight = '-320px'
            document.getElementById('overlay').style.display = 'none'
        }
    }
}
</script>
