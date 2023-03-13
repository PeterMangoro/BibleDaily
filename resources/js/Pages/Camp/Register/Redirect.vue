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
      <div class="m-auto sm:px-6 lg:px-8 ">
        <div class=" p-5 bg-white rounded-lg m-auto text-center w-60 capitalize flex justify-center flex-wrap gap-4">
          <p class="mt-3">
            thank you for Registering for the Camp Meeting !!!
          </p>
          
<div class="pb-3">
  <Link
                          :href="route('registerCamp')"
                          class="
                            float-right
                            px-6
                           
                            py-2.5
                            bg-green-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-green-700 hover:shadow-lg
                            focus:bg-green-700
                            focus:shadow-lg
                            focus:outline-none
                            focus:ring-0
                            active:bg-green-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out
                          "
                          >Register Someone </Link
                        >
</div>

         
        </div>
      
      </div>
    </div>
  </ConfirmCampLayout>
</template>
