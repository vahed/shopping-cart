<template>
    <div v-if="products.links.length > 3">
        <div class="flex flex-wrap -mb-1 ml-4">
        <template v-for="(link, key) in products.links" >
            <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
            <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white hover:text-blue-500 focus:border-indigo-500 focus:text-indigo-500"
                :class="{ 'bg-white': link.active }"
                :href="link.url"
                v-html="link.label"
                preserve-scroll
            />
        </template>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'Pagination.vue',
    props: ['products'],
    components: {
        Link,
    },
}

</script>
