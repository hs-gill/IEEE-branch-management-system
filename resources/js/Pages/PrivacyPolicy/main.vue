<template>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Privacy Policy
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
<!--                    <Welcome/>-->
                    <h1>Guarding Your Privacy! Welcome.</h1>
                </div>

                <div class="columns-2 items-center mt-4">
                    <div class="flex justify-start">
                        <Link href="/transactions" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            <PrimaryButton class="" :class="{ 'opacity-25': rentForm.processing }" :disabled="rentForm.processing">
                                TRE
                            </PrimaryButton>
                        </Link>
                    </div>

                    <div class="flex justify-end">
                        <form @submit.prevent="submitRent">
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': rentForm.processing }" :disabled="rentForm.processing">
                                Rent
                            </PrimaryButton>
                        </form>

                        <form @sublit.prevent="submitReturn">
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': returnForm.processing }" :disabled="returnForm.processing">
                                Return
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</template>
<script setup>
import Welcome from "@/Components/Welcome.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
</script>
