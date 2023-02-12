<template>
  <div>
    <div v-for="user in data" :key="user.id" class="border-b-2">
      name: {{ user.name }} <br />
      username: {{ user.username }} <br />
      password: {{ user.password }}

      <div
        class="m-2"
        v-for="bibleSession in user.bible_sessions"
        :key="bibleSession.id"
      >
        bibleSessionId:{{ bibleSession.id }}<br />
        bibleSessionUUId:{{ bibleSession.uuid }}<br />
        reading_uuid: {{ bibleSession.reading.uuid }}<br />
        reading_verse: {{ bibleSession.reading.verse }}<br />
        reading_notes: {{ bibleSession.reading.notes }}<br />
        reading_prayer_points: {{ bibleSession.reading.prayer_points }}<br />
        
        <span v-if="bibleSession.teaching">
            teaching_title: {{ bibleSession.teaching.title }}<br />
        teaching_slug: {{ bibleSession.teaching.slug }}<br />
        ----------- <br>
        </span>
        
        <!-- <div v-for="reading in bibleSession.reading" :key="reading" class="m-2 border-b-2"> 
      reading:   {{ reading }}
        </div> -->

        <!-- <div v-for="teaching in bibleSession.teaching" :key="teaching" class="m-2"> 
      teaching:   {{ teaching }}
        </div> -->
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  data: Object,
});
</script>