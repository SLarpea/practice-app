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
  </div>
</template>