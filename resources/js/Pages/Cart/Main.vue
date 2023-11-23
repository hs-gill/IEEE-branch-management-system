<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'
import {computed, onMounted} from "vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    modelValue: Boolean,
    items: Object
});

defineEmits(['update:modelValue']);

const removeItemForm = useForm({
    item: null,
});

const removeFromCart = (item) => {
    removeItemForm.item = item;
    removeItemForm.put(route('cart.remove-from-cart'), {
        errorBag: 'removeFromCart',
        preserveScroll: true,
        // onSuccess: () => form.reset(),
        // onFinish: () => titleInput.value.focus(),
    });
};

const total = computed(() => {
    let total = 0;
    props.items.forEach(item => {
        total += item.price.amount
    });
    return total;
});

const checkoutForm = useForm({
    total: Number,
    items: props.items
});

const checkout = () => {
    checkoutForm.total = total;
    checkoutForm.post(route('cart.checkout'), {
        errorBag: 'checkout',
        preserveScroll: true,
        onSuccess: () => checkoutForm.reset(),
        // onFinish: () => titleInput.value.focus(),
    });
}

</script>

<template>
    <TransitionRoot as="template" :show="modelValue">
        <Dialog as="div" class="relative z-10" @close="$emit('update:modelValue', false)">
            <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                            <DialogPanel class="pointer-events-auto w-screen max-w-md">
                                <div class="flex h-full flex-col overflow-y-scroll bg-white dark:bg-gray-900 shadow-xl">
                                    <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                        <div class="flex items-start justify-between">
                                            <DialogTitle class="text-lg font-medium text-gray-900 dark:text-white">Shopping cart</DialogTitle>
                                            <div class="ml-3 flex h-7 items-center">
                                                <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" @click="$emit('update:modelValue', false)">
                                                    <span class="absolute -inset-0.5" />
                                                    <span class="sr-only">Close panel</span>
                                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mt-8">
                                            <div class="flow-root">
                                                <ul role="list" class="-my-6 divide-y divide-gray-200 dark:divide-gray-700">
                                                    <li v-for="item in items" :key="item" class="flex py-6">
                                                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200 dark:border-gray-700">
                                                            <img :src="item.image_path" :alt="item.name" class="h-full w-full object-cover object-center" />
                                                        </div>

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div class="flex justify-between text-base font-medium text-gray-900 dark:text-white">
                                                                    <h3>
                                                                        <a :href="item.href">{{ item.name }}</a>
                                                                    </h3>
                                                                    <p class="ml-4">{{ item.price.amount }}</p>
                                                                </div>
                                                                <!--                                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ item.color }}</p>-->
                                                            </div>
                                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                                <p class="text-gray-500 dark:text-gray-400">Qty {{ item.quantity }}</p>

                                                                <div class="flex">
                                                                    <button type="button"
                                                                            class="font-medium text-indigo-600 dark:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-400"
                                                                            @click="removeFromCart(item)">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-6 sm:px-6">
                                        <div class="flex justify-between text-base font-medium text-gray-900 dark:text-white">
                                            <p>Subtotal</p>
                                            <p>$ {{ total }}</p>
                                        </div>
                                        <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">Shipping and taxes calculated at checkout.</p>
                                        <div class="mt-6">
                                            <button class="flex items-center justify-center rounded-md border border-transparent w-full px-6 py-3 text-base font-medium  shadow-sm "
                                                :class="items.length === 0 ? 'text-gray-500 bg-indigo-600/50' : 'text-white bg-indigo-600 hover:bg-indigo-700'"
                                                    :disabled="items.length === 0"
                                               @click="checkout">
                                                Checkout
                                            </button>
                                        </div>
                                        <div class="mt-6 flex justify-center text-center text-sm text-gray-500 dark:text-gray-400">
                                            <p>
                                                or
                                                <button type="button" class="font-medium text-indigo-600 dark:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-400" @click="$emit('update:modelValue', false)">
                                                    Continue Shopping
                                                    <span aria-hidden="true"> &rarr;</span>
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
