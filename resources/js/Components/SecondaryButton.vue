<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="text-sm text-gray-500 hover:text-gray-700 cursor-pointer">
        <slot />
    </button>
</template>
