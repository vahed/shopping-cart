<template>
        <nav role="navigation">

            <div class="text-xl bg-yellow-600 text-white">
                <div class="p-3">
                    <i class="fa fa-list-alt float-right mt-1 ml-1" aria-hidden="true"></i>همه محصولات
                </div>
            </div>
            <!-- pass item as prop to CatItem -->
            <CatItem :item="item" v-for="item in categoryItems" :key="item.id">
            </CatItem>
        </nav>
</template>

<script>
import {Head} from "@inertiajs/inertia-vue3"
import CatItem from "../../Components/CatItem.vue"

export default {
    name: "Category.vue",
    components: {
        Head,
        CatItem
    },
    props: {
        category: Object,
        categoryItems: Object
    }
}
</script>

<style scoped>
</style>
