<script setup>
import {useForm, Link} from "@inertiajs/vue3";
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    user: Object,
    roles: Object
});

// a computed ref
const hasRole = computed(() => {
    let bool = false
    if (form.role != null) {
        props.user.roles.forEach(role => {
            if (role.id === form.role.id) {
                console.log(role.id === form.role.id)
                bool = true
            }
        })
    }
    return bool
})

const form = useForm({
    role: null,
    user: props.user
});

const switchRole = () => {
    form.put(route('role-user.update'), {
        errorBag: 'switchRole',
        preserveScroll: true,
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
        <div v-for="role in user.roles">
            {{ role.name }}
        </div>
    </td>
<!--    <td>-->
<!--        <Link :href="`users/${user.id}`" class="group relative">-->
<!--        <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">-->
<!--            -->
<!--            Admin-->
<!--        </PrimaryButton>-->
<!--        </Link>-->
<!--    </td>-->



    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
        <div class="flex items-center">
            <select v-model="form.role" class="px-4 py-3 rounded-lg dark:border-slate-500 bg-white dark:bg-slate-800">
                <option v-for="role in roles" :value="role">{{ role.name }}</option>
            </select>

            <div v-if="form.role != null" class="flex px-4">
                <form @submit.prevent="switchRole">
                    <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ hasRole ? 'Remove' : 'Add' }}
                    </PrimaryButton>
                </form>
            </div>
        </div>
    </td>
</template>
