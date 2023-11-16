<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import Newsletter from "@/Pages/Events/Newsletter.vue";
import {onMounted} from "vue";

const props = defineProps({
    events: Object,
});

onMounted(() => {
    console.log(props.events)
})
</script>

<template>
    <AppLayout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Events
            </h2>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <Link v-for="event in events.data" :key="event.id" :href="`events/${event.id}`">
                        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl from-gray-900 px-8 pb-8 pt-80 sm:pt-48 md:pt-80">
                            <img :src="event.image_path" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
                            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-200 to-60% dark:from-gray-900 to-transparent"></div>
                            <div class="absolute inset-0 -z-10 rounded-2xl ring-0 ring-inset"></div>
                            <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-700 dark:text-gray-300">
                                <time :datetime="event.dated_at" class="mr-8">{{ event.dated_at }}</time>
                            </div>
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-800 dark:text-white">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ event.title }}
                                </a>
                            </h3>
                        </article>
                    </Link>
                </div>
            </div>
        </div>

        <Newsletter/>
    </AppLayout>
</template>


<style>

.ann {
    --tw-gradient-via-position: ;
    --tw-gradient-to: rgb(17 24 39 / 0)  var(--tw-gradient-to-position);
    --tw-gradient-to-position: ;
    --tw-gradient-stops: var(--tw-gradient-from), rgb(17 24 39 / 0.4) var(--tw-gradient-via-position), var(--tw-gradient-to);
}
@media (min-width: 1024px) // md:pt-80
.dfs {
    padding-top: 20rem;
}
@media (min-width: 640px) //sm:pt-48
.chl {
    padding-top: 12rem;
}
</style>
