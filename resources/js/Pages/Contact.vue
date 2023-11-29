<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import {ref} from "vue";
import InputError from "@/Components/InputError.vue";
import {Link} from "@inertiajs/vue3";

const nameInput = ref(null);
const emailInput = ref(null);
const message = ""

const agree = ref(true);

const form = useForm({
    name: '',
    email: '',
    message: ''
});

const createInquiry = () => {
    form.post(route('inquiries.store'), {
        errorBag: 'createInquiry',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onFinish: () => nameInput.value.focus(),
    });
};
</script>
<template>
    <AppLayout title="Contact Us">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Contact Us
            </h2>
        </template>

        <div class="max-w-7xl mx-auto lg:mt-8">
            <div class="">
                <div class="bg-white dark:bg-gray-900 px-6 py-24 sm:py-32">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">Contact Us</h2>
                <p class="mt-2 text-2xl leading-8 text-gray-600 dark:text-gray-400">We're Here to Listen. Enter Your Information and Speak to Us</p>

            </div>
            <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">First name</label>
                        <div class="mt-2.5">
                            <TextInput
                                    id="name"
                                    ref="nameInput"
                                    v-model="form.name"
                                    type="text"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    autofocus
                            />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">Email</label>
                        <div class="mt-2.5">
                            <TextInput
                                    id="email"
                                    ref="emailInput"
                                    v-model="form.email"
                                    type="text"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                            />
                            <InputError :message="form.errors.email" class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">Message</label>
                        <div class="mt-2.5">
                            <TextArea
                                    id="message"
                                    ref="messageInput"
                                    rows="4"
                                    v-model="form.message"
                                    type="text"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 dark:text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                            />
                            <InputError :message="form.errors.message" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex gap-x-4 sm:col-span-2">
                    <label class="text-sm leading-6 text-gray-600 dark:text-gray-400" id="switch-1-label">
                        By clicking <em> Let's talk</em>, you agree to our

                        <Link :href="route('privacy-policy')" class="font-semibold text-indigo-600"> Privacy Policy</Link>
                    </label>
                </div>
                <div class="mt-10">
                    <button class="block w-full rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="createInquiry">
                        Let's talk
                    </button>
                </div>
            </form>
        </div>
            </div>
        </div>

    </AppLayout>
</template>

