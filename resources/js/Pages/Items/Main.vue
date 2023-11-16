<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchBar from "@/Components/SearchBar.vue";
import {ref} from "vue";

const props = defineProps({
    items: Object,
});

let input = ref("");

function filteredList() {
    return props.items.data.filter((item) =>
        item.name.toLowerCase().includes(input.value.toLowerCase())
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
                            <div v-for="item in filteredList()" :key="item" class="group relative">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <img :src="item.image_path" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700 dark:text-gray-100">
                                            <a :href="`items/${item.id}`">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ item.name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ item.description }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200">$35</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AppLayout>
</template>
