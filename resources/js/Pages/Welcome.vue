<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    John:Object
});
</script>

<template>
    <Head title="Welcome" />

  <div>
   {{John}}
  </div>
</template>
