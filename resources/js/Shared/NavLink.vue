<template>
    <Link
        class="block text-sm px-2 py-4 text-gray-500 hover:bg-yellow-500  hover:text-white transition duration-300 font-semibold"
        :class="{'text-gray-500 border-b-4 border-yellow-500 font-semibold hover:text-yellow-500 py-4 px-2 font-semibold': active}"
    >
        <slot/>
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3"
export default {
    name: "NavLink",
    components: { Link },

    props: {
        active: Boolean
    }
}
</script>

<style scoped>

</style>
