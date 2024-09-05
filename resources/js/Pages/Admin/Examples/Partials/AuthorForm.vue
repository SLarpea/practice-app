<script setup>
import CustomModal from "@/Components/CustomModal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { inject } from "vue";
import { toast } from "vue3-toastify";

const props = defineProps({
  show: Boolean,
  duration: {
    type: Number,
    default: 450,
  },
  size: {
    type: String,
    default: "md",
  },
  author: {
    type: Object,
    default: {
      name: "",
      email: "",
    },
  },
});

const swal = inject("$swal");
const global = inject('globalVar');
const emit = defineEmits(["closeModal"]);
const form = useForm(props.author);

const handleCloseModal = () => {
  emit("closeModal");
};

const submit = () => {
  console.log("clicked!");
  swal({
    text: "You sure?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#03AED2",
    cancelButtonText: "Cancel",
    confirmButtonText: "Confirm",
  }).then((result) => {
    if (result.isConfirmed) {
      global.isLoading = true;
      setTimeout(() => {
        global.isLoading = false;
        toast.error("Error Notification !");
      }, 1500);
    }
  });
};

</script>
<template>
  <CustomModal :show="show" :size="size" :duration="duration" @close-modal="handleCloseModal">
    <template #title><h5 class="modal-title">Modal title</h5></template>
    <template #content>
      <form @submit.prevent="submit">
        <div class="modal-body">
          <div class="form-group row">
            <InputLabel
              for="name"
              value="Name"
              class="col-sm-2 col-form-label"
            />
            <div class="col-sm-10">
              <TextInput
                id="name"
                type="text"
                class="form-control mt-1 block w-full"
                autofocus
                autocomplete="username"
              />
            </div>
          </div>
          <div class="form-group row">
            <InputLabel
              for="email"
              value="Email"
              class="col-sm-2 col-form-label"
            />
            <div class="col-sm-10">
              <TextInput
                id="email"
                type="email"
                class="form-control mt-1 block w-full"
                autofocus
                autocomplete="username"
              />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <SecondaryButton @click="handleCloseModal"> Cancel </SecondaryButton>
          <PrimaryButton class="ms-3"> Submit </PrimaryButton>
        </div>
      </form>
    </template>
  </CustomModal>
</template>