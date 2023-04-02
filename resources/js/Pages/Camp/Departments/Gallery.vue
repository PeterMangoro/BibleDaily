<template>
  <camp-layout>
    <div class="bg-slate-300 min-h-screen">
      <div class="font-semibold p-4 text-xl">Meet Our {{ data.heading }}</div>
      <div class="m-2">
        <gallery :images="data.images" />
      </div>
    </div>
  </camp-layout>
</template>

<script setup>
import CampLayout from "@/Layouts/CampLayout.vue";
import Gallery from "@/Components/Shared/Gallery/Gallery.vue";

const props = defineProps({
  data: Object,
});
</script>

<style>
</style>