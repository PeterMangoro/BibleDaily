
<template>
  <bible-modal :show="showBible" @close="close">
    <template #title> Note Writting </template>

    <template #content>
      <form-card>
        <form @submit.prevent="submit">
          <div class="col-span-6 sm:col-span-4">
            <input-label for="verses" value="Bible Verses Read" />
            <text-input
              id="verses"
              ref="versesInput"
              v-model="verses"
              type="text"
              class="block w-full mt-1"
              autocomplete="verses"
              required
            />
          </div>

          <div class="col-span-6 sm:col-span-4">
            <div class="flex flex-wrap justify-evenly">
              <!-- book -->
              <div class="col-span-6 sm:col-span-4">
                <input-label for="book" value="Book" />
                <select
                  id="book"
                  v-model="book"
                  ref="versesInput"
                  type="text"
                  class="border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  autocomplete="book"
                  required
                >
                  <optgroup
                    v-for="(book, testaments) in books"
                    :key="testaments"
                    :label="testaments"
                  >
                    <option
                      v-for="scripture in book"
                      :key="scripture.title"
                      :value="scripture.title"
                      @click="selectedBookChapters(scripture)"
                    >
                      {{ scripture.title }}
                    </option>
                  </optgroup>
                </select>
              </div>
              <!-- chapter -->
              <div class="col-span-6 sm:col-span-4">
                <input-label for="chapter" value="Chapter" />
                <text-input
                  id="chapter"
                  ref="chapterInput"
                  v-model="chapter"
                  type="number"
                  :max="maximum"
                  class="block w-full mt-1"
                  autocomplete="chapter"
                  required
                />
              </div>
            </div>
          </div>

          <div class="col-span-6 sm:col-span-4">
            <div
              v-for="verse in bible.verses"
              :key="verse.verse"
              class="flex gap-2 py-2 border-b"
            >
              <p class="text-xs">{{ verse.verse }}</p>
              <p>{{ verse.text }}</p>
            </div>
          </div>
        </form>
      </form-card>
    </template>

    <template #footer>
      <JetSecondaryButton @click="$emit('close')"> Cancel </JetSecondaryButton>

      <JetSuccessButton class="ml-3" @click="[checkIn(room), $emit('close')]">
        Check-In
      </JetSuccessButton>
    </template>
  </bible-modal>
</template>
<script setup>
import Modal from "@/Components/Modal.vue";
import BibleModal from "@/Components/Bible/BibleModal.vue";
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

let title = useStorage("title", null);
let verses = useStorage("verses", null);

const props = defineProps({
  books: Object,
  bible: Object,
  show: {
    type: Boolean,
    default: false,
  },
  maxWidth: {
    type: String,
    default: "2xl",
  },
  closeable: {
    type: Boolean,
    default: true,
  },
});

const emit = defineEmits(["next", "prev", "close"]);

const addBibleVerse = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};
const detailInput = ref(null);
const versesInput = ref(null);

const showBible = ref(true);

const close = () => {
  emit("close");
};
</script>
