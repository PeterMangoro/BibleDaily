<template>
  <div class="flex flex-wrap gap-2 m-3 justify-evenly">
    <p class="sm:w-1/12 w-full text-center">{{ heading }}</p>
    <span class="p-4 bg-white rounded w-full shadow-xl sm:w-5/6">
      <p class="flex gap-2 py-2" v-for="notes in data" :key="notes">
        <span class="my-auto text-green-500">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-4 h-4"
          >
            <path stroke-linecap="round" stroke-linejoin="round" :d="icon" />
          </svg>
        </span>
        {{ notes }}
      </p>
    </span>
  </div>
</template>
<script setup>
const props = defineProps({
  heading: Object,
  data: Object,
  icon: String,
});
</script>