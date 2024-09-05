<script setup>
import { reactive, ref, watch } from "vue";
import { debounce } from "lodash";

defineProps({
  placeholder: {
    type: String,
    default: "Search...",
  },
});

const emit = defineEmits(["updateQueryParams"]);

let initialQueryState = {
  per_page: 15,
  // sort: "first_name",
};
const search = ref("");
const queryParams = reactive({ ...initialQueryState });

// watchers
watch(
  queryParams,
  (newVal, oldVal) => {
    Object.assign(queryParams, newVal);
    emit("updateQueryParams", queryParams);
  },
  { immediate: true, deep: true }
);

watch(
  search,
  debounce((val) => {
    if (val !== "") {
      initialQueryState = { ...queryParams, ["search"]: val };
      Object.assign(queryParams, initialQueryState);
      emit("updateQueryParams", queryParams);
    } else {
      delete queryParams["search"];
      emit("updateQueryParams", queryParams);
    }
  }, 1000)
);
</script>
<template>
  <div class="row no-gutters mb-3">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4 d-flex h-8 mt-1">
      <div class="search-wrapper text-sm w-[calc(100%_-_2.5rem)]">
        <input
          type="text"
          :placeholder="placeholder"
          v-model="search"
          class="search-input text-sm"
        />
      </div>
      <div class="search-button text-white text-center text-sm py-1.5 w-10">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
    <div class="col-12 col-sm-4 col-md-6 col-lg-8 h-8 mt-1">
      <div class="float-right">
        <!-- <div class="show-sort-container">
          sort
          <select class="show-items" v-model="queryParams.sort">
            <option value="first_name" selected>First Name</option>
            <option value="last_name">Last Name</option>
            <option value="email">Email</option>
          </select>
        </div> -->
        <div class="show-items-container">
          per page
          <select class="show-items" v-model="queryParams.per_page">
            <option :value="15" selected>15</option>
            <option :value="20">20</option>
            <option :value="25">25</option>
            <option :value="30">30</option>
            <option :value="35">35</option>
            <option :value="40">40</option>
            <option :value="45">45</option>
            <option :value="50">50</option>
            <option :value="55">55</option>
            <option :value="60">60</option>
            <option :value="65">65</option>
            <option :value="70">70</option>
            <option :value="75">75</option>
            <option :value="80">80</option>
            <option :value="85">85</option>
            <option :value="90">90</option>
            <option :value="95">95</option>
            <option :value="100">100</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>