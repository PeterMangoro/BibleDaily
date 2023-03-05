<template>
    <camp-layout>
        <!-- <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        All Present People
      </h2>
    </template> -->

    <list :users = "data.users" :searchRoute="data.path" />
    </camp-layout>
  
</template>

<script setup>
import CampLayout from "@/Layouts/CampLayout.vue";
import List from "@/Pages/Camp/Partials/List.vue"

const props = defineProps({
    data: Object,
  });
  

</script>

<style>

</style>