<template>
  <app-layout>
    <template #header>
      <h2
        class="text-xl font-semibold leading-tight text-black dark:text-slate-50"
      >
        User Dashboard
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between">
        <search-table
          class="py-2"
          route-name="users.teachings.index"
          placeholder="Search teachings..."
          show_per_page="true"
        />
      </div>

      <Table
        heading="Read Verses"
        :pagination="data.teachings.links"
        path="users.teachings.create"
        button="Add new Teaching"
      >
        <template #tableHead>
         
           <TableHead>Title</TableHead>
          <TableHead>Verses</TableHead>
          <TableHead>Notes</TableHead>
          <!-- <TableHead>Prayer Points</TableHead> -->
           <!-- <TableHead>Prayer</TableHead> -->

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow
          v-for="teaching in data.teachings.data"
          :key="teaching.id"
        >
         
          <TableData>
           {{ teaching.title }}
          </TableData>
          <TableData>{{ teaching.verses }}</TableData>
          <TableData >
            <p v-for="point in teaching.notes" :key="point" class="flex gap-1" >
              - {{ point }}
            </p>
            </TableData
          >
         
          <!-- <TableData>
            <p v-for="point in teaching.prayer_points" :key="point" class="flex gap-1" >
              - {{ point }}
            </p>
       
            </TableData> -->
          <!-- <TableData>
            <p v-if="teaching.prayer === 'No Prayer Available'" class="text-red-500">{{ teaching.prayer }}</p>
          <p v-else>{{ teaching.prayer }}</p>
           
          </TableData> -->
          <TableData>
            <div class="flex space-x-1">
             
              <Link
              
                class="inline-flex items-center px-4 py-2 text-sm font-semibold tracking-widest text-white transition bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-800 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 hover:cursor-pointer"
                :href="route('users.teachings.edit', teaching.slug)"
                >View</Link
              >

               <botton
               @click="showUpdateForm(teaching)"
                class="inline-flex items-center px-4 py-2 text-sm font-semibold tracking-widest text-white transition bg-red-600 border border-transparent rounded-md hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 hover:cursor-pointer"
                link="route('users.teachings.edit', teaching.uuid)"
                >Delete</botton
              >
              
            </div>
          </TableData>
        </TableRow>
      </Table>
      <!-- table End -->

      <!-- <div v-if="showForm">
        <update-teaching-form 
        :teaching="selectedTeaching"
        @close="showForm = false"
         />
      </div> -->
    </div>
  </app-layout>
</template>

<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
// import UpdateTeachingForm from "@/Pages/User/Teaching/Partials/Update/UpdateTeachingForm.vue"

const props = defineProps({
  data: Object,
});

const showForm = ref(false)
const selectedTeaching = ref(null)

function showUpdateForm(teaching) {
  selectedTeaching.value = teaching
  showForm.value=true
}
</script>
