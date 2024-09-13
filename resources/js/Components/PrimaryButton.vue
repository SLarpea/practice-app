<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    isDisabled: {
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <button :type="type" :disabled="isDisabled" class="text-sm text-white cursor-pointer bg-cyan-500 hover:bg-cyan-600 rounded-sm py-2 px-3">
        <template v-if="isDisabled">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span class="sr-only">Loading...</span>
        </template>
        <template v-else>
            <slot />
        </template>
    </button>
</template>
<!-- inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 -->
