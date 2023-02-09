<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- <div>
          <bible-select-form
            :books="data.books"
            :bible="data.bible"
            :verse="data.teaching.read_verses"
            @bible="showBible = !showBible"
          />
        </div> -->
        <div class="pt-2">
          <bible-card
            class=""
            v-if="showBible"
            :bible="data.bible"
            :books="data.books"
          />
        </div>

        <div class="my-3">
          <update-notes-form
           :teaching="data.teaching"
           :books="data.books"
            :bible="data.bible"            
            @bible="showBible = !showBible" />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import BibleSelectForm from "@/Pages/User/Teaching/Partials/Update/BibleSelectForm.vue";
import UpdateNotesForm from "@/Pages/User/Teaching/Partials/Update/UpdateNotesForm.vue";
import BibleCard from "@/Pages/User/Teaching/Partials/Update/BibleCard.vue";

const props = defineProps({
  data: Object,
});

function showCategoryType(type) {
  categoryType.value = type;
}
const showBible = ref(false);
</script>
