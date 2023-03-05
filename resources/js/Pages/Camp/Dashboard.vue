<script setup>
import CampLayout from "@/Layouts/CampLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

const props = defineProps({
  data:Object
})
</script>

<template>
  <CampLayout title="Dashboard">
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
            title="TurnUp %"
            :total="data.turnup"
            more_path="provinces"    
          />

          <dashboard-card
            title="All Registered People"
            :total="data.all"          
            more_path="all"
            more_tip="Click to view All "
          />

          <dashboard-card
            title="All Present People"
            :total="data.attended"           
            more_path="present"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="New Believers"
            :total="data.new_believers"
            more_path="new"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Church Members"
            :total="data.believers"
           
            more_path="members"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Sunday School"
            :total="data.sunday_school"
           
            more_path="sundaySchool"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Youth"
            :total="data.youth"
           
            more_path="youth"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" OverComers"
            :total="data.over_comers"
           
            more_path="overComers"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Male Attendants"
            :total="data.male"
           
            more_path="male"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Female Attendants"
            :total="data.female"
           
            more_path="female"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Total Accommodation Seekers"
            :total="data.need_accommodation"
           
            more_path="needAccommodation"
            more_tip="Click to view All"
          />
        </div>
      </div>
    </div>
  </CampLayout>
</template>
