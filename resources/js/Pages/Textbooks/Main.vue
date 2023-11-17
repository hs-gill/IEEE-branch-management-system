<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SearchBar from "@/Components/SearchBar.vue";
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    textbooks: Object,
});

let input = ref("");

function filteredList() {
    return props.textbooks.filter((textbook) =>
        textbook.title.toLowerCase().includes(input.value.toLowerCase()) || textbook.author.toLowerCase().includes(input.value.toLowerCase())
    );
}

</script>

<template>
    <AppLayout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Textbooks
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
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Textbooks</h2>

                        <div  class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <Link v-for="textbook in filteredList()" :key="textbook.id" :href="`textbooks/${textbook.id}`" class="group relative">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <img :src="textbook.cover" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700 dark:text-gray-100">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ textbook.title }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ textbook.author }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-200">$35</p>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
