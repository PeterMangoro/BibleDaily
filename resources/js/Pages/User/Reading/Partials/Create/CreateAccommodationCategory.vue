<template>
  <JetFormSection @submitted="updateCompanyProfileCategory">
    <template #title> Property Category </template>

    <template #description>
      Select the desired Action for your Property.
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <button
          v-for="(family, i) in availableFamilies"
          :key="family.id"
          type="button"
          class="flex w-full px-4 py-3 rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
          :class="{
            'border-t border-gray-200 rounded-t-none': i > 0,
            'rounded-b-none': i !== Object.keys(availableFamilies).length - 1,
          }"
          @click="selected_family = family.value"
        >
          <div
            :class="{
              '': selected_family && selected_family !== family.title,
            }"
          >
            <!-- Category Name -->
            <div class="flex items-start">
              <div
                class="font-medium text-gray-600"
                :class="{
                  'font-semibold': selected_family === family.title,
                }"
              >
                {{ family.title }}
              </div>

              <svg
                v-if="selected_family === family.value"
                class="w-5 h-5 ml-2 text-green-400"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>

            <!-- Category Description -->
            <div class="items-start mt-2 text-sm text-gray-600">
              {{ family.detail }}

              <p>
                {{ family.details }}
              </p>
            </div>
          </div>
        </button>
        <!-- <InputError class="mt-2" :message="errors.street" /> -->
      </div>

      <div v-if="selected_family === 'lodge'" class="col-span-6 sm:col-span-6">
        <InputLabel for="category" value="Select Accommodation Categories" />
        <div class="flex flex-wrap justify-evenly">
          <span v-for="(category_type, type) in category_types" :key="type">
            <h1
              class="py-1 text-sm capitalize hover:font-semibold hover:cursor-pointer"
            >
              {{ type }}
            </h1>

            <span>
              <select name="category" v-model="category" id="category">
                <option
                  v-for="category in category_type"
                  :key="category.id"
                  :value="category.id"
                >
                  {{ category.title }}
                </option>
              </select>
            </span>
          </span>
        </div>
        <!-- <InputError class="mt-2" :message="form.errors.category" /> -->
      </div>
    </template>

    <template #actions>
      <JetActionMessage :on="recentlySuccessful" class="mr-3">
        Saved.
      </JetActionMessage>

      <div class="flex justify-between w-full">
        <div>
          <button
            @click="back"
            class="gap-2 p-1 px-4 text-black rounded bg-slate-300 hover:bg-gray-400"
          >
            Back
          </button>
        </div>

        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Save
        </submit-button>
      </div>
    </template>
  </JetFormSection>
</template>
<script setup>
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import JetButton from "@/Components/PrimaryButton.vue";
import JetFormSection from "@/Components/FormSection.vue";
import JetInput from "@/Components/TextInput.vue";
import JetInputError from "@/Components/InputError.vue";
import JetLabel from "@/Components/InputLabel.vue";
import JetActionMessage from "@/Components/ActionMessage.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import CheckBoxGroup from "@/Components/Shared/Checkbox/check-box-group.vue";
import { useStorage } from "@/Composables/useStorage";

let selected_family = useStorage("family", null);
let category = useStorage("category", 1);

const emit = defineEmits(["next", "prev"]);

const updateCompanyProfileCategory = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};

const props = defineProps({
  category_types: Object,
});

const availableFamilies = [
  {
    title: "For Sale",
    value: "sale",
    detail: "Property will be displayed for Selling purposes",
  },
  {
    title: "For Rent",
    value: "rental",
    detail: "Property will be displayed for Rental purposes",
  },
  {
    title: "Lodging",
    value: "lodge",
    detail: "Property will be displayed for Lodging purposes. ",
    details: "For Hotels,Motels,Guest Houses,Lodges etc",
  },
];
</script>
