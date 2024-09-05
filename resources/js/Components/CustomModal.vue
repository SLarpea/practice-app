<script setup>
import { computed } from "vue";

const props = defineProps({
  show: Boolean,
  duration: {
    type: Number,
    default: 50,
  },
  size: {
    type: String,
    default: "md",
  },
});

const emit = defineEmits(["closeModal"]);

const modalSize = computed(() => {
  return {
    sm: "modal-sm",
    md: "modal-md",
    lg: "modal-lg",
  }[props.size];
});

const closeModal = () => {
  emit("closeModal");
};
</script>
<template>
  <Transition :duration="duration" name="modal-fade">
    <div v-if="show" class="modal custom-modal">
      <div class="modal-dialog" :class="modalSize">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title">Modal title</h5> -->
            <slot name="title" />
            <button
              type="button"
              class="close"
              @click="closeModal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <slot name="content" />
        </div>
      </div>
    </div>
  </Transition>
</template>