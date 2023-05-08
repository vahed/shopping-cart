<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import { ChevronDownIcon } from "@heroicons/vue/20/solid"
import { computed, ref } from "vue"

const props =defineProps({
    item: Object,
})

const hasActiveChild = computed(() => {
    function hasActiveItewm(items) {
        return items.some(item => item.active || hasActiveItewm(item.children))
    }

    return hasActiveItewm(props.item.children)
})

</script>

<template>
    <disclosure v-slot="{ open }">
        <!-- display top category items -->
        <DisclosureButton
            :class="['text-right flex w-full items-center py-2 px-3 text-sm font-medium text-gray-600',
            'hover:bg-gray-100',
            open ? 'font-semibold text-gray-800' : 'font-medium text-gray-600']"
        >

            <span class="flex-1" v-if="item.children.length === 0" @click="productByCategory(item.id)">{{ item.name }}</span>
            <span class="flex-1" v-if="item.children.length !== 0" >
                <div class="flex flex-row">
                    <div>
                        {{ item.name }}
                    </div>
                    <div>
                        <ChevronDownIcon
                            v-if="item.children.length !== 0"
                            :class="['mb-1 h-6 w-6 shrink-0',
                    open ? '-rotate-180 text-gray-600' : 'text-gray-400']"/>
                    </div>
                </div>
            </span>

        </DisclosureButton>

        <DisclosurePanel class="mr-4 border-solid">
            <!-- pass item recursively to display subcategory-->
            <CatItem
                v-for="child in item.children"
                :item="child"
            />
        </DisclosurePanel>
    </disclosure>

</template>

<script>
export default {
    methods: {
        productByCategory(category_id) {
            this.$inertia.get(this.route('category.productByCategory', category_id));
        }
    }
}
</script>
<style scoped>
</style>
