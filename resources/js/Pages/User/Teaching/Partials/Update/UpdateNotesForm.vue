
<template >
 
  <form-section @submitted="updateNotes">
    <template #title> Sermon Details </template>

    <template #description>
      Give brief notes of what the Scripture  teaches.
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
        <input-label for="title" value="Sermon Title" />
        <text-input
          id="title"
          ref="versesInput"
          v-model="form.title"
          type="text"
          class="block w-full mt-1 "
          autocomplete="title"
          required
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="verses" value="Bible Verses Read" />
        <text-input
          id="verses"
          ref="versesInput"
          v-model="form.read"
          type="text"
          class="block w-full mt-1 "
          autocomplete="verses"
          required
        />
      </div>

      <div>
        <span
          class="
            px-5
            py-1
            my-auto
            bg-green-300
            border border-green-700
            rounded-full 
            cursor-pointer
            w-full
          "
          @click="clicked"
        >
          Bible
        </span>
      </div>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="notes" :value="addPoint('hie')" />
        <text-area
          id="notes"
          ref="notesInput"
          v-model="form.notes"
          type="text"
          class="block w-full mt-1"
          autocomplete="notes"
          rows="5"
          required
          @keyup.enter="addPoint(notes)"
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="notes" value="Prayer Points" />
        <text-area
          id="prayer_points"
          ref="prayer_pointsInput"
          v-model="form.prayer_points"
          type="text"
          class="block w-full mt-1"
          autocomplete="prayer_points"
          rows="5"
          required
        />
      </div>
    </template>

    <template #actions>
      <action-message :on="form.wasSuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button
        :class="{ 'opacity-25': processing }"
        :disabled="processing"
      >
        Update
      </submit-button>
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
import { pointConverter } from "@/Composables/pointConverter";

const props = defineProps({
  teaching: Object,
});

const form = useForm({
  title: props.teaching.title,
  read: props.teaching.verses,
  notes: pointConverter(props.teaching.notes),
  prayer_points: pointConverter(props.teaching.prayer_points),
  remember: true,
});
const notesInput = ref(null);

const new_point = ref(null);

function addPoint(user_input) {
  new_point.value = user_input.concat("- ");

  console.log(user_input.concat("- "));
}
const emit = defineEmits(["bible"]);

const clicked = () => {
  emit("bible");
};

const updateNotes = () => {
  form.put(route("users.teachings.update", props.teaching.uuid), {
    errorBag: "updateTeachingDetail",
    preserveScroll: true,
    onSuccess: () => {
      localStorage.removeItem("notes");
      localStorage.removeItem("verses");
      localStorage.removeItem("prayer_points");
    },
   
  });
};
</script>
