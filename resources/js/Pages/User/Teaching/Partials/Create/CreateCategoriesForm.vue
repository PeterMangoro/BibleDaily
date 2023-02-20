
<template>
  <form-section @submitted="createTeaching">
    <template #title> 
      <p class="text-slate-50">

        Category Selection
      </p>
       </template>

    <template #description>
      <p class="text-slate-50">
        Categories are helpful in grouping your teachings according to client
      preferences
      </p>
     
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-6">
        
        <p class="my-1 border-b-4"></p>
        <input-label
          for="categories"
          value="Select  Categories"
          class="mt-2 text-base font-bold capitalize"
        />
      
        <p class="my-1 border-b-2"></p>
        <input-error class="mt-2" :message="form.errors.categories" />
        <span   class="flex flex-wrap justify-between space-y-3">
          <span class="flex gap-2  sm:w-1/5"   v-for="category in categories"
              :key="category.id">
            <check-box-group
            
              :items="[
                {
                  label: category.title,
                  id: category.id,
                },
              ]"
              @on-change="onChange"
            />
          </span>
        </span>
      </div>
      <input-error
        v-if="form.errors.categories"
        class="mt-2 capitalize"
        message="Error Found!! Please check the previous form"
      />
    </template>

    <template #actions>
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
         Save
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
import { useStorage } from "@/Composables/useStorage";

const title = useStorage("title");
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


const emit = defineEmits(["next", "prev"]);

const back = () => {
  emit("prev");
};

const createTeaching = () => {
 
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
</script>
