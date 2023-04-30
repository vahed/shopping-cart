<template>
    <div class="flex">
        <a href="#" class="flex items-center py-4 px-2">
            <div class="font-semibold text-gray-500 text-lg trigger font-semibold hover:text-yellow-500 transition duration-300" @click="toggle">
                <span class="flex">
                    <span class="flex-1 m-1">
                        <i class="fa fa-bars float-right" aria-hidden="true"></i>
                    </span>
                    <span class="flex-1">Categories</span>
                </span>
            </div>
            <div class="menu">
                <div class="closeButton" @click="toggle()">&times;</div>
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

        toggleMenu() {

            const menu = document.querySelector(".mobile-menu")
            menu.classList.toggle("hidden")

        },
        toggle() {
            const overlay = document.getElementById('overlay')
            this.expanded = !this.expanded;

            const menu = document.querySelector('.menu');
            const trigger = document.querySelector('.trigger');
            menu.classList.toggle('menu--open');

        }
    }
}
</script>
