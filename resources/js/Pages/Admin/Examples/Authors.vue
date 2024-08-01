<script setup>
import { ref, toRefs, watch, onMounted, onBeforeMount } from "vue";
import { router } from "@inertiajs/vue3";
import NewLayout from "@/Layouts/NewLayout.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
  authors: Object,
});

const { authors } = toRefs(props);
const loading = ref(false);

onBeforeMount(() => {
  loading.value = true;
});

onMounted(() => {
  setTimeout(() => {
    loading.value = false;
  }, 1000);
});

</script>
<template>
  <NewLayout title="Authors" module="Examples" :loading="loading">
    <div class="card">
      <div class="card-table-header">
        <span class="card-table-title float-left">
          <i class="fa-solid fa-list-ol"></i>
          List of Authors
        </span>
        <div class="card-table-buttons float-right">
          <button
            type="button"
            class="btn btn-xs"
            style="background-color: #03aed2; color: #f5f5f5"
          >
            Small button
          </button>
          <button
            type="button"
            class="btn btn-xs"
            style="background-color: #006989; color: #f5f5f5"
          >
            Small button
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 col-md-7 col-lg-5 col-xl-4">
            <div class="input-group input-group-sm mb-3">
              <input type="text" class="form-control max-w-lg" />
              <div class="input-group-append">
                <span class="input-group-text"
                  ><i class="fa-solid fa-magnifying-glass"></i
                ></span>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-7 col-xl-8">
            <div class="float-right">
              <div class="show-sort-container">
                sort
                <select class="show-items">
                  <option value="Name">FullName</option>
                  <option value="Email Address">Famous Book</option>
                  <option value="1">Published Books</option>
                </select>
              </div>
              <div class="show-items-container">
                per page
                <select class="show-items">
                  <option value="15">15</option>
                  <option value="20">20</option>
                  <option value="20">25</option>
                  <option value="30">30</option>
                  <option value="30">35</option>
                  <option value="40">40</option>
                  <option value="40">45</option>
                  <option value="50">50</option>
                  <option value="50">55</option>
                  <option value="60">60</option>
                  <option value="60">65</option>
                  <option value="70">70</option>
                  <option value="70">75</option>
                  <option value="80">80</option>
                  <option value="80">85</option>
                  <option value="90">90</option>
                  <option value="90">95</option>
                  <option value="100">100</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <table
          class="table table-sm table-hover table-striped table-responsive"
        >
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, i) in authors.data" :key="i">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <Pagination :data="authors" />
      </div>
    </div>
  </NewLayout>
</template>