<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <img class="block dark:hidden lg:h-20 w-auto bg-gray-100 dark:bg-gray-900" src="/images/ieee-logos/ieee-usask-logo-blue.png" alt="ieee_logo">
        <img class="hidden dark:block lg:h-20 w-auto bg-gray-100 dark:bg-gray-900" src="/images/ieee-logos/ieee-usask-logo-light.png" alt="ieee_logo">
    </Link>
</template>
