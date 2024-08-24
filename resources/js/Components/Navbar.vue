<script setup>
import { router, usePage } from "@inertiajs/vue3";
import { inject, ref } from "vue";
import PageLoader from "./PageLoader.vue";

const swal = inject("$swal");
const page = usePage();

const isLoading = ref(false);

const logout = () => {
  swal({
    text: "You want to logout?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#03AED2",
    cancelButtonText: "Cancel",
    confirmButtonText: "Confirm",
  }).then((result) => {
    if (result.isConfirmed) {
      router.post(route("logout"));
    }
  });
};

const setLocale = (locale) => {
  if (page.props.locale == locale) return false;
  router.post(route('change.locale'), { locale: locale }, {
    onStart: visit => {
      isLoading.value = true;
    },
    onSuccess: page => {
      isLoading.value = false;
    },
    onFinish: visit => {
      location.reload();
    },
    onError: errors => {
      console.log(error);
    },
  });
};
</script>
<template>
  <PageLoader :loading="isLoading" />
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"
          ><i class="fas fa-bars"></i
        ></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img
                src="/dist/img/user1-128x128.jpg"
                alt="User Avatar"
                class="img-size-50 mr-3 img-circle"
              />
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"
                    ><i class="fas fa-star"></i
                  ></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted">
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img
                src="/dist/img/user8-128x128.jpg"
                alt="User Avatar"
                class="img-size-50 img-circle mr-3"
              />
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"
                    ><i class="fas fa-star"></i
                  ></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted">
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img
                src="/dist/img/user3-128x128.jpg"
                alt="User Avatar"
                class="img-size-50 img-circle mr-3"
              />
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"
                    ><i class="fas fa-star"></i
                  ></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted">
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a
          class="nav-link d-flex gap-1 align-items-center"
          data-toggle="dropdown"
          href="#"
        >
          {{ ($page.props.locale == 'en') ? 'English' : '中国人' }}
          <i class="fa-solid fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right locale">
          <a href="#" class="dropdown-item" @click="setLocale('en')" :class="{ active: $page.props.locale == 'en' }">
            English
          </a>
          <a href="#" class="dropdown-item" @click="setLocale('zh_CN')" :class="{ active: $page.props.locale == 'zh_CN' }">
            中国人
          </a>
        </div>
      </li>
      <li
        class="nav-item dropdown"
        style="border-left: 1px solid #e5e7eb !important"
      >
        <a
          class="nav-link d-flex gap-1 align-items-center"
          data-toggle="dropdown"
          href="#"
        >
          <span class="float-left text-muted text-sm capitalize"
            >a. sulana</span
          >
          <i class="fa-solid fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right user-options">
          <li>
            <form @submit.prevent="logout">
              <button
                type="submit"
                class="dropdown-item d-flex gap-2 align-items-center py-2 px-4"
              >
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</template>