<template>
    <AppLayout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Events
            </h2>
        </template>

        <!-- Carousel Container -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
            <Swiper
                :slides-per-view="3"
                :space-between="50"
                :pagination="{
                    clickable: true,
                }"
                :navigation="true"
                :loop="true"
                class="mySwiper"
            >
                <SwiperSlide v-for="event in events" :key="event.id">
                    <img :src="event.image" :alt="event.title" class="object-cover h-64 w-full">
                </SwiperSlide>
            </Swiper>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <!-- Existing event grid -->
                </div>
            </div>
        </div>

        <Newsletter/>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Newsletter from "@/Pages/Events/Newsletter.vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

defineProps({
    events: Object,
});

// Optional: Import Swiper styles for navigation and pagination
import 'swiper/css/navigation';
import 'swiper/css/pagination';
</script>

<style>
/* Ensures the Swiper takes the full width of the container and has a set height */
.mySwiper {
    width: 100%;
    height: 300px; /* Adjust the height as needed */
}

/* Styles for the navigation buttons */
.swiper-button-next,
.swiper-button-prev {
    color: #eae3e3; /* Change the color to match your design */
}

/* Style adjustments for the pagination (the clickable dots) */
.swiper-pagination-bullet {
    background: #ce0c0c; /* Change the bullet color to match your design */
}

/* If you have a dark theme and want the active bullet to stand out */
.swiper-pagination-bullet-active {
    background: #f1ecec; /* Active bullet color */
}
</style>


