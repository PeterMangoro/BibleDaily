<script setup>
import ConfirmCampLayout from "@/Layouts/ConfirmCampLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

const props = defineProps({
  data:Object
})
</script>

<template>
  <ConfirmCampLayout title="Dashboard">
    <!-- <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template> -->

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="overflow-hidden sm:rounded-lg flex flex-wrap justify-evenly gap-5"
        >
         

          <dashboard-card
            title="All Registered People"
            :total="data.all"          
            more_path="confirm-all"
            more_tip="Click to view All "
          />         


          <dashboard-card
            title="Sunday School"
            :total="data.sunday_school"           
            more_path="confirm-sundaySchool"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Youth"
            :total="data.youth"           
            more_path="confirm-youth"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Over Comers"
            :total="data.over_comers"           
            more_path="confirm-overComers"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Registered Male "
            :total="data.male"           
            more_path="confirm-male"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Registered Female "
            :total="data.female"           
            more_path="confirm-female"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Accommodation Seekers"
            :total="data.need_accommodation"           
            more_path="confirm-needAccommodation"
            more_tip="Click to view All"
          />
        </div>
      </div>
    </div>
  </ConfirmCampLayout>
</template>
