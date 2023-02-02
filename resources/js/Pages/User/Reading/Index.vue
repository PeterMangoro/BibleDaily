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
        <TableRow v-for="reading in data.readings.data" :key="reading.id">
          <TableData>
            {{ reading.read_date }}
          </TableData>
          <TableData>{{ reading.read_verses }}</TableData>
          <TableData class="w-1/3">
            <p v-for="point in reading.notes" :key="point" class="flex gap-1">
              - {{ point }}
            </p>
          </TableData>

          <TableData>
            <p
              v-for="point in reading.prayer_points"
              :key="point"
              class="flex gap-1"
            >
              - {{ point }}
            </p>
          </TableData>
        </TableRow>
      </Table>
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

const props = defineProps({
  data: Object,
});

const showForm = ref(false);
const selectedReading = ref(null);

function showUpdateForm(reading) {
  selectedReading.value = reading;
  showForm.value = true;
}
</script>
