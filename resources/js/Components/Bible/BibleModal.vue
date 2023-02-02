<script setup>
import Modal from "@/Components/Modal.vue";

const emit = defineEmits(["close"]);

defineProps({
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

const close = () => {
  emit("close");
};
</script>

<template>
  <Modal
    :show="show"
    :max-width="maxWidth"
    :closeable="closeable"
    @close="close"
  >
    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
      <div class="sm:flex sm:items-start">
        <div
          class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-full shrink-0 sm:mx-0 sm:h-10 sm:w-10"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="text-green-500 w-7 h-7"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
            />
          </svg>
        </div>

        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg">
            <slot name="title" />
          </h3>

          <div class="mt-2">
            <slot name="content" />
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 text-right bg-gray-100">
      <slot name="footer" />
    </div>
  </Modal>
</template>
