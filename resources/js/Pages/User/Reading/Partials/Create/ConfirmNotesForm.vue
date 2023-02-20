
<template >
  <form-section @submitted="confirmReading">
    <template #title> 
      <p class="text-slate-50">
        Lessons Learnt
      </p>
       </template>

    <template #description>
      <p class="text-slate-50">
        Give brief notes of what you learnt in the Bible today.
      </p>
      
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium">*</span> eg
      </p>

      <p class="text-slate-50">* God is Love</p>
      <p class="text-slate-50">* He will always protect us</p>
      <p class="text-slate-50">* We are safe in His arms</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="notes" :value="addPoint('hie')" />
        <text-area
          id="notes"
          ref="notesInput"
          v-model="notes"
          type="text"
          class="block w-full mt-1"
          autocomplete="notes"
          rows="5"
          readonly
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="notes" value="Prayer Points" />
        <text-area
          id="prayer_points"
          ref="prayer_pointsInput"
          v-model="prayer_points"
          type="text"
          class="block w-full mt-1"
          autocomplete="prayer_points"
          rows="5"
          readonly
        />
      </div>
    </template>

    <template #actions>
      <div class="flex justify-between w-full">
        <div
          @click="back"
          class="
            gap-2
            p-1
            px-4
            text-black
            rounded
            bg-slate-300
            hover:bg-gray-400 hover:cursor-pointer
          "
        >
          Back
        </div>

        <span>
          <action-message :on="form.wasSuccessful" class="mr-3">
            Saved.
          </action-message>

          <submit-button
            :class="{ 'opacity-25': processing }"
            :disabled="processing"
          >
            Save
          </submit-button>
        </span>
      </div>
    </template>
  </form-section>
  <div v-if="form.hasErrors" class="m-auto mt-3">
    <div class="w-auto gap-3 p-2 bg-white rounded-md">
      <div
        v-for="error in form.errors"
        :key="error.id"
        class="py-3 text-red-600"
      >
        *{{ error }}
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import { useStorage } from "@/Composables/useStorage";
import { pointConverter } from "@/Composables/pointConverter";

const props = defineProps({
  reading: Object,
});

const notes = useStorage("notes");
const read = useStorage("verses");
let prayer_points = useStorage("prayer_points");
let verses = useStorage("verses", null);

const form = useForm({
  read: read.value,
  notes: notes.value,
  prayer_points: prayer_points.value,
  remember: true,
});
const notesInput = ref(null);

const new_point = ref(null);

function addPoint(user_input) {
  new_point.value = user_input.concat("- ");

  console.log(user_input.concat("- "));
}
const emit = defineEmits(["next", "prev"]);


const back = () => {
  emit("prev");
};


const confirmReading = () => {
  form.post(route("users.readings.store"), {
    errorBag: "confirmReading",
    preserveScroll: true,
    onSuccess: () => {
      localStorage.removeItem("notes");
      localStorage.removeItem("verses");
      localStorage.removeItem("prayer_points");
    },
  });
};
</script>
