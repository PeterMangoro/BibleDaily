<template>
  <app-layout>
    <div class="m-auto max-w-7xl">
      <div class="mx-auto my-3">
        <title-section
          :title="data.teaching.title"
          :author="data.teaching.author"
          :date="data.teaching.written_date"
        />

        <verses-card
          :verses="data.teaching.verses"
          @bible="showBible = !showBible"
        />

        <bible-card v-if="showBible" :bible="data.bible" :books="data.books" />

        <points-card
          heading="Notes"
          :data="data.teaching.notes"
          icon="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
        />

        <points-card
          heading="Prayer Points"
          :data="data.teaching.prayer_points"
          icon="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        />

        <prayer-card
        v-if="data.teaching.prayer"
          heading="Prayer "
          :prayer="data.teaching.prayer"
          
        />

      </div>

    

<div class="text-center">
   <button class="px-5 bg-indigo-300 border border-indigo-700 rounded-full py-auto" @click="createReading" >
        Mark as Completed Reading
      </button> 
</div>
      
    </div>

    <!-- <div v-if="showModal">
      <bible-form @close=closeBible :bible=data.bible :books=data.books />
    </div> -->
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import WelcomeCard from "@/Components/Welcome/WelcomeCard.vue";
import PointsCard from "@/Pages/Welcome/Teaching/Partials/PointsCard.vue";
import PrayerCard from "@/Pages/Welcome/Teaching/Partials/PrayerCard.vue";
import BibleCard from "@/Pages/Welcome/Teaching/Partials/BibleCard.vue";
import VersesCard from "@/Pages/Welcome/Teaching/Partials/VersesCard.vue";
import TitleSection from "@/Pages/Welcome/Teaching/Partials/TitleSection.vue";
import BibleForm from "@/Pages/Welcome/Teaching/Partials/BibleForm.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { pointConverter } from "@/Composables/pointConverter";

const props = defineProps({
  data: Object,
});

const showBible = ref(false);

function closeBible() {
  showModal.value = false;
}


const form = useForm({
  
  notes: pointConverter(props.data.teaching.notes),
  read: props.data.teaching.verses,
  prayer_points: pointConverter(props.data.teaching.notes),
  
  remember: true,
});


const createReading = () => {
 
    form.post(route("users.readings.store"), {
      errorBag: "createReading",
      preserveScroll: true,
      
    });
};
</script>