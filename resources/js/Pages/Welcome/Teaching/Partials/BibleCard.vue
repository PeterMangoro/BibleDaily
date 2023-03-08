<template>
  <div class="p-4 mx-auto bg-white rounded shadow-xl sm:w-5/6">
    <div class="flex flex-wrap p-2 justify-evenly">
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
<script setup>
import TextInput from "@/Components/Shared/Form/TextInput.vue";
const props = defineProps({
  books: Object,
  bible: Object,
});
</script>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  data() {
    return {
      // page.props.book will come from the backend after book has returned.
      book: this.$inertia.page.props.data.filters.book || "Psalms",
      chapter:  1,
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
        this.currentUrl = window.location.href,
        { book: this.book, chapter: 1 },
        { preserveState: true, replace: true, preserveScroll: true }
      );
    }, 200),
    chapterMethod: _.debounce(function () {
      this.$inertia.get(
        this.currentUrl = window.location.href,
        { book: this.book, chapter: this.chapter },
        { preserveState: true, replace: true }
      );
    }, 500),
  },
});
</script>