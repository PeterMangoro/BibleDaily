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
          route-name="users.readings.index"
          placeholder="Search readings..."
          show_per_page="true"
        />
      </div>

      <Table
        heading="Read Verses"
        :pagination="data.readings.links"
        path="users.readings.create"
        button="Add new Reading"
      >
        <template #tableHead>
          <TableHead>Date</TableHead>
          <TableHead>Verses</TableHead>
          <TableHead>Notes</TableHead>
          <TableHead>Prayer Points</TableHead>
          

          <TableHead class="text-center"></TableHead>
        </template>
        <TableRow
          v-for="reading in data.readings.data"
          :key="reading.id"
        >
          <TableData>
           {{ reading.read_date }}
          </TableData>
          <TableData>{{ reading.read_verses }}</TableData>
          <TableData >
            <p v-for="point in reading.notes" :key="point" class="flex gap-1" >
              - {{ point }}
            </p>
            </TableData
          >
         
          <TableData>
            <p v-for="point in reading.prayer_points" :key="point" class="flex gap-1" >
              - {{ point }}
            </p>
            <!-- {{ reading.prayer_points }} -->
            </TableData>
         
          <!-- <TableData>
            <div class="flex space-x-1">
             
              <botton
               @click="showUpdateForm(reading)"
                class="inline-flex items-center px-4 py-2 text-sm font-semibold tracking-widest text-white transition bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-800 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 hover:cursor-pointer"
                link="route('users.readings.edit', reading.uuid)"
                >View</botton
              >
              
            </div>
          </TableData> -->
        </TableRow>
      </Table>
      <!-- table End -->

      <!-- <div v-if="showForm">
        <update-reading-form 
        :reading="selectedReading"
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
// import UpdateReadingForm from "@/Pages/User/Reading/Partials/Update/UpdateReadingForm.vue"

const props = defineProps({
  data: Object,
});

const showForm = ref(false)
const selectedReading = ref(null)

function showUpdateForm(reading) {
  selectedReading.value = reading
  showForm.value=true
}
</script>
