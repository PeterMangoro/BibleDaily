<template>
    <div class="flex flex-wrap gap-2 m-3 justify-evenly">
      <p class="sm:w-1/12 w-full text-center text-slate-50">Prayer</p>
      <div class="flex gap-2 p-4 bg-white w-full rounded shadow-xl sm:w-5/6">
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
              d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"
            />
          </svg>
        </span>
        <span class="italic">
            {{ prayer }}
        </span>
       
        </p>
  
        
      </span>
        
    

        
      </div>
    </div>
  </template>
  <script setup>
  const props = defineProps({
    prayer: Object,
  });
  
  const emit = defineEmits(["next", "prev","bible","close"])
  
  function showBible() {
    emit('bible')
  }
  
  
  function closeBible() {
    emit('close')
  }
  </script>