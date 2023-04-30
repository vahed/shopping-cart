<script setup>
import { ref } from 'vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Footer from '@/Layouts/Footer.vue';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";

const showingNavigationDropdown = ref(false);

defineProps({
    urlBeforeLogin: String
});

</script>

<template>
    <Head title="Dashboard" />
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>
    <div id="previous-page">
        <h2 class="text-4xl mt-10 font-bold text-center text-gray-800 mb-8">
            User Dashboard
        </h2>
        <div v-if="urlBeforeLogin">
            <Link :href="urlBeforeLogin">Back to your search</Link>
        </div>
    </div>
    <Footer />
</template>
<script>

export default {
    methods: {
    }
}
</script>
