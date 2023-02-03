
<template >
  <form-section @submitted="updateNotes">
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
  reading: Object,
 
});

const notes = useStorage("notes", pointConverter(props.reading.notes));

let prayer_points = useStorage(
  "prayer_points",
  pointConverter(props.reading.prayer_points)
);


const form = useForm({ 
  read:props.reading.read_verses,
  notes: pointConverter(props.reading.notes),  
  prayer_points: pointConverter(props.reading.prayer_points),  
  remember: true,
});
const notesInput = ref(null);

const new_point = ref(null)

function addPoint(user_input) {
  new_point.value = user_input.concat('- ')
  
  console.log(user_input.concat('- '))

}

const updateNotes = () => {
 form.put(route("users.readings.update", props.reading.uuid), {
    errorBag: "updateReadingDetail",
    preserveScroll: true,
    onSuccess: () => {     
      localStorage.removeItem("notes");
      localStorage.removeItem("verses");
      localStorage.removeItem("prayer_points");
     
    },
  });
};
</script>
