
<template>
  <form-section @submitted="updateTeachingDetail">
    <template #title> Category Selection </template>

    <template #description>
      Categories are helpful in grouping your teachings according to client
      preferences
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-6">
        <div>
          <h1 class="my-1 text-base font-bold capitalize">
            previously selected categories
          </h1>
          <span class="flex flex-wrap justify-evenly justify-self-start jus">
            <p
              v-for="category in teaching.categories"
              :key="category.id"
              class="flex"
            >
              <check-circle-icon class="w-4 h-4 my-auto fill-green-500" />
              {{ category.title }}
            </p>
          </span>
        </div>
        <p class="my-1 border-b-4"></p>
        <input-label
          for="categories"
          value="Select New Categories"
          class="mt-2 text-base font-bold capitalize"
        />
        <span class="gap-1">
          <p class="text-sm italic text-slate-800">
            <information-circle-icon
              class="float-left w-4 h-4 mr-1"
            />previously selected categories will be replace with new ones, so
            reselect all categories you want
          </p>
        </span>
        <p class="my-1 border-b-2"></p>
        <input-error class="mt-2" :message="form.errors.categories" />
        <span  :key="id" class="flex flex-wrap justify-start gap-2">
        
            <check-box-group
            class="w-auto w"
              v-for="category in categories"
              :key="category.id"
              :items="[
                {
                  label: category.title,
                  id: category.id,
                },
              ]"
              @on-change="onChange"
            />
          
        </span>
      </div>
      <input-error
        v-if="form.errors.categories"
        class="mt-2 capitalize"
        message="Error Found!! Please check the previous form"
      />
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
      </submit-button>
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
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import CheckBoxGroup from "@/Components/Shared/Checkbox/check-box-group.vue";
import {
  ChevronDoubleRightIcon,
  CheckCircleIcon,
} from "@heroicons/vue/24/solid";
import { InformationCircleIcon } from "@heroicons/vue/24/outline";
import { useStorage } from "@/Composables/useStorage";

const title = useStorage("title",null);
const notes = useStorage("notes");
let verses = useStorage("verses");
let prayer_points = useStorage("prayer_points");
let prayer = useStorage("prayer");


const detailInput = ref(null);
const teachingInput = ref(null);
const props = defineProps({
  teaching: Object,
  categories: Object,
});

const form = useForm({
  title: title.value,
  notes: notes.value,
  read: verses.value,
  prayer_points: prayer_points.value,
  prayer: prayer.value || "No Prayer Available", //havent found a way to remove prayer once saved
  categories: [],
  remember: true,
});

const onChange = (val) => {
  console.log(val);
  val[0].checked === true
    ? form.categories.push(val[0].id)
    : form.categories.pop(val[0].id);
};

const updateTeachingDetail = () => {
  form.put(route("users.teachings.update", props.teaching.slug), {
    errorBag: "updateTeachingDetail",
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
</script>
