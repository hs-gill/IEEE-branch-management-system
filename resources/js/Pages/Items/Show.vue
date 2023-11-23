<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Link, useForm} from "@inertiajs/vue3";
import {onMounted} from "vue";

// const product = {
//     name: 'Basic Tee 6-Pack',
//     price: '$192',
//     href: '#',
//     breadcrumbs: [
//         { id: 1, name: 'Men', href: '#' },
//         { id: 2, name: 'Clothing', href: '#' },
//     ],
//     images: [
//         {
//             src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg',
//             alt: 'Two each of gray, white, and black shirts laying flat.',
//         },
//         {
//             src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg',
//             alt: 'Model wearing plain black basic tee.',
//         },
//         {
//             src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg',
//             alt: 'Model wearing plain gray basic tee.',
//         },
//         {
//             src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg',
//             alt: 'Model wearing plain white basic tee.',
//         },
//     ],
//     colors: [
//         { name: 'White', class: 'bg-white', selectedClass: 'ring-gray-400' },
//         { name: 'Gray', class: 'bg-gray-200', selectedClass: 'ring-gray-400' },
//         { name: 'Black', class: 'bg-gray-900', selectedClass: 'ring-gray-900' },
//     ],
//     sizes: [
//         { name: 'XXS', inStock: false },
//         { name: 'XS', inStock: true },
//         { name: 'S', inStock: true },
//         { name: 'M', inStock: true },
//         { name: 'L', inStock: true },
//         { name: 'XL', inStock: true },
//         { name: '2XL', inStock: true },
//         { name: '3XL', inStock: true },
//     ],
//     description:
//         'The Basic Tee 6-Pack allows you to fully express your vibrant personality with three grayscale options. Feeling adventurous? Put on a heather gray tee. Want to be a trendsetter? Try our exclusive colorway: "Black". Need to add an extra pop of color to your outfit? Our white tee has you covered.',
//     highlights: [
//         'Hand cut and sewn locally',
//         'Dyed with our proprietary colors',
//         'Pre-washed & pre-shrunk',
//         'Ultra-soft 100% cotton',
//     ],
//     details:
//         'The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming "Charcoal Gray" limited release.',
// }
// const reviews = { href: '#', average: 4, totalCount: 117 }
//
// const selectedColor = ref(product.colors[0])
// const selectedSize = ref(product.sizes[2])


const props = defineProps({
    item: Object,
});

onMounted(() => {
    // console.log(props.item);
    // console.log(product);
});

const product = props.item.data

const form = useForm({
    item: product,
});

const addToCart = () => {
    form.put(route('cart.add-to-cart'), {
        errorBag: 'addToCart',
        preserveScroll: true,
        onSuccess: () => true,
        // onFinish: () => titleInput.value.focus(),
    });
};

</script>

<template>
    <AppLayout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Item {{ product.name }}
            </h2>
        </template>

        <div class="">
            <div class="pt-6">

                <!-- Product info -->
                <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">

                    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                        <div class="lg:col-span-2 pb-6">
                            <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                                <img :src="product.image_path" :alt="product.name" class="h-full w-full object-cover object-center" />
                            </div>
                        </div>
                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-3xl">{{ product.name }}</h1>
                    </div>

                    <!-- Options -->
                    <div class="mt-4 lg:row-span-3 lg:mt-0">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl tracking-tight text-gray-900 dark:text-gray-200">$ {{ product.price.amount }}</p>

                        <!-- Reviews -->
<!--                        <div class="mt-6">-->
<!--                            <h3 class="sr-only">Reviews</h3>-->
<!--                            <div class="flex items-center">-->
<!--                                <div class="flex items-center">-->
<!--                                    <StarIcon v-for="rating in [0, 1, 2, 3, 4]" :key="rating" :class="[reviews.average > rating ? 'text-amber-400' : 'text-gray-200', 'h-5 w-5 flex-shrink-0']" aria-hidden="true" />-->
<!--                                </div>-->
<!--                                <p class="sr-only">{{ reviews.average }} out of 5 stars</p>-->
<!--                                <a :href="reviews.href" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ reviews.totalCount }} reviews</a>-->
<!--                            </div>-->
<!--                        </div>-->

                        <form class="mt-10">
<!--                            &lt;!&ndash; Colors &ndash;&gt;-->
<!--                            <div>-->
<!--                                <h3 class="text-sm font-medium text-gray-900">Color</h3>-->

<!--                                <RadioGroup v-model="selectedColor" class="mt-4">-->
<!--                                    <RadioGroupLabel class="sr-only">Choose a color</RadioGroupLabel>-->
<!--                                    <div class="flex items-center space-x-3">-->
<!--                                        <RadioGroupOption as="template" v-for="color in product.colors" :key="color.name" :value="color" v-slot="{ active, checked }">-->
<!--                                            <div :class="[color.selectedClass, active && checked ? 'ring ring-offset-1' : '', !active && checked ? 'ring-2' : '', 'relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none']">-->
<!--                                                <RadioGroupLabel as="span" class="sr-only">{{ color.name }}</RadioGroupLabel>-->
<!--                                                <span aria-hidden="true" :class="[color.class, 'h-8 w-8 rounded-full border border-black border-opacity-10']" />-->
<!--                                            </div>-->
<!--                                        </RadioGroupOption>-->
<!--                                    </div>-->
<!--                                </RadioGroup>-->
<!--                            </div>-->

<!--                            &lt;!&ndash; Sizes &ndash;&gt;-->
<!--                            <div class="mt-10">-->
<!--                                <div class="flex items-center justify-between">-->
<!--                                    <h3 class="text-sm font-medium text-gray-900 dark:text-gray-200">Size</h3>-->
<!--                                    <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>-->
<!--                                </div>-->

<!--                                <RadioGroup v-model="selectedSize" class="mt-4">-->
<!--                                    <RadioGroupLabel class="sr-only">Choose a size</RadioGroupLabel>-->
<!--                                    <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">-->
<!--                                        <RadioGroupOption as="template" v-for="size in product.sizes" :key="size.name" :value="size" :disabled="!size.inStock" v-slot="{ active, checked }">-->
<!--                                            <div :class="[size.inStock ? 'cursor-pointer bg-white text-gray-900 shadow-sm' : 'cursor-not-allowed bg-gray-50 text-gray-200', active ? 'ring-2 ring-indigo-500' : '', 'group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6']">-->
<!--                                                <RadioGroupLabel as="span">{{ size.name }}</RadioGroupLabel>-->
<!--                                                <span v-if="size.inStock" :class="[active ? 'border' : 'border-2', checked ? 'border-indigo-500' : 'border-transparent', 'pointer-events-none absolute -inset-px rounded-md']" aria-hidden="true" />-->
<!--                                                <span v-else aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">-->
<!--                                                    <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">-->
<!--                                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />-->
<!--                                                    </svg>-->
<!--                                                </span>-->
<!--                                            </div>-->
<!--                                        </RadioGroupOption>-->
<!--                                    </div>-->
<!--                                </RadioGroup>-->
<!--                            </div>-->

                                <button class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        type="button"
                                        @click="addToCart">
                                    Add to bag
                                </button>
                        </form>
                    </div>

                    <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                        <!-- Description and details -->
                        <div>
                            <h3 class="sr-only">Description</h3>

                            <div class="space-y-6">
                                <p class="text-base text-gray-900 dark:text-gray-200">{{ product.description }}</p>
                            </div>
                        </div>

<!--                        <div class="mt-10">-->
<!--                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-200">Highlights</h3>-->

<!--                            <div class="mt-4">-->
<!--                                <ul role="list" class="list-disc space-y-2 pl-4 text-sm">-->
<!--                                    <li v-for="highlight in product.highlights" :key="highlight" class="text-gray-400 dark:text-gray-300">-->
<!--                                        <span class="text-gray-600 dark:text-gray-400">{{ highlight }}</span>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="mt-10">-->
<!--                            <h2 class="text-sm font-medium text-gray-900 dark:text-gray-200">Details</h2>-->

<!--                            <div class="mt-4 space-y-6">-->
<!--                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ product.detail }}</p>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>







        <div class="max-w-7xl mx-auto p-6 lg:p-8">
<!--            <div class="mt-4">-->
<!--                <div class="">-->
<!--                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">-->
<!--                        <div>-->
<!--                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">-->
<!--                                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />-->
<!--                                </svg>-->
<!--                            </div>-->
<!--                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ item.title }}</h2>-->
<!--                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">-->
<!--                                {{ item.description }}-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <div v-if="props.item.can.update" class="items-center mt-4">
                <div class="flex justify-start">
                    <Link :href="`${product.id}/edit` " class="">
                        <PrimaryButton class="ml-4">
                            Edit Product
                        </PrimaryButton>
                    </Link>
                </div>
            </div>

        </div>


    </AppLayout>
</template>
