<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="step_one">
          <bible-select-form
            @next="go_to_step_two"
           
            :books="data.books"
            :bible="data.bible"
          />
        </div>

        <div v-if="step_two">
          <create-notes-form
          
            @prev="go_to_step_one" 
            @next="go_to_step_three"          
           
          />
        </div>

         <div v-if="step_three">
          <create-categories-form
          :categories=data.categories
            @prev="go_to_step_two" 
            @next="go_to_step_three"          
           
          />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import BibleSelectForm from "@/Pages/User/Teaching/Partials/Create/BibleSelectForm.vue";
import CreateNotesForm from "@/Pages/User/Teaching/Partials/Create/CreateNotesForm.vue";
import CreateCategoriesForm from "@/Pages/User/Teaching/Partials/Create/CreateCategoriesForm.vue";

const props = defineProps({
  data: Object,
});

const step_one = ref(true);
const step_two = ref(false);
const step_three = ref(false);

function showCategoryType(type) {
  categoryType.value = type;
}

function go_to_step_one() {
  reset(), (step_one.value = true);
}

function go_to_step_two() {
  reset(), (step_two.value = true);
}

function go_to_step_three() {
  reset(), (step_three.value = true);
}



function reset() {
  (step_one.value = false), (step_two.value = false),(step_three.value = false);
}
</script>
