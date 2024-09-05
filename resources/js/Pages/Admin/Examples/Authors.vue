<script setup>
import { ref, toRefs, watch, computed, inject } from "vue";
import { router } from "@inertiajs/vue3";
import SearchFilters from "@/Components/SearchFilters.vue";
import NewLayout from "@/Layouts/NewLayout.vue";
import NoDataTable from "@/Components/NoDataTable.vue";
import Pagination from "@/Components/Pagination.vue";
import AuthorForm from "./Partials/AuthorForm.vue";

const props = defineProps({
  authors: Object,
});

const { authors } = toRefs(props);

const global = inject("globalVar");
const showModal = ref(false);
const checkAll = ref(false);
const checkAllIntermediate = ref(false);
const checkAllData = ref([]);

// computed
const dataTable = computed(() => authors.value.data);

// watchers
watch(checkAll, (val) => {
  if (val) checkAllData.value = dataTable.value.map((item) => item.id);
  else checkAllData.value = [];
});

watch(checkAllData, (val) => {
  if (val.length == 0) {
    checkAll.value = false;
    checkAllIntermediate.value = false;
  } else if (val.length != dataTable.value.length) {
    checkAll.value = false;
    checkAllIntermediate.value = true;
  } else {
    checkAll.value = true;
    checkAllIntermediate.value = false;
  }
});

const handleCloseModal = () => {
  showModal.value = false;
};

const handleUpdateQueryParams = (val) => {
  router.get(route("authors.index"), val, {
    preserveState: true,
    replace: true,
    onStart: (visit) => {
      global.isLoading = true;
    },
    onFinish: (visit) => {
      setTimeout(() => {
        global.isLoading = false;
      }, 500);
    },
  });
};
</script>
<template>
  <NewLayout title="Authors" module="Examples">
    <div class="card">
      <div class="card-table-header">
        <span class="card-table-title float-left">
          <i class="fa-solid fa-list-ol"></i>
          {{ $t("lists_of_authors") }}
        </span>
        <div class="card-table-buttons d-none d-sm-block float-right">
          <button
            type="button"
            class="btn btn-sm bg-cyan-500 hover:bg-cyan-600 text-white"
            @click="showModal = !showModal"
          >
            <i class="fa fa-plus-circle mr-2" />Add Author
          </button>
        </div>
        <div class="dropdown float-right d-block d-sm-none">
          <button
            class="btn btn-md dropdown-toggle"
            type="button"
            id="dropdownMenu1"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true"
            style="padding: 0.5rem 1rem"
          >
            <!-- <span class="hamburger"></span> -->
            <i class="fa-solid fa-bars-staggered text-sm"></i>
          </button>
          <ul
            class="dropdown-menu dropdown-menu-md dropdown-menu-right text-sm"
            aria-labelledby="dropdownMenu1"
          >
            <li>
              <button
                type="button"
                class="dropdown-item hover:rounded-sm hover:bg-gray-50 focus:bg-gray-50 focus:text-black py-1.5"
                @click="showModal = true"
              >
                <i class="fa fa-plus-circle mr-2 text-cyan-500" />Add Author
              </button>
            </li>
            <li>
              <button
                type="button"
                class="dropdown-item hover:rounded-sm hover:bg-gray-50 focus:bg-gray-50 focus:text-black py-1.5"
              >
                <i class="fas fa-users mr-2" />8 friend requests
              </button>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body page-card">
        <SearchFilters @update-query-params="handleUpdateQueryParams" />
        <table
          class="table table-sm table-bordered table-hover table-striped table-responsive"
        >
          <colgroup>
            <col style="width: 1%" />
            <col style="width: 15%" />
            <col style="width: '*'" />
            <col style="width: 3%" />
          </colgroup>
          <thead>
            <tr>
              <th>
                <input
                  type="checkbox"
                  v-model="checkAll"
                  :indeterminate="checkAllIntermediate"
                />
              </th>
              <th>Name</th>
              <th>Email</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <template v-if="authors.data.length > 0">
              <tr v-for="(item, i) in authors.data" :key="i">
                <td>
                  <input
                    type="checkbox"
                    v-model="checkAllData"
                    :value="item.id"
                  />
                </td>
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>
                  <div class="btn-group">
                    <button
                      type="button"
                      class="btn-actions btn btn-xs btn-danger dropdown-toggle rounded-none"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                      style="
                        background-color: #1a2130;
                        border: 1px solid #1a2130;
                      "
                    >
                      Actions
                    </button>
                    <ul
                      class="dropdown-menu dropdown-menu-right text-sm"
                      aria-labelledby="dropdownMenu1"
                    >
                      <li>
                        <button
                          type="button"
                          class="dropdown-item hover:rounded-sm hover:bg-gray-50 focus:bg-gray-50 focus:text-black py-1.5"
                        >
                          <i
                            class="fa-regular fa-pen-to-square mr-2 text-amber-500"
                          ></i
                          >Edit Author
                        </button>
                      </li>
                      <li>
                        <button
                          type="button"
                          class="dropdown-item hover:rounded-sm hover:bg-gray-50 focus:bg-gray-50 focus:text-black py-1.5"
                        >
                          <i class="fa-regular fa-eye mr-2 text-blue-500"></i
                          >View Author
                        </button>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
        <NoDataTable :collection="authors.data" />
      </div>
      <div class="card-footer">
        <Pagination :data="authors" />
      </div>
    </div>
    <!-- Modal -->
    <AuthorForm :show="showModal" @close-modal="handleCloseModal" />
  </NewLayout>
</template>