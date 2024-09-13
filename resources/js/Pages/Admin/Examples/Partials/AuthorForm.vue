<script setup>
import { useForm } from "@inertiajs/vue3";
import { computed, inject } from "vue";
import { toast } from "vue3-toastify";
import { SWALOPTIONS } from "@/Plugins/swal";
import CustomModal from "@/Components/CustomModal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

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
  method: {
    type: String,
    default: 'add'
  }
});

const swal = inject("$swal");
const global = inject('globalVar');
const emit = defineEmits(["closeModal"]);
const form = useForm({ ...props.author });
const formTitle = computed(() => (props.method == 'add') ? "Add Author" : "Edit Author");
const formURL = computed(() => (props.method == 'add') ? "authors.store" : "authors.update");

const handleCloseModal = () => {
  emit("closeModal");
};

const submit = () => {
  swal({
    ...SWALOPTIONS,
    text: "You sure?"
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit('post', route(formURL.value), {
        onStart: () => global.isLoading = true,
        onSuccess: () => {
          global.isLoading = false,
          toast.success("Success !")
        },
        onError: () => {
          global.isLoading = false,
          toast.error("Something Went Wrong !")
        }
      });
    }
  });
};

</script>
<template>
  <CustomModal :show="show" :size="size" :duration="duration" @close-modal="handleCloseModal">
    <template #title><h5 class="modal-title">{{ formTitle }}</h5></template>
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
                v-model="form.name"
                id="name"
                type="text"
                class="form-control mt-1 block w-full"
                autofocus
                autocomplete="username"
              />
            </div>
          </div>
          <InputError class="mt-2" :message="form.errors.name" />
          <div class="form-group row">
            <InputLabel
              for="email"
              value="Email"
              class="col-sm-2 col-form-label"
            />
            <div class="col-sm-10">
              <TextInput
                v-model="form.email"
                id="email"
                type="email"
                class="form-control mt-1 block w-full"
                autofocus
                autocomplete="username"
              />
            </div>
          </div>
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div class="modal-footer">
          <SecondaryButton @click="handleCloseModal"> Cancel </SecondaryButton>
          <PrimaryButton class="ms-3" :is-disabled="form.processing"> Submit </PrimaryButton>
        </div>
      </form>
    </template>
  </CustomModal>
</template>