<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchBar from "@/Components/SearchBar.vue";
import {onMounted, ref} from "vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    items: Object,
});

onMounted(() => {
    // console.log(props.items.data)
})

let input = ref("");

function filteredList() {
    return props.items.data.filter((item) =>
        item.name.toLowerCase().includes(input.value.toLowerCase()) ||
        item.item_category.name.toLowerCase().includes(input.value.toLowerCase()) ||
        item.item_state.name.toLowerCase().includes(input.value.toLowerCase()) ||
        item.item_type.name.toLowerCase().includes(input.value.toLowerCase())
    );
}
</script>

<template>
    <AppLayout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Items
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="">

                <div class="bg-white dark:bg-gray-800">
                    <div class="p-8">
                        <SearchBar
                            id="name"
                            v-model="input"
                            type="text"
                            class="block w-full mt-1"
                            placeholder="Search items..."
                            autofocus
                        />
                    </div>

                    <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-8 lg:max-w-7xl lg:px-8">
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Items</h2>

                        <div  class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <Link v-for="item in filteredList()" :key="item" :href="item.item_state.id === 1 ? `items/${item.id}` : ''" class="group relative" >
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md lg:aspect-none lg:h-80"
                                     :class="item.item_state.id === 1 ? 'group-hover:opacity-75' : ''">
                                    <img :src="item.image_path"
                                         alt="Front of men&#039;s Basic Tee in black."
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full"
                                         :class="item.item_state.id !== 1 ? 'opacity-20 dark:opacity-10 bg-gray-400/50 dark:bg-gray-900/50' : ''">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700 dark:text-gray-100">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ item.name }}
                                        </h3>
                                        <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset" :class="item.item_state.badge_color_light + ' dark:'+item.item_state.badge_color_dark">
                                            {{ item.item_state.name }}
                                        </span>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ item.description }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200">${{ item.price.amount }}</p>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="">
            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Badge</span>
            <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Badge</span>
            <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Badge</span>
            <span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">Badge</span>
            <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">Badge</span>
            <span class="inline-flex items-center rounded-md bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10">Badge</span>
        </div>

        <div class="">
            <span class="inline-flex items-center rounded-md bg-gray-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-gray-400/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-red-400/10 px-2 py-1 text-xs font-medium text-red-400 ring-1 ring-inset ring-red-400/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-yellow-400/10 px-2 py-1 text-xs font-medium text-yellow-500 ring-1 ring-inset ring-yellow-400/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-green-500/10 px-2 py-1 text-xs font-medium text-green-400 ring-1 ring-inset ring-green-500/20">Badge</span>
            <span class="inline-flex items-center rounded-md bg-blue-400/10 px-2 py-1 text-xs font-medium text-blue-400 ring-1 ring-inset ring-blue-400/30">Badge</span>
            <span class="inline-flex items-center rounded-md bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30">Badge</span>
            <span class="inline-flex items-center rounded-md bg-purple-400/10 px-2 py-1 text-xs font-medium text-purple-400 ring-1 ring-inset ring-purple-400/30">Badge</span>
            <span class="inline-flex items-center rounded-md bg-pink-400/10 px-2 py-1 text-xs font-medium text-pink-400 ring-1 ring-inset ring-pink-400/20">Badge</span>
        </div>


    </AppLayout>
</template>

