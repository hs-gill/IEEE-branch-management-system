<script setup>
import { onMounted } from "vue";

defineProps({
    user: Object,
    roles: Object
});

const selectedRole = null;

onMounted(() => {
    this.selectedRole = this.user.roles.first;
})
</script>

<template>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.id }}</td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.name }}</td>
    <td>
        <select v-model="selectedRole">
            <option v-for="role in roles">{{ role.name }}</option>
        </select>
    </td>
</template>
