<script setup>
import CampLayout from "@/Layouts/CampLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";

const props = defineProps({
  data:Object
})
</script>

<template>
  <CampLayout title="Provinces">
    <!-- <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Provinces
      </h2>
    </template> -->

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="overflow-hidden sm:rounded-lg flex flex-wrap justify-evenly gap-5"
        >
          <dashboard-card
            title="Bulawayo"
            :total="data.bulawayo_percentage"
            :top="data.bulawayo"
            :bottom = "data.bulawayo_total"
            more_path="bulawayo"    
          />

          <dashboard-card
            title="Harare"
            :total="data.harare_percentage"
            :top="data.harare"
            :bottom = "data.harare_total"      
            more_path="harare"
            more_tip="Click to view All "
          />

          <dashboard-card
            title="Manicaland"
            :total="data.manicaland_percentage"
            :top="data.manicaland"
            :bottom = "data.manicaland_total"          
            more_path="manicaland"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Mashonaland Central"
            :total="data.mashonalandCentral_percentage"
            :top="data.mashonalandCentral"
            :bottom = "data.mashonalandCentral_total"   
            more_path="mashonalandCentral"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Mashonaland East"
            :total="data.mashonalandEast_percentage"
            :top="data.mashonalandEast"
            :bottom = "data.mashonalandEast_total"   
            
            more_path="mashonalandEast"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Mashonaland West"
            :total="data.mashonalandWest_percentage"
            :top="data.mashonalandWest"
            :bottom = "data.mashonalandWest_total"   
                     
            more_path="mashonalandWest"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Masvingo"
            :total="data.masvingo_percentage"
            :top="data.masvingo"
            :bottom = "data.masvingo_total"  
            more_path="masvingo"
            more_tip="Click to view All"
          />

          <dashboard-card
            title=" Matebeleland North"
            :total="data.matebelelandNorth_percentage"
            :top="data.matebelelandNorth"
            :bottom = "data.matebelelandNorth_total"  
            more_path="matebelelandNorth"
            more_tip="Click to view All"
          />

          <dashboard-card
            title="Matebeleland South"
            :total="data.matebelelandSouth_percentage"
            :top="data.matebelelandSouth"
            :bottom = "data.matebelelandSouth_total" 
            more_path="matebelelandSouth"
            more_tip="Click to view All"
          />

         

          
        </div>
      </div>
    </div>
  </CampLayout>
</template>
