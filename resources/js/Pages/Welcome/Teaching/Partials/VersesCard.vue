<template>
  <div class="flex flex-wrap gap-2 m-3 justify-evenly">
    <p class="w-1/12">Verses</p>
    <div class="flex gap-2 p-4 bg-white rounded shadow-xl sm:w-5/6">
      <span class="flex flex-wrap space-x-4">
    <p class="flex gap-2"> 
        <span class="my-auto text-green-500">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-7 h-7"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
          />
        </svg>
      </span>
      {{ verses }}
      </p>

      <button class="px-5 bg-green-300 border border-green-700 rounded-full py-auto" @click="showBible" @close="closeBible">
        Read
      </button> 
    </span>
      
      
      
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  verses: Object,
});

const emit = defineEmits(["next", "prev","bible","close"])

function showBible() {
  emit('bible')
}


function closeBible() {
  emit('close')
}
</script>