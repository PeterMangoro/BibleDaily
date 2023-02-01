<template>
  <app-layout>
    <div class="m-auto max-w-7xl">
      <div class="mx-auto my-3">
        <h1 class="text-2xl font-extrabold text-center">
          {{ data.teaching.title }}
        </h1>
        <div class="flex flex-wrap justify-center gap-1">
          <span> {{ data.teaching.author }} </span>
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
          <span> {{ data.teaching.written_date }} </span>
        </div>

        <div class="flex flex-wrap gap-2 m-3 justify-evenly">
          <p class="w-1/12">Verses</p>
          <p class="flex gap-2 p-4 bg-white rounded shadow-xl sm:w-5/6">
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
            {{ data.teaching.verses }}
          </p>
        </div>
        <div class="flex flex-wrap gap-2 m-3 justify-evenly">
          <p class="w-1/12">Notes</p>
          <span class="p-4 bg-white rounded shadow-xl sm:w-5/6">
            <p
              class="flex gap-2 py-2"
              v-for="notes in data.teaching.notes"
              :key="notes"
            >
              <span class="my-auto text-green-500">
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
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                  />
                </svg>
              </span>
              {{ notes }}
            </p>
          </span>
        </div>

        <div class="flex flex-wrap gap-2 m-3 justify-evenly">
          <p class="w-1/12">Prayer Points</p>

          <span class="p-4 bg-white rounded shadow-xl sm:w-5/6">
              <p
            class="flex gap-2 "
            v-for="points in data.teaching.prayer_points"
            :key="points"
          >
            <span class="my-auto text-green-500">
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
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </span>
            {{ points }}
          </p>
          </span>
        
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import WelcomeCard from "@/Components/Welcome/WelcomeCard.vue";

const props = defineProps({
  data: Object,
});
</script>