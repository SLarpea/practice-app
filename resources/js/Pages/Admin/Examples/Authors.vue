<script setup>
import { ref, toRefs, watch, reactive, onMounted, onBeforeMount } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";
import { inject } from 'vue';
import { toast } from 'vue3-toastify';
import NewLayout from "@/Layouts/NewLayout.vue";
import Pagination from "@/Components/Pagination.vue";

const swal = inject('$swal');

const props = defineProps({
  authors: Object,
});

const { authors } = toRefs(props);

let initialQueryState = {
  per_page: 15,
  // sort: "first_name",
};
const isLoading = ref(false);
const search = ref("");
const queryParams = reactive({ ...initialQueryState });

// watchers
watch(
  queryParams,
  (newVal, oldVal) => {
    router.get("/authors", newVal, {
      preserveState: true, // preserveState: (page) => page.props.someProp === 'value'
      replace: true,
      onStart: (visit) => {
        isLoading.value = true;
      },
      onFinish: (visit) => {
        setTimeout(() => {
          isLoading.value = false;
        }, 500);
      },
    });
  },
  { immediate: true, deep: true }
);

watch(
  search,
  debounce((val) => {
    if (val !== "") {
      initialQueryState = { ...initialQueryState, ["search"]: val };
      Object.assign(queryParams, initialQueryState);
    } else {
      delete queryParams["search"];
    }
  }, 1000)
);

const submit = () => {
  swal({
    text: "You sure?",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#03AED2",
    cancelButtonText: 'Cancel',
    confirmButtonText: 'Confirm',
  }).then((result) => {
    toast.error("Error Notification !");
    // if (result.isConfirmed) {
    //   router.post(route("logout"));
    // }
  });
};

</script>
<template>
  <NewLayout title="Authors" module="Examples" :loading="isLoading">
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
            data-toggle="modal"
            data-target="#exampleModalCenter"
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
              <input
                type="text"
                class="form-control max-w-lg"
                v-model="search"
              />
              <div class="input-group-append">
                <span class="input-group-text"
                  ><i class="fa-solid fa-magnifying-glass"></i
                ></span>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-7 col-xl-8">
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
                  <option value="15" selected>15</option>
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
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" @click="submit" style="background-color: #03aed2; color: #f5f5f5; border: 1px solid #03aed2;">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </NewLayout>
</template>