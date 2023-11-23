
<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  role: Object,
  permissions: Object
});

// a computed ref
const hasPermission = computed(() => {
  if (form.permission != null) {
    props.role.permissions.forEach(permission => {
      if (permission.id === form.permission.id) {
        console.log(permission.id === form.permission.id)
        return true;
      }
    })
  }
  return false
})


const form = useForm({
  permission: null,
  role: props.role
});

const switchPermission = () => {
  form.put(route('permission-role.update'), {
    errorBag: 'switchPermission',
    preserveScroll: true,
    onFinish: (response) => {
      console.log(response)
    },
  });
};
</script>

<template>
  <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ role.id }}</td>
  <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ role.name }}</td>
  <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
    <div v-for="permission in role.permissions" :key="permission">
      {{ permission.name }}
    </div>
  </td>
  <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
    <Link :href="`roles/${role.id}`" class="group relative">
      <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
        Admin
      </PrimaryButton>
    </Link>
  </td>

  <!--        <div class="flex items-center">-->
  <!--            <select v-model="form.permission" class="px-4 py-3 rounded-lg dark:border-slate-500 bg-white dark:bg-slate-800">-->
  <!--                <option v-for="permission in permissions" :key="permission" :value="permission">{{ permission.name }}</option>-->
  <!--            </select>-->


  <!--            <div v-if="form.permission != null" class="flex px-4">-->
  <!--                <form @submit.prevent="switchPermission">-->
  <!--                    <PrimaryButton class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
  <!--                        {{ hasPermission ? 'Remove' : 'Add' }}-->
  <!--                    </PrimaryButton>-->
  <!--                </form>-->
  <!--            </div>-->
  <!--        </div>-->
  <!--    </td>-->
</template>
