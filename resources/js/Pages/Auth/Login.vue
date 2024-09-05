<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { inject } from 'vue';
import { toast } from "vue3-toastify";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const global = inject('globalVar');

const submit = () => {
  form
    .transform((data) => ({
      ...data,
      remember: form.remember ? "on" : "",
    }))
    .post(route("login"), {
      onStart: () => global.isLoading = true,
      onSuccess: (page) => {
        let name = page.props.auth.user.name;
        toast(`Welcome Back, <strong>${name}</strong>`, {
          type: "success",
          dangerouslyHTMLString: true,
        })
        global.isLoading = false
      },
      onError: () => global.isLoading = false,
      onFinish: () => form.reset("password"),
    });
};
</script>

<template>
  <Head title="Log in" />

  <AuthenticationCard>
    <div class="container">
      <input type="checkbox" id="flip" />
      <div class="cover">
        <div class="front">
          <img
            src="https://www.feathr.com/wp-content/uploads/9j2N71Xg.jpeg"
            alt=""
          />
          <div class="text">
            <span class="text-1"
              >Every new friend is a <br />
              new adventure</span
            >
            <span class="text-2">Let's get connected</span>
          </div>
        </div>
        <div class="back">
          <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
          <div class="text">
            <span class="text-1"
              >Complete miles of journey <br />
              with one step</span
            >
            <span class="text-2">Let's get started</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Practice App | Login</div>
            <form @submit.prevent="submit">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input
                    type="text"
                    v-model="form.email"
                    placeholder="Enter your email"
                    required
                    autofocus
                    autocomplete="username"
                  />
                </div>
                <InputError class="mt-2" :message="form.errors.email" />
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input
                    type="password"
                    v-model="form.password"
                    placeholder="Enter your password"
                    required
                    autofocus
                    autocomplete="current-password"
                  />
                </div>
                <InputError class="mt-2" :message="form.errors.password" />
                <label class="flex items-center mt-3">
                  <Checkbox v-model:checked="form.remember" name="remember" />
                  <span class="ms-2 text-sm text-gray-600 font-weight-normal"
                    >Remember me</span
                  >
                </label>
                <button
                  type="submit"
                  class="btn btn-primary w-100 p-2.5 capitalize mt-10"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                  style="background-color: #03aed2; border: 1px solid #03aed2"
                >
                  submit
                </button>
                <div class="text sign-up-text">
                  Don't have an account? <label for="flip">Signup now</label>
                </div>
              </div>
            </form>
          </div>
          <div class="signup-form">
            <div class="title">Practice App | Signup</div>
            <form action="#">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Enter your name" required />
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Enter your email" required autocomplete="username" />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input
                    type="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                  />
                </div>
                <div class="button input-box">
                  <input type="submit" value="Submit" />
                </div>
                <div class="text sign-up-text">
                  Already have an account? <label for="flip">Login now</label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <span class="text-sm"
      >Powered by
      <em class="font-weight-bold" style="color: #03aed2">ArSu&#8482;</em></span
    >
  </AuthenticationCard>
</template>