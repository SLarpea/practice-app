<script setup>
defineProps({
    collection: Array
});
</script>
<template>
    <div
        v-if="collection.length == 0"
        class="w-100 text-center bg-neutral-100 text-md py-1 italic capitalize hover:bg-neutral-200"
    >
        <span>No data</span>
    </div>
</template>