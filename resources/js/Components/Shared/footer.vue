<template>
  <footer class="p-4  sm:p-6 bg-slate-300 bg-opacity-50 mt-5">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0"></div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
        <div>
          <h2
            class="
              mb-6
              text-sm
              font-semibold
              text-black
              uppercase
              underline
            "
          >
            Auth
          </h2>
          <ul class="text-black ">
            <li class="mb-4">
              <Link :href="route('login')" class="hover:underline"
                >Login</Link
              >
            </li>
            <li class="mb-4">
              <Link :href="route('register')" class="hover:underline"
                >Register
              </Link>
            </li>
            
          </ul>
        </div>
        
        <div>
          <h2
            class="
              mb-6
              text-sm
              font-semibold
              text-black
              uppercase
              underline
              
            "
          >
            Uploading & Sharing
          </h2>
          <ul class="text-black ">
            <li class="mb-4">
              <Link :href="route('users.teachings.create')" class="hover:underline ">Upload a Sermon</Link>
            </li>
            <li class="mb-4">
              <Link :href="route('users.readings.create')" class="hover:underline">Upload Personal Reading</Link>
            </li>
          </ul>
        </div>

        <div>
          <h2
            class="
              mb-6
              text-sm
              font-semibold
              text-black
              uppercase
              underline
              
            "
          >
            Bible Study
          </h2>
          <ul class="text-black ">
            <li class="mb-4">
              <Link :href="route('teachings.index')" class="hover:underline "> Shared Sermons</Link>
            </li>
            <li class="mb-4">
              <Link :href="route('users.readings.index')" class="hover:underline"> Personal Readings</Link>
            </li>
            <li class="mb-4">
              <Link :href="route('users.teachings.index')" class="hover:underline"> Personal Teachings</Link>
            </li>
          </ul>
        </div>
        
      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-black sm:text-center "
        >© 2023
        <Link :href="route('teachings.index')" class="hover:underline">Bible-Daily</Link>.
        All Rights Reserved.
      </span>
      <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
        <!-- <Link
          href="route('about')"
          class="text-black hover:text-black "
        >
          About
        </Link> -->
      </div>
    </div>
  </footer>
</template>
<script setup>

import { defineProps } from "vue";

defineProps({
  links: Array,
});
</script>