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
<!--                    <Link v-for="event in events.data" :key="event.id" :href="`events/${event.id}` " class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">-->
<!--                        <div>-->
<!--                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">-->
<!--                                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />-->
<!--                                </svg>-->
<!--                            </div>-->
<!--                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ event.title }}</h2>-->
<!--                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">-->
<!--                                {{ event.description }}-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />-->
<!--                        </svg>-->
<!--                    </Link>-->

                    <Link v-for="event in events.data" :key="event.id" :href="`events/${event.id}`">
                        <article class="ab ec lx yr zd adg adq aiz arm asy avh chl dfs">
                            <img :src="event.image_path" alt="" class="aa ak ed ph tn aqe">
                            <div class="aa ak ed amo ana ann"></div>
                            <div class="aa ak ed adq bbt bbx bco"></div>
                            <div class="lx yt yz aak adg awa awp axo">
                                <time :datetime="event.dated_at" class="kq">{{ event.dated_at }}</time>
<!--                                <div class="hw lx yz aag">-->
<!--                                    <svg viewBox="0 0 2 2" class="hm nc rd uo apd">-->
<!--                                        <circle cx="1" cy="1" r="1"></circle>-->
<!--                                    </svg>-->
<!--                                    <div class="lx aad">-->
<!--                                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="oc se uo ads alp">-->
<!--                                        Michael Foster-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                            <h3 class="lf avz awg awp bah">
                                <a href="#">
                                    <span class="aa ak"></span>
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
.ak {
    inset: 0px;
}
.bah {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
}
.awp {
    line-height: 1.5rem;
}
.awg {
    font-weight: 600;
}
.avz {
    font-size: 1.125rem;
    line-height: 1.75rem;
}
.lf {
    margin-top: 0.75rem;
}
blockquote, dl, dd, h1, h2, h3, h4, h5, h6, hr, figure, p, pre {
    margin: 0;
}
h1, h2, h3, h4, h5, h6 {
    font-size: inherit;
    font-weight: inherit;
}
img, video {
    max-width: 100%;
    height: auto;
}
img, svg, video, canvas, audio, iframe, embed, object {
    display: block;
    vertical-align: middle;
}
.lx {
    display: flex;
}
img, svg, video, canvas, audio, iframe, embed, object {
    display: block;
    vertical-align: middle;
}
.yz {
    align-items: center;
}
.lx {
    display: flex;
}
.kq {
    margin-right: 2rem;
}
.axo {
    --tw-text-opacity: 1;
    color: rgb(209 213 219 / var(--tw-text-opacity));
}
.awp {
    line-height: 1.5rem;
}
.awa {
    font-size: 0.875rem;
    line-height: 1.25rem;
}
.adg {
    overflow: hidden;
}
.aak {
    row-gap: 0.25rem;
}
.yz {
    align-items: center;
}
.yt {
    flex-wrap: wrap;
}
.lx {
    display: flex;
}
.bco {
    --tw-ring-color: rgb(17 24 39 / 0.1);
}
.bbx {
    --tw-ring-inset: inset;
}
.bbt {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.adq {
    border-radius: 1rem;
}
.ed {
    z-index: -10;
}
.ak {
    inset: 0px;
}
.aa {
    position: absolute;
}
.bco {
    --tw-ring-color: rgb(17 24 39 / 0.1);
}
.bbx {
    --tw-ring-inset: inset;
}
.bbt {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.adq {
    border-radius: 1rem;
}
.ed {
    z-index: -10;
}
.ak {
    inset: 0px;
}
.aa {
    position: absolute;
}
.bco {
    --tw-ring-color: rgb(17 24 39 / 0.1);
}
.bbx {
    --tw-ring-inset: inset;
}
.bbt {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.adq {
    border-radius: 1rem;
}
.ed {
    z-index: -10;
}
.ak {
    inset: 0px;
}
.aa {
    position: absolute;
}
.bco {
    --tw-ring-color: rgb(17 24 39 / 0.1);
}
.bbx {
    --tw-ring-inset: inset;
}
.bbt {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.adq {
    border-radius: 1rem;
}
.ed {
    z-index: -10;
}
.ak {
    inset: 0px;
}
.aa {
    position: absolute;
}
.ann {
    --tw-gradient-via-position: ;
    --tw-gradient-to: rgb(17 24 39 / 0)  var(--tw-gradient-to-position);
    --tw-gradient-to-position: ;
    --tw-gradient-stops: var(--tw-gradient-from), rgb(17 24 39 / 0.4) var(--tw-gradient-via-position), var(--tw-gradient-to);
}
.ana {
    --tw-gradient-from: #111827 var(--tw-gradient-from-position);
    --tw-gradient-from-position: ;
    --tw-gradient-to: rgb(17 24 39 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position: ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.amo {
    background-image: linear-gradient(to top, var(--tw-gradient-stops));
}
.ed {
    z-index: -10;
}
.ak {
    inset: 0px;
}
.aa {
    position: absolute;
}
.aqe {
    -o-object-fit: cover;
    object-fit: cover;
}
.tn {
    width: 100%;
}
.ph {
    height: 100%;
}
.ed {
    z-index: -10;
}
.ak {
    inset: 0px;
}
.aa {
    position: absolute;
}
img, video {
    max-width: 100%;
    height: auto;
}
img, svg, video, canvas, audio, iframe, embed, object {
    display: block;
    vertical-align: middle;
}
@media (min-width: 1024px)
.dfs {
    padding-top: 20rem;
}
@media (min-width: 640px)
.chl {
    padding-top: 12rem;
}
.avh {
    padding-top: 20rem;
}
.asy {
    padding-bottom: 2rem;
}
.arm {
    padding-left: 2rem;
    padding-right: 2rem;
}
.aiz {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}
.adq {
    border-radius: 1rem;
}
.adg {
    overflow: hidden;
}
.zd {
    justify-content: flex-end;
}
.yr {
    flex-direction: column;
}
.lx {
    display: flex;
}
.ec {
    isolation: isolate;
}
.ab {
    position: relative;
}
</style>
