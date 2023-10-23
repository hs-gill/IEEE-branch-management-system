<script setup>
// import Pagination from '@/Components/Pagination.vue';

defineProps({
    users: Object,
    roles: Object
});


</script>

<template>
    <div class="text-gray-500 dark:text-gray-400">
        <table class="table-auto border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
            <caption class="text-slate-500 dark:text-slate-400 pt-4 text-xs caption-bottom">
                Items Table: List of all items available to rent.
            </caption>
            <thead class="bg-slate-50 dark:bg-slate-700">
            <tr>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">ID</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Name</th>
                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Role</th>
<!--                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Description</th>-->
<!--                <th class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Category</th>-->
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.id }}</td>
                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.name }}</td>
                <td>
                    <select>
                        <option v-for="role in roles" @select="assignRole" :value="role.id">{{ role.title }}</option>
                    </select>
                </td>
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><img :src="user.image_path" class="w-640 h-480" :alt="user.name"/></td>-->
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.description }}</td>-->
<!--                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.item_category.name }}</td>-->
            </tr>
            </tbody>
        </table>
        <!--        <Pagination :items="items"/>-->
    </div>
</template>
