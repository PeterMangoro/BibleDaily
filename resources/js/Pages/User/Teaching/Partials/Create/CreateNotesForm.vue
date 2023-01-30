
<template >
  <form-section @submitted="createTeaching">
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

      <div class="col-span-6 sm:col-span-4">
        <input-label for="prayer" value="Prayer" />
        <text-area
          id="prayer"
          ref="prayerInput"
          v-model="prayer"
          type="text"
          class="block w-full mt-1"
          autocomplete="prayer"
          rows="5"
          
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
          class="gap-2 p-1 px-4 text-black rounded bg-slate-300 hover:bg-gray-400 hover:cursor-pointer"
        >
          Back
        </div>

        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Save & Finish
        </submit-button>
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

const title = useStorage("title", null);
const notes = useStorage("notes", null);
let verses = ref(useStorage("verses", null));
let prayer_points = useStorage("prayer_points", null);
let prayer = useStorage("prayer", null);

const form = useForm({
  title: title.value,
  notes: notes.value,
  read: verses.value,
  prayer_points: prayer_points.value,
  prayer: prayer.value,
  remember: true,
});
// let form.notes = useStorage("notes", null);

const emit = defineEmits(["next", "prev", "reload"]);

const createTeaching = () => {
  emit("reload"),
    form.post(route("users.teachings.store"), {
      errorBag: "createTeaching",
      preserveScroll: true,
      onSuccess: () => {
        localStorage.removeItem("title");
        localStorage.removeItem("notes");
        localStorage.removeItem("verses");
        localStorage.removeItem("prayer_points");
        localStorage.removeItem("prayer");
      },
    });
};

const back = () => {
  emit("prev");
};

const next = () => {
  emit("next");
};

const reload = () => {
  emit("reload");
};

const notesInput = ref(null);
</script>
