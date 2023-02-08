<template>
  <div>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div>
        <bible-select-form
          :books="data.books"
          :bible="data.bible"
          @bible="showBible = !showBible"
        />
      </div>

      <div class="my-3">
        <confirm-notes-form />
      </div>
    </div>
  </div>
</template>
  <script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import BibleSelectForm from "@/Pages/User/Reading/Partials/Create/BibleForm.vue";
import ConfirmNotesForm from "@/Pages/User/Reading/Partials/Create/ConfirmNotesForm.vue";

const props = defineProps({
  data: Object,
});

function showCategoryType(type) {
  categoryType.value = type;
}
const showBible = ref(true);

//   form.post(route("users.readings.store"), {
//       errorBag: "createReading",
//       preserveScroll: true,
//       onSuccess: () => {
//         localStorage.removeItem("notes");
//         localStorage.removeItem("verses");
//         localStorage.removeItem("prayer_points");
//       },
//     });
</script>
  