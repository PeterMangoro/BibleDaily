<template>
  <div class="flex flex-wrap justify-evenly gap-y-4">
    <div 
    v-for="image in images" :key="image.id"
    class="bg-gray-200 rounded-lg  w-64 ">
      <img
        :src="image"
        :alt="image.path"
        class="object-cover object-center rounded w-96 h-96 group-hover:opacity-75"
      />
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  images: Object,
});
</script>

