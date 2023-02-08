
<template >
  <form-section @submitted="createReading">
    <template #title> Lessons Learnt </template>

    <template #description>
      Give brief notes of what you learnt in the Bible today.
      <p class="pt-2">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium">*</span> eg
      </p>

      <p>* God is Love</p>
      <p>* He will always protect us</p>
      <p>* We are safe in His arms</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="notes" value="Notes" />
        <text-area
          id="notes"
          ref="notesInput"
          v-model="notes"
          type="text"
          class="block w-full mt-1"
          autocomplete="notes"
          rows="5"
          required
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
          required
        />
      </div>
    </template>

    <template #actions>
      <action-message :on="recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

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

        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Save & Review
        </submit-button>
      </div>
    </template>
  </form-section>
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

const notes = useStorage("notes", null);
const updatedNotes = ref(notes.value);
let verses = ref(useStorage("verses", null));
let prayer_points = useStorage("prayer_points", null);

// const props = defineProps({
//   key:Object
// })
// watch(notes,async(newUdatedNotes)=>{
//  updatedNotes = notes.value
// })

// const form = useForm({
//   notes: updatedNotes,
//   read: verses.value,
//   prayer_points: prayer_points.value,
//   remember: true,
// });
// let form.notes = useStorage("notes", null);

const emit = defineEmits(["next", "prev"]);

const createReading = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};

const next = () => {
  emit("next");
};

const notesInput = ref(null);
</script>
