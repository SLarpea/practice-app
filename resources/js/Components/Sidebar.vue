<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

defineProps({
  title: String,
});
</script>
<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img
        src="/dist/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">Practice APP</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <a
              :href="route('dashboard')"
              class="nav-link"
              :class="{ active: title == 'Dashboard' }"
            >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a
              href="#"
              class="nav-link"
              :class="{ active: title == 'Widgets' }"
            >
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a
              href="#"
              class="nav-link"
              :class="{ active: title == 'Calendar' }"
            >
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge right" style="background-color: #8b5cf6"
                  >2</span
                >
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a
              :href="route('authors.index')"
              class="nav-link"
              :class="{ active: title == 'Authors' }"
            >
              <i class="nav-icon fa-solid fa-user-pen"></i>
              <p>Authors</p>
            </a>
          </li>
          <li class="nav-item">
            <a
              href="#"
              class="nav-link"
              :class="{ active: title == 'Kanban Board' }"
            >
              <i class="nav-icon fas fa-columns"></i>
              <p>Kanban Board</p>
            </a>
          </li>
          <li class="nav-item">
            <a
              href="#"
              class="nav-link"
              :class="{ active: title == 'Mailbox' }"
            >
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                  href="#"
                  class="nav-link"
                  :class="{ active: title == 'Inbox' }"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="#"
                  class="nav-link"
                  :class="{ active: title == 'Compose' }"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="#"
                  class="nav-link"
                  :class="{ active: title == 'Read' }"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" :class="{ active: title == 'Pages' }">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                  href="#"
                  class="nav-link"
                  :class="{ active: title == 'Invoice' }"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="#"
                  class="nav-link"
                  :class="{ active: title == 'Profile' }"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
</template>