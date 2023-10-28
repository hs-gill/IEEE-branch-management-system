<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteItemForm from '@/Pages/Items/Partials/DeleteItemForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import UpdateTeamNameForm from '@/Pages/Items/Partials/UpdateItemForm.vue';

defineProps({
  team: Object,
  availableRoles: Array,
  permissions: Object,
});
</script>

<template>
  <AppLayout title="Team Settings">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Team Settings
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <UpdateTeamNameForm :team="team" :permissions="permissions" />

        <TeamMemberManager
            class="mt-10 sm:mt-0"
            :team="team"
            :available-roles="availableRoles"
            :user-permissions="permissions"
        />

        <template v-if="permissions.canDeleteTeam && ! team.personal_team">
          <SectionBorder />

          <DeleteTeamForm class="mt-10 sm:mt-0" :team="team" />
        </template>
      </div>
    </div>
  </AppLayout>
</template>
