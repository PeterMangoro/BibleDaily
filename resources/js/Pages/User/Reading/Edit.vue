<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <bible-select-form           
            :books="data.books"
            :bible="data.bible"
            :verse="data.reading.verse"
          />
        </div>

        <div >
          <create-notes-form 
          :notes="data.reading.notes"         />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import BibleSelectForm from "@/Pages/User/Reading/Partials/Create/BibleSelectForm.vue";
import CreateNotesForm from "@/Pages/User/Reading/Partials/Create/CreateNotesForm.vue";

const props = defineProps({
  data: Object,
});

function showCategoryType(type) {
  categoryType.value = type;
}


</script>
