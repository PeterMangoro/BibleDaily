
<template>
  <form-section @submitted="addBibleVerse">
    <template #title> Study Details </template>

    <template #description> Record Today's Bible Teaching Study. </template>

    <template #form>
      
      <div class="col-span-6 sm:col-span-4">
        <input-label for="title" value="Teaching Title" />
        <text-input
          id="title"
          ref="titleInput"
          v-model="title"
          type="text"
          class="block w-full mt-1"
          autocomplete="title"
          required
        />
      </div>
      
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
              class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
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
    </template>

    <template #actions>
      <action-message :on="recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <div>
        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Add Notes
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

let title = useStorage("title", null);
let verses = useStorage("verses", null);

const props = defineProps({
  books: Object,
  bible: Object,
});

const emit = defineEmits(["next", "prev"]);

const addBibleVerse = () => {
  emit("next");
};

const back = () => {
  emit("prev");
};
const detailInput = ref(null);
const versesInput = ref(null);
const maximum = ref(null);

function selectedBookChapters(books) {
  maximum.value = books;
  return books.chapters;
}
</script>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  data() {
    return {
      // page.props.book will come from the backend after book has returned.
      book: this.$inertia.page.props.data.filters.book || "Psalms",
      chapter: this.$inertia.page.props.data.filters.chapter || 1,
    };
  },

  watch: {
    book() {
      // if you type something in the book input
      this.bookMethod();
    },
    chapter() {
      // if you type something in the chapter input
      this.chapterMethod();
    },
  },

  methods: {
    bookMethod: _.debounce(function () {
      this.$inertia.get(
        route("users.teachings.create"),
        { book: this.book, chapter: this.chapter },
        { preserveState: true, replace: true, preserveScroll: true }
      );
    }, 200),
    chapterMethod: _.debounce(function () {
      this.$inertia.get(
        route("users.teachings.create"),
        { book: this.book, chapter: this.chapter },
        { preserveState: true, replace: true }
      );
    }, 500),
  },
});
</script>