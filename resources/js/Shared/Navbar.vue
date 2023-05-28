<template>
        <!-- Navbar goes here -->
        <nav style="background-color: #FFD700">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <!-- sidebar categories-->
                    <Categories />

                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                        <NavLink :href="route('home.index')" :active="$page.component === 'Welcome'">خانه</NavLink>
                        <NavLink :href="route('products.index')" :active="$page.component === 'Products/Product'">محصولات</NavLink>
                        <NavLink :href="route('home.index')">درباره پاپیون</NavLink>
                        <NavLink :href="route('products.index')">تماس با ما</NavLink>
                        <Link :href="route('cart.index')" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-600 hover:bg-gray-50 md:hover:bg-transparent md:border-0  md:p-0 dark:text-gray-400 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <div v-if="($page.props.cartCount > 0)" class="ml-5 absolute bottom-3 bg-amber-500 rounded-full">
                                    <span class="px-1 hover:text-white">{{ $page.props.cartCount }}</span>
                                </div>
                            </div>

                        </Link>
                    </div>

                    <!-- Secondary Navbar items -->
                    <div class="hidden md:flex items-center space-x-3">
                        <div v-if="$page.props.auth.role === 'admin'">
                            <NavLink :href="route('admin_dashboard')">داشبورد</NavLink>
                        </div>
                        <div v-if="$page.props.auth.role === 'admin'">
                            <NavLink :href="route('logout')" method="post" as="button">خروج</NavLink>
                        </div>
                        <div v-if="$page.props.auth.user">
                            <NavLink v-if="$page.props.auth.user.role === 'user'" :active="$page.component === 'Auth/Login'" :href="route('logout')"
                                     class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-yellow-500 hover:text-white transition duration-300"
                                     method="post"
                                     as="button">
                                خروج
                            </NavLink>
                        </div>
                        <div v-if="$page.props.auth.user">
                            <NavLink v-if="$page.props.auth.user.role === 'user'" :href="route('user_dashboard')"
                                     class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-yellow-500 hover:text-white transition duration-300"
                                     method="get"
                                     as="button">
                                داشبورد
                            </NavLink>
                        </div>
                        <template v-if="!$page.props.auth.user">
                            <NavLink :href="route('login')" :active="$page.component === 'Auth/Login'">ورود</NavLink>
                            <NavLink :href="route('register')" :active="$page.component === 'Auth/Register'">ثبت نام</NavLink>
                        </template>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <Link href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-gray-600 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-gray-400 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <span v-if="($page.props.cartCount > 0)">
                                    <Link :href="route('cart.index')" class="absolute bottom-3 left-4 bg-amber-400 rounded-full w-5 h-5">
                                        {{ $page.props.cartCount }}
                                    </Link>
                                </span>
                            </div>
                        </Link>
                        <button class="outline-none mobile-menu-button" @click="toggleMenu">
                        <svg class=" w-6 h-6 text-gray-500 hover:text-yellow-500"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- mobile menu -->
            <div class="hidden mobile-menu">
                <ul>
                    <MobileNavLink :href="route('home.index')" :active="$page.component === 'Welcome'" class="border-b-2">خانه</MobileNavLink>
                    <MobileNavLink :href="route('products.index')" :active="$page.component === 'Products/Product'" class="border-b-2">محصولات</MobileNavLink>
                    <MobileNavLink :href="route('products.index')" class="border-b-2">درباره پاپیون</MobileNavLink>
                    <MobileNavLink :href="route('products.index')" class="border-b-2">تماس با ما</MobileNavLink>

                    <li v-if="!$page.props.auth.user">
                        <MobileNavLink :href="route('login')" :active="$page.component === 'Auth/Login'" class="border-b-2">ورود</MobileNavLink>
                        <MobileNavLink :href="route('register')" :active="$page.component === 'Auth/Register'">ثبت نام</MobileNavLink>
                    </li>

                    <li v-if="$page.props.auth.role === 'admin'">
                        <MobileNavLink :href="route('admin_dashboard')" method="get" as="button">داشبورد</MobileNavLink>
                        <MobileNavLink :href="route('logout')" method="post" as="button">خروج</MobileNavLink>
                    </li>

                    <li v-if="$page.props.auth.user">
                        <MobileNavLink v-if="$page.props.auth.user.role === 'user'" :active="$page.component === 'Auth/Login'" :href="route('logout')" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-yellow-500 hover:text-white transition duration-300" method="post" as="button">
                            خروج
                        </MobileNavLink>
                    </li>
                </ul>
            </div>
        </nav>
</template>

<script>
import {Head, Link } from "@inertiajs/inertia-vue3"
import Categories from "@/Components/Categories.vue"
import NavLink  from "@/Shared/NavLink.vue"
import MobileNavLink from "@/Shared/MobileNavLink.vue"

export default {
    name: "Navbar.vue",
    components: {
        Head,
        Link,
        Categories,
        NavLink,
        MobileNavLink
    },
    methods: {

        toggleMenu() {
            const menu = document.querySelector(".mobile-menu")
            menu.classList.toggle("hidden")
        },
        toggle() {
            this.expanded = !this.expanded;

            const menu = document.querySelector('.menu');
            menu.classList.toggle('menu--open');

        }
    },
}
</script>

<style scoped>
</style>
