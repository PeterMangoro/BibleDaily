<template>
    
  
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between py-2">
        <search-table
          class="pb-2"
          :routeName="searchRoute"
          placeholder="Search users..."
          
        />
     
      </div>

      <Table
       
        :pagination="users.links"          
      >
        <template #tableHead>
          <TableHead class="cursor-pointer" @click="sort('name')" name="name"
            >Name</TableHead
          >
          <TableHead class="hidden sm:table-cell">Contact</TableHead>
          <TableHead class="hidden sm:table-cell">Gender</TableHead>
          <TableHead class="hidden sm:table-cell">Province</TableHead>
         
          <TableHead
            class="cursor-pointer"
            @click="sort('sale_status')"
            name="sale_status"
            >Pastor</TableHead
          >

          <TableHead class="text-center"></TableHead>
        </template>

        <TableRow v-for="user in users.data" :key="user.id">
          <TableData class="capitalize" >{{ user.name }}</TableData>
          <TableData class="hidden sm:table-cell">{{ user.contact }}</TableData>
          <TableData class="hidden sm:table-cell">{{ user.gender }}</TableData>
          <TableData class="hidden sm:table-cell">{{ user.province }} <br> <span v-if="user.assembly" class="capitalize"  > ({{ user.assembly }})</span> <br></TableData>

         
          <TableData class="hidden sm:table-cell capitalize">           
            <span v-if="user.pastor" > {{ user.pastor }}</span>
          </TableData>
        
        </TableRow>
      </Table>
      <!-- <span class="w-full" v-if="users.length == 0">
        <no-result-display />
      </span> -->

      <!-- table End -->
    </div>

 

</template>
  
  <script setup>
import { ref } from "vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
//   import { useSort } from "@/Composables/sort.js";
// import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";
import {router} from '@inertiajs/vue3'

const props = defineProps({
  users: Object,
  searchRoute:String
});

function sort(column) {
  useSort(column, "users.index");
}

function markAttended(id) {
  router.post(route('attend',id))
}
</script>
  