
<template>
  <reading-update-modal
    :show="confirmingUpdateReading"
    @close="confirmingUpdateReading = false"
  >
    <template #title> Editing Your Reading </template>

    <template #content>
      <form-card>
        <form @submit.prevent="submit">
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-5">
              <InputLabel for="notes" value="Notes" />
              <text-area
                id="notes"
                v-model="form.notes"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="notes"
              />
              <InputError class="mt-2" :message="form.errors.notes" />
            </div>

            <div class="col-span-6 sm:col-span-5">
              <InputLabel for="prayer_points" value="Prayer Points" />
              <text-area
                id="prayer_points"
                v-model="form.prayer_points"
                type="text"
                class="block w-full mt-1"
                required
                autofocus
                autocomplete="prayer_points"
              />
              <InputError class="mt-2" :message="form.errors.prayer_points" />
            </div>
          </div>
        </form>
      </form-card>
    </template>

    <template #footer>
      <JetSecondaryButton @click="$emit('close')"> Cancel </JetSecondaryButton>

      <JetSuccessButton
        class="ml-3"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        @click="[updateReading(reading), $emit('close')]"
      >
        Check-In
      </JetSuccessButton>
    </template>
  </reading-update-modal>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import ReadingUpdateModal from "@/Components/Reading/ReadingUpdateModal.vue"

const props = defineProps({
  reading: String,
});
const form = useForm({
  prayer_points: props.reading.prayer_points,
  notes: props.reading.notes,
  remember: true,
  _method: "PUT",
});

const confirmingUpdateReading = ref(true);

const updateReadingDetail = () => {
  form.post(route("users.readings.update", props.Reading.uuid), {
    errorBag: "updateReadingDetail",
    preserveScroll: true,
  });
};
</script>
