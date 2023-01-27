
<template>
  <form-section @submitted="createAccommodationDetail">
    <template #title> Property Details </template>

    <template #description> Tell us a bit more about your property. </template>

    <template #form>
      <div v-if="family === 'lodge'" class="col-span-6 sm:col-span-4">
        <input-label for="property_name" value="Property Name" />
        <text-input
          id="property_name"
          ref="accommodationInput"
          v-model="property_name"
          type="text"
          class="block w-full mt-1"
          autocomplete="property_name"
          required
        />
        <!-- <input-error :message="errors.property_name" class="mt-2" /> -->
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="a_rooms" value="Rooms / Apartments" />
        <text-input
          id="a_rooms"
          ref="accommodationInput"
          v-model="a_rooms"
          type="number"
          min="1"
          class="block w-full mt-1"
          autocomplete="a_rooms"
          required
        />
        <!-- <input-error :message="errors.a_rooms" class="mt-2" /> -->
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="price" value="Lowest Price" />
        <text-input
          id="price"
          ref="accommodationInput"
          v-model="price"
          type="number"
          min="0"
          step="0.01"
          class="block w-full mt-1"
          autocomplete="price"
          required
        />
        <!-- <input-error :message="errors.a_rooms" class="mt-2" /> -->
      </div>
    </template>

    <template #actions>
      <action-message :on="recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <div class="flex justify-between w-full">
        <div>
          <div
            @click="back"
            class="
              gap-2
              p-1
              px-4
              text-black
              rounded
              bg-slate-300
              hover:bg-gray-400
            "
          >
            Back
          </div>
        </div>

        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Save
        </submit-button>
      </div>
    </template>
  </form-section>
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
import { useStorage } from "@/Composables/useStorage";

let property_name = useStorage("property_name", null);

let a_rooms = useStorage("a_rooms", null);
let family = useStorage("family", null);
let price = useStorage("price", null);

const emit = defineEmits(["next", "prev"]);

const createAccommodationDetail = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};
const detailInput = ref(null);
const accommodationInput = ref(null);

// function saleStatus() {
//   if (active_status == true) {
//     return "Currently Active";
//   } else return "Currently Inactive";
// }
</script>
