<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Table from '@/Pages/Feedbacks/Table.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Link} from "@inertiajs/vue3";
import {onMounted} from "vue";
import Modal from "@/Components/Modal.vue";

const props = defineProps({
    feedbacks: Object,
});
</script>

<template>
    <AppLayout title="Feedback">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Feedback
            </h2>
        </template>

        <Modal
                :show="false"
                :max-width="maxWidth"
                :closeable="closeable"
                @close="close"
        >
            <div class="ab xh adg adt alo ari asu avd avk bbo bem bvg bzj bzu ceq" id="headlessui-dialog-panel-2" data-headlessui-state="open">
                <div>
                    <div class="gx lx nj rl yz ze ads aje">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="oc se axy">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>
                    </div>
                    <div class="lf avl bxj">
                        <h3 class="avy awg awp axv" id="headlessui-dialog-title-3" data-headlessui-state="open">Payment successful</h3>
                        <div class="lb">
                            <p class="awa axr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur amet labore.</p>
                        </div>
                    </div>
                </div>
                <div class="lj bxl">
                    <button type="button" class="ly tn ze adu ajr arf arv awa awg bah bbn bis boy boz bpb bpk">Go back to dashboard</button>
                </div>
            </div>
        </Modal>


        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="">
                <div class="mt-5 lg:mt-7 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     class="w-7 h-7 stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Feedbacks Table</h2>

                            <p class="mt-4 mb-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                This table shows the list of feedbacks that the platform has received, ordered by date of creation.
                                important news in the Laravel ecosystem, including new package releases and tutorials.
                            </p>

                            <Table :feedbacks="feedbacks" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
@media (min-width: 640px)
.ceq {
    padding: 1.5rem;
}
@media (min-width: 640px)
.bzu {
    max-width: 24rem;
}
@media (min-width: 640px)
.bzj {
    width: 100%;
}
@media (min-width: 640px)
.bvg {
    margin-top: 2rem;
    margin-bottom: 2rem;
}
.bem {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}
.bbo {
    --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.avk {
    text-align: left;
}
.avd {
    padding-top: 1.25rem;
}
.asu {
    padding-bottom: 1rem;
}
.ari {
    padding-left: 1rem;
    padding-right: 1rem;
}
.alo {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}
.adt {
    border-radius: 0.5rem;
}
.adg {
    overflow: hidden;
}
.xh {
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.ab {
    position: relative;
}
.aje {
    --tw-bg-opacity: 1;
    background-color: rgb(220 252 231 / var(--tw-bg-opacity));
}
.ads {
    border-radius: 9999px;
}
.ze {
    justify-content: center;
}
.yz {
    align-items: center;
}
.rl {
    width: 3rem;
}
.nj {
    height: 3rem;
}
.lx {
    display: flex;
}
.gx {
    margin-left: auto;
    margin-right: auto;
}
.axy {
    --tw-text-opacity: 1;
    color: rgb(22 163 74 / var(--tw-text-opacity));
}
.se {
    width: 1.5rem;
}
.oc {
    height: 1.5rem;
}
@media (min-width: 640px)
.bxj {
    margin-top: 1.25rem;
}
.avl {
    text-align: center;
}
.lf {
    margin-top: 0.75rem;
}
.axv {
    --tw-text-opacity: 1;
    color: rgb(17 24 39 / var(--tw-text-opacity));
}
.awp {
    line-height: 1.5rem;
}
.awg {
    font-weight: 600;
}
.avy {
    font-size: 1rem;
    line-height: 1.5rem;
}
.lb {
    margin-top: 0.5rem;
}
.axr {
    --tw-text-opacity: 1;
    color: rgb(107 114 128 / var(--tw-text-opacity));
}
.awa {
    font-size: 0.875rem;
    line-height: 1.25rem;
}
.bxl {
    margin-top: 1.5rem;
}
.lj {
    margin-top: 1.25rem;
}
.bbn {
    --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.bah {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
}
.awg {
    font-weight: 600;
}
.awa {
    font-size: 0.875rem;
    line-height: 1.25rem;
}
.arv {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.arf {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}
.ajr {
    --tw-bg-opacity: 1;
    background-color: rgb(79 70 229 / var(--tw-bg-opacity));
}
.adu {
    border-radius: 0.375rem;
}
.ze {
    justify-content: center;
}
.tn {
    width: 100%;
}
.ly {
    display: inline-flex;
}
</style>
