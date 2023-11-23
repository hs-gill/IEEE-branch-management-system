<script setup>
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    orders: Object,
});

const reorder = (order) => {
    console.log(order)
}
</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
<!--            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-bottom">-->
<!--                Transaction Table: List of all transactions made by different users.-->
<!--            </caption>-->
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
<!--                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">User</th>-->
<!--                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Email</th>-->
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Total</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Status</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Date</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Returned Date</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Reorder</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="order in orders.data">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.id }}</td>
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.user.name }}</td>-->
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.user.email }}</td>-->
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.item.name }}</td>-->
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">$ {{ order.total }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.status }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.created_at }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ order.returned_at }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                        <PrimaryButton @click="reorder(order)" class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                            Order again
                        </PrimaryButton>
                </td>
            </tr>
            </tbody>
        </table>
        <Pagination :data="orders"/>
    </div>
</template>
