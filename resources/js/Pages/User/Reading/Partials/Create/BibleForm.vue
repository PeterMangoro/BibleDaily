
<template>
  <form-section @submitted="addBibleVerse">
    <template #title> Study Details </template>

    <template #description> Scripture Read Recently. </template>

    <template #form>
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

let verses = useStorage("verses", null);
</script>
