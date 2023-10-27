<script setup>
import {useForm} from "@inertiajs/vue3";
import {onMounted} from "vue";

const props = defineProps({
    user: Object,
    roles: Object
});

onMounted(function() {
    console.log(props.user)
    form.selectedRole = props.user.roles[0]
})

const form = useForm({
    selectedRole: null,
});

const submit = () => {
    form.put(route('users/' + user), {
        onFinish: (response) => {
            console.log(response)
        },
    });
};
</script>

<template>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.id }}</td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ user.name }}</td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
        <form @submit.prevent="submit">
            <select v-model="form.selectedRole">
                <option v-for="role in roles" :value="role">{{ role.name }}</option>
            </select>
        </form>
    </td>
    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ form.selectedRole ? form.selectedRole.name : "" }}</td>
</template>
