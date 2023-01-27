<template>
  <app-layout>
    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="step_one">
          <bible-select-form 
          @next="go_to_step_two" 
          :books=data.books 
          :bible=data.bible />
        </div>

        <div v-if="step_two">
          <create-notes-form
            @prev="go_to_step_one"
            @next="go_to_step_three"            
          />
        </div>

        <div v-if="step_three">
          <create-accommodation-information
            @prev="go_to_step_two"
            @next="go_to_step_four"
          />
        </div>

        <div v-if="step_four">
          <create-accommodation-provisions
            @prev="go_to_step_three"
            @next="go_to_step_five"
          />
        </div>

        <div v-if="step_five">
          <create-accommodation-attachments
            @prev="go_to_step_four"
            @next="go_to_step_five"
          />
        </div>

        <!--
          <create-accommodation-images   />
          <JetSectionBorder />
        </div>
        <div>
          <create-accommodation-documents   />
          <JetSectionBorder />
        </div> -->
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import BibleSelectForm from "@/Pages/User/Reading/Partials/Create/BibleSelectForm.vue";
import CreateNotesForm from "@/Pages/User/Reading/Partials/Create/CreateNotesForm.vue";
import CreateAccommodationInformation from "@/Pages/User/Reading/Partials/Create/CreateAccommodationInformation.vue";

const props = defineProps({
  data: Object,
});

const deleteImage = (attachmentId) => {
  const result = confirm("Delete Image ?");
  if (result) {
    router.delete(route("attachment.delete", attachmentId), {
      preserveScroll: true,
    });
  }
};

const routes = [
  {
    name: "User Accommodations",
    link: "accommodations.index",
  },
  {
    name: "Accommodation-Edit",
    link: "accommodations.edit",
  },
];

const step_one = ref(true);
const step_two = ref(false);
const step_three = ref(false);
const step_four = ref(false);
const step_five = ref(false);
const step_six = ref(false);

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

function go_to_step_four() {
  reset(), (step_four.value = true);
}

function go_to_step_five() {
  reset(), (step_five.value = true);
}

function go_to_step_six() {
  reset(), (step_six.value = true);
}

function reset() {
  (step_one.value = false),
    (step_two.value = false),
    (step_three.value = false),
    (step_four.value = false),
    (step_five.value = false),
    (step_six.value = false);
}
</script>
