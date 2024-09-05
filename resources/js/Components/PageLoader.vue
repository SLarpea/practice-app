<script setup>
defineProps({
    loading: Boolean
});
</script>
<template>
  <div
    class="preloader flex-column justify-content-center align-items-center"
    v-if="loading"
  >
    <div class="load">
      <hr />
      <hr />
      <hr />
      <hr />
    </div>
    <span class="mt-32 text-lg font-weight-normal text-white">Loading</span>
  </div>
</template>