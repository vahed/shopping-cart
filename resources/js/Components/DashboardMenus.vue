<template>
    <div class="flex">
            <a href="#" class="flex items-center py-4 px-2">
                <!-- logo image could go here-->
                <div class="font-semibold text-gray-500 text-lg trigger font-semibold hover:text-yellow-500 transition duration-300" @click="toggle">
                    <span class="flex">
                        <span class="flex-1 m-1">
                            <i class="fa fa-bars float-right" aria-hidden="true"></i>
                        </span>
                        <span class="flex-1">Menu</span>
                    </span>
                </div>
                <div class="menu" id="menu">
                    <div class="closeButton" @click="closeMenu">&times;</div>
                    <div class="mt-2">
                        <div v-if="$page.props.auth.role === 'admin'">
                            <ul v-for="(links, key) in adminLinks" :key="key" class="space-y-1 max-w-md list-none list-inside text-gray-500 dark:text-gray-400">
                                <li>
                                    <Link @click="this.$inertia.get(route(links.route))">
                                        <i class="m-3" :class="links.logo"></i>
                                        <span class="text-gary-900 hover:text-black">{{ links.name }}</span>
                                    </link>
                                </li>
                            </ul>
                        </div>
                        <div v-if="$page.props.auth.role === 'user'">
                            <ul v-for="(links, key) in userLinks" :key="key" class="space-y-1 max-w-md list-none list-inside text-gray-500 dark:text-gray-400">
                                <li>
                                    <Link @click="this.$inertia.get(route(links.route))">
                                        <i class="m-3 color-white" :class="links.logo"></i>
                                        <span class="text-gary-900 hover:text-black">{{ links.name }}</span>
                                    </link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
    </div>
</template>

<script>
import {Head, Link } from "@inertiajs/inertia-vue3"
import Category from "@/Pages/Products/Category.vue"

export default {
    name: "DashboardMenus.vue",
    data() {
        return {
            adminLinks: [
                {'key' : 1, 'name' : 'افزودن برند جدید', 'logo': 'far fa-plus-square', 'route': 'brand.index'},
                {'key' : 2, 'name' : 'افزودن محصول جدید', 'logo': 'fas fa-tshirt', 'route': 'showCreateProduct.index'},
                {'key' : 3, 'name' : 'افزودن جزئیات محصول', 'logo': 'fa fa-info-circle', 'route': 'adminProductFeature.index'},
                {'key' : 4, 'name' : 'افزودن تصاویر', 'logo': 'fa fa-camera', 'route': 'adminProductImage.index'},
                {'key' : 5, 'name' : 'صفحه اصلی', 'logo': 'fas fa-user-edit', 'route': 'admin_dashboard'},
                {'key' : 6, 'name' : 'خانه', 'logo': 'fa fa-home', 'route': 'home.index'}
            ],
            // userLinks: [
            //     {'key' : 1, 'name' : 'Shopping history', 'logo': 'far fa-plus-square'},
            //     {'key' : 2, 'name' : 'Products', 'logo': 'fas fa-tshirt', 'route': 'show_create_product'},
            //     {'key' : 3, 'name' : 'Basket', 'logo': 'fas fa-user-edit'},
            //     {'key' : 4, 'name' : 'Image', 'logo': 'fa fa-camera', 'route': 'show_create_product'}
            // ]            // userLinks: [
            //     {'key' : 1, 'name' : 'Shopping history', 'logo': 'far fa-plus-square'},
            //     {'key' : 2, 'name' : 'Products', 'logo': 'fas fa-tshirt', 'route': 'show_create_product'},
            //     {'key' : 3, 'name' : 'Basket', 'logo': 'fas fa-user-edit'},
            //     {'key' : 4, 'name' : 'Image', 'logo': 'fa fa-camera', 'route': 'show_create_product'}
            // ]
        }
    },
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
            const height = window.outerHeight
            const element = document.querySelector('.menu')
            element.style.marginRight = '0px'
            element.style.height = height+'px'
            console.log(element.style.height)
        },
        closeMenu() {
            const element = document.querySelector('.menu')
            element.style.marginRight = '-320px'
        },

    }
}
</script>

<style scoped>
.menu {
    background-color: #f7fafc;
  }
.closeButton {
    color: gray;
}
.menu--open {
    border-right-color:#DCDCDC;
}

</style>
