<template>
  <Link
    :href="route(path,route_parameter)"
    class="p-3 transition duration-300 ease-in-out rounded hover:scale-105 hover:cursor-pointer bg-slate-50 hover"
  >
   <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 ">
       
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white rounded-lg shadow-md sm:max-w-md">
            <slot />
        </div>
    </div>
  </Link>
</template>
<script setup>
const props = defineProps({
  heading: String,
  detail: String,
  route_parameter: String,
  path: String,
});
</script>
