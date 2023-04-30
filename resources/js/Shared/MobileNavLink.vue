<template>
    <Link
        class="block text-sm px-2 py-4 text-gray-500 hover:bg-yellow-500  hover:text-white transition duration-300 font-semibold"
        :class="{'block text-sm px-2 py-4 text-white bg-yellow-500 font-semibold': active}"
    >
        <slot/>
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3"
export default {
    name: "MobileNavLink",
    components: { Link },

    props: {
        active: Boolean
    }
}
</script>

<style scoped>

</style>
