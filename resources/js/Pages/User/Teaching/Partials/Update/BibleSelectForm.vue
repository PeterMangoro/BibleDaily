
<template>
  <form-section @submitted="addBibleVerse">
    <template #title> Study Details </template>

    <template #description> Record Today's Bible Teaching Study. </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="verses" value="Bible Verses Read" />
        <text-input
          id="verses"
          ref="versesInput"
          v-model="form.verse"
          type="text"
          class="block w-full mt-1 cursor-alias"
          autocomplete="verses"
          disabled
        />
      </div>

      <div>
        <button
          class="
            px-5
            py-1
            my-auto
            bg-green-300
            border border-green-700
            rounded-full
          "
          @click="clicked"
        >
          Read Bible
        </button>
      </div>
    </template>
  </form-section>
</template>
<script setup>
import { ref } from "vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";

const props = defineProps({
  books: Object,
  bible: Object,
  verse: String,
});

const emit = defineEmits(["bible"]);

const clicked = () => {
  emit("bible");
};
const detailInput = ref(null);
const versesInput = ref(null);
</script>
  components: { BibleCard },