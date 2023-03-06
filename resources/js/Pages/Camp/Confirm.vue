<template>
    <confirm-camp-layout>
        <!-- <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        All Present People
      </h2>
    </template> -->

    <confirm-list :users = "data.users" :searchRoute="data.path" />
    </confirm-camp-layout>
  
</template>

<script setup>
import ConfirmCampLayout from "@/Layouts/ConfirmCampLayout.vue";
import ConfirmList from "@/Pages/Camp/Partials/ConfirmList.vue"

const props = defineProps({
    data: Object,
  });
  

</script>

<style>

</style>