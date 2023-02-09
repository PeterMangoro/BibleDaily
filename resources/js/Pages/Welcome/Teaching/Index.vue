<template>
  <app-layout>
    <div class="m-auto max-w-7xl">
      <div class="flex flex-wrap justify-evenly items-center">
        <search-table
          class="py-2 mt-5"
          route-name="welcome"
          placeholder="Search a Sermon..."
          show_per_page="true"
        />
      </div>
      <div
        v-if="(data.teachings.data).length"
        class="flex flex-wrap gap-2 mt-10 justify-evenly"
      >
        <Link
          v-for="teaching in data.teachings.data"
          :key="teaching.slug"
          class="p-2 bg-white rounded-lg shadow-lg sm:w-1/4 w-96"
          :href="route('teachings.show', teaching.slug)"
        >
          <p class="my-2 text-lg font-bold text-green-500 underline">
            {{ teaching.title }}
          </p>
          <div class="flex flex-wrap justify-start gap-1 mb-2">
            <p
              class="p-1 px-2 bg-green-100 border border-green-500 rounded-lg"
              v-for="category in teaching.categories"
              :key="category.id"
            >
              {{ category.title }}
            </p>
          </div>
          <p class="my-2">{{ teaching.verses }}</p>

          <div class="flex justify-between w-full border-b border-b-green-500">
            <p class="text-sm">{{ teaching.written_date }}</p>
            <p class="text-sm">{{ teaching.author }}</p>
          </div>

          <p class="flex gap-1 mt-2 mb-1 font-semibold text-green-600">
            <span>Read Post</span>
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
                  d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                />
              </svg>
            </span>
          </p>
        </Link>
      </div>

      <div v-else class="items-center">
        <p class="font-semibold italic text-2xl">
          No Sermons Found... Please Try Another Search...
        </p>
      </div>

      <div v-if="data.teachings.data.length" class="p-2 m-2 flex justify-evenly">
        <Pagination :links="data.teachings.links" />
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import WelcomeCard from "@/Components/Welcome/WelcomeCard.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import Pagination from "@/Components/Shared/Pagination.vue";
const props = defineProps({
  data: Object,
});
</script>
