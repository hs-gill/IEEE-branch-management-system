<script setup>
// import { onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
// import BarChart from '@/Components/Charts/BarChart.vue';
// import PieChart from '@/Components/Charts/PieChart.vue';
// import Table from '@/Pages/Items/Table.vue';
// import {router} from "@inertiajs/vue3";

defineProps({
    items: Object,
});
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
<!--                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">-->
<!--                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">-->
<!--                        <div>-->
<!--                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                                     stroke-width="1.5"-->
<!--                                     class="w-7 h-7 stroke-red-500">-->
<!--                                    <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>-->
<!--                                </svg>-->
<!--                            </div>-->

<!--                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Items Chart A</h2>-->

<!--                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">-->
<!--                                Laravel has wonderful documentation covering every aspect of the framework. Whether you-->
<!--                                are a newcomer-->
<!--                                or have prior experience with Laravel, we recommend reading our documentation from-->
<!--                                beginning to end.-->
<!--                            </p>-->

<!--                            <div class="mt-8">-->
<!--&lt;!&ndash;                                <BarChart/>&ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>-->

<!--                    </div>-->

<!--                    <div-->
<!--                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">-->
<!--                        <div>-->
<!--                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                                     stroke-width="1.5"-->
<!--                                     class="w-7 h-7 stroke-red-500">-->
<!--                                    <path stroke-linecap="round"-->
<!--                                          d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/>-->
<!--                                </svg>-->
<!--                            </div>-->

<!--                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Items Chart B</h2>-->

<!--                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">-->
<!--                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript-->
<!--                                development. Check them-->
<!--                                out, see for yourself, and massively level up your development skills in the process.-->
<!--                            </p>-->

<!--                            <div class="m-8">-->
<!--&lt;!&ndash;                                <PieChart/>&ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>-->

<!--                    </div>-->
<!--                </div>-->


                <div class="bg-white dark:bg-gray-800">
                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Items</h2>

                        <div  class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <div v-for="item in items" class="group relative">
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

<!--                <div class="mt-5 lg:mt-7 md:grid-cols-2 gap-6 lg:gap-8">-->
<!--                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">-->
<!--                        <div>-->
<!--                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                                     stroke-width="1.5"-->
<!--                                     class="w-7 h-7 stroke-red-500">-->
<!--                                    <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                          d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>-->
<!--                                </svg>-->
<!--                            </div>-->

<!--                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Items Table</h2>-->

<!--                            <p class="mt-4 mb-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">-->
<!--                                Laravel News is a community driven portal and newsletter aggregating all of the latest-->
<!--                                and most-->
<!--                                important news in the Laravel ecosystem, including new package releases and tutorials.-->
<!--                            </p>-->

<!--                            <Table :items="items" />-->

<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
        </div>
    </AppLayout>
</template>
