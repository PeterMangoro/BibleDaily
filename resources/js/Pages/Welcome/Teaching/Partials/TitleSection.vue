<template>
  <h1 class="text-2xl font-extrabold text-center text-slate-50">
    {{ title }}
  </h1>
  <div class="flex flex-wrap justify-center gap-1 text-slate-50">
    <span> {{ author }} </span>
    <span class="my-auto">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-4 h-4"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>
    </span>
    <span> {{ date }} </span>
  </div>
</template>
<script setup>
const props = defineProps({
    title:String,
    author:String,
    date:String
})
</script>