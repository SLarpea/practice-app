<script setup>
import { ref, onMounted, onBeforeMount, inject } from "vue";
import NewLayout from "@/Layouts/NewLayout.vue";
import Echart from "@/Components/Echart.vue";

const global = inject("globalVar");
const chartOptions = ref({
  backgroundColor: "#fff",
  tooltip: {
    trigger: "item",
  },
  visualMap: {
    show: false,
    min: 80,
    max: 500,
    inRange: {
      colorLightness: [1, 0],
    },
  },
  series: [
    {
      name: "Readers From",
      type: "pie",
      radius: "55%",
      center: ["50%", "50%"],
      data: [
        { value: 335, name: "Indonesia" },
        { value: 310, name: "USA" },
        { value: 274, name: "India" },
        { value: 235, name: "China" },
        { value: 400, name: "Philippines" },
      ].sort(function (a, b) {
        return a.value - b.value;
      }),
      roseType: "radius",
      label: {
        alignTo: "edge",
        formatter: "{name|{b}}\n{time|{c}}",
        minMargin: 5,
        edgeDistance: 10,
        lineHeight: 15,
        rich: {
          name: {
            fontSize: 13,
            color: "#06b6d4",
          },
          time: {
            fontSize: 12,
            color: "#6b7280",
          },
        },
      },
      labelLine: {
        length: 15,
        length2: 0,
        maxSurfaceAngle: 80,
      },
      itemStyle: {
        color: "#0891b2",
        shadowBlur: 120,
        shadowColor: "#fff",
      },
      animationType: "scale",
      animationEasing: "elasticOut",
      animationDelay: function (idx) {
        return Math.random() * 200;
      },
    },
  ],
});

const barOptions = ref({
  legend: {},
  tooltip: {},
  dataset: {
    dimensions: ["product", "2015", "2016", "2017"],
    source: [
      { product: "Matcha Latte", 2015: 43.3, 2016: 85.8, 2017: 93.7 },
      { product: "Milk Tea", 2015: 83.1, 2016: 73.4, 2017: 55.1 },
      { product: "Cheese Cocoa", 2015: 86.4, 2016: 65.2, 2017: 82.5 },
      { product: "Walnut Brownie", 2015: 72.4, 2016: 53.9, 2017: 39.1 },
    ],
  },
  xAxis: { type: "category" },
  yAxis: {},
  series: [
    { type: "bar", color: "#164e63" },
    { type: "bar", color: "#06b6d4" },
    { type: "bar", color: "#a5f3fc" },
  ],
});

onBeforeMount(() => {
  global.isLoading = true;
});

onMounted(() => {
  setTimeout(() => {
    global.isLoading = false;
  }, 1000);
});
</script>

<template>
  <NewLayout title="Dashboard" module="Home">
    <div class="row">
      <div class="col-xl-8">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="dashboard-stat-card rounded-sm mb-3">
              <div class="total">
                <div class="flex justify-between items-center mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Total Views</span
                  >
                  <div
                    class="h-100 w-6 flex p-1 items-center justify-center rounded-full bg-cyan-100"
                  >
                    <i class="fa-solid fa-eye text-xs text-cyan-500"></i>
                  </div>
                </div>
                <div class="text-xl mb-4">1,245,365</div>
                <div class="flex justify-between items-end mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Weeks:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >10%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-up text-green-500"
                    ></i
                  ></span>
                  <span class="text-xs text-gray-500 font-normal"
                    >Daily:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >3%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-down text-red-500"
                    ></i
                  ></span>
                </div>
              </div>
              <div class="daily bg-cyan-900">
                <span class="text-xs font-normal">Daily Views</span>
                <span class="text-sm font-normal">656</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="dashboard-stat-card rounded-sm mb-3">
              <div class="total">
                <div class="flex justify-between items-center mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Total Hearts</span
                  >
                  <div
                    class="h-100 w-6 flex p-1 items-center justify-center rounded-full bg-cyan-100"
                  >
                    <i class="fa-solid fa-heart text-xs text-cyan-500"></i>
                  </div>
                </div>
                <div class="text-xl mb-4">536,540</div>
                <div class="flex justify-between items-end mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Weeks:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >11%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-up text-green-500"
                    ></i
                  ></span>
                  <span class="text-xs text-gray-500 font-normal"
                    >Daily:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >2%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-down text-red-500"
                    ></i
                  ></span>
                </div>
              </div>
              <div class="daily bg-cyan-700">
                <span class="text-xs font-normal">Daily Hearts</span>
                <span class="text-sm font-normal">235</span>
              </div>
            </div>
          </div>

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="dashboard-stat-card rounded-sm mb-3">
              <div class="total">
                <div class="flex justify-between items-center mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Total Comments</span
                  >
                  <div
                    class="h-100 w-6 flex p-1 items-center justify-center rounded-full bg-cyan-100"
                  >
                    <i class="fa-solid fa-comments text-xs text-cyan-500"></i>
                  </div>
                </div>
                <div class="text-xl mb-4">245,364</div>
                <div class="flex justify-between items-end mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Weeks:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >8%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-up text-green-500"
                    ></i
                  ></span>
                  <span class="text-xs text-gray-500 font-normal"
                    >Daily:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >6%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-down text-red-500"
                    ></i
                  ></span>
                </div>
              </div>
              <div class="daily bg-cyan-600">
                <span class="text-xs font-normal">Daily Comments</span>
                <span class="text-sm font-normal">164</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="dashboard-stat-card rounded-sm mb-3">
              <div class="total">
                <div class="flex justify-between items-center mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Total Shares</span
                  >
                  <div
                    class="h-100 w-6 flex p-1 items-center justify-center rounded-full bg-cyan-100"
                  >
                    <i class="fa-solid fa-share text-xs text-cyan-500"></i>
                  </div>
                </div>
                <div class="text-xl mb-4">415,783</div>
                <div class="flex justify-between items-end mb-2">
                  <span class="text-xs text-gray-500 font-normal"
                    >Weeks:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >13%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-up text-green-500"
                    ></i
                  ></span>
                  <span class="text-xs text-gray-500 font-normal"
                    >Daily:&nbsp;&nbsp;&nbsp;<strong class="text-black"
                      >5%</strong
                    >&nbsp;&nbsp;<i
                      class="fa-solid fa-sort-down text-red-500"
                    ></i
                  ></span>
                </div>
              </div>
              <div class="daily bg-cyan-500">
                <span class="text-xs font-normal">Daily Shares</span>
                <span class="text-sm font-normal">389</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card rounded-sm">
              <div class="card-header border-b-0 bg-cyan-50">
                <h3 class="card-title text-cyan-500 font-medium">
                  <i class="fa-solid fa-chart-column"></i>
                  Latest Orders
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool">
                    <i class="fa-solid fa-download text-cyan-500"></i>
                  </button>
                  <button type="button" class="btn btn-tool">
                    <i class="fa-solid fa-bars text-cyan-500"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">
                <div class="chart-responsive">
                  <Echart :options="barOptions" :auto-resize="true" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4">
        <div class="card rounded-sm mb-3">
          <div class="card-header border-b-0 bg-cyan-50">
            <h3 class="card-title text-cyan-500 font-medium">
              <i class="fa-solid fa-chart-pie"></i>
              Readers
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool">
                <i class="fa-solid fa-download text-cyan-500"></i>
              </button>
              <button type="button" class="btn btn-tool">
                <i class="fa-solid fa-bars text-cyan-500"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="chart-responsive">
                  <Echart :options="chartOptions" :auto-resize="true" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card rounded-sm mb-3">
          <div class="card-header border-b-0 bg-cyan-50">
            <h3 class="card-title text-cyan-500 font-medium">
              <i class="fa-solid fa-list-ul"></i>
              Activity Logs
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool">
                <i class="fa-solid fa-bars text-cyan-500"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <ol class="activity-feed">
                  <li class="feed-item">
                    <p class="text-xs text-gray-500 relative -top-[0.2rem]">Sep 25</p>
                    <span class="text-sm"
                      >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span
                    >
                  </li>
                  <li class="feed-item">
                    <p class="text-xs text-gray-500 relative -top-[0.2rem]">Sep 24</p>
                    <span class="text-sm"
                      >Added an interest “Volunteer Activities”</span
                    >
                  </li>
                  <li class="feed-item">
                    <p class="text-xs text-gray-500 relative -top-[0.2rem]">Sep 23</p>
                    <span class="text-sm"
                      >Joined the group
                      <a href="#">“Boardsmanship Forum”</a></span
                    >
                  </li>
                  <li class="feed-item">
                    <p class="text-xs text-gray-500 relative -top-[0.2rem]">Sep 21</p>
                    <span class="text-sm"
                      >Responded to need
                      <a href="#">“In-Kind Opportunity”</a></span
                    >
                  </li>
                  <li class="feed-item">
                    <p class="text-xs text-gray-500 relative -top-[0.2rem]">Sep 18</p>
                    <span class="text-sm"
                      >Created need
                      <a href="#"
                        >“Volunteer Opportunity”</a
                      ></span
                    >
                  </li>
                  <li class="feed-item">
                    <p class="text-xs text-gray-500 relative -top-[0.2rem]">Sep 17</p>
                    <span class="text-sm"
                      >Attending the event
                      <a href="#">“Some New Event”</a></span
                    >
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </NewLayout>
</template>
