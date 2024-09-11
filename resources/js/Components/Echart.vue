<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from "vue";
import * as echarts from "echarts";
import { TitleComponent, TooltipComponent } from "echarts/components";

echarts.use([TitleComponent, TooltipComponent]);

const props = defineProps({
  options: Object, // the ECharts options object
  autoResize: {
    type: Boolean,
    default: true,
  },
});

const chartRef = ref(null);
let chartInstance = null;

const initChart = () => {
  if (chartRef.value) {
    chartInstance = echarts.init(chartRef.value);

    if (props.options) {
      chartInstance.setOption(props.options);
    }
  }
};

// Resize the chart when the window size changes
const resizeChart = () => {
  if (chartInstance) {
    chartInstance.resize();
  }
};

onMounted(() => {
  initChart();

  // Add resize event listener if autoResize is enabled
  if (props.autoResize) {
    window.addEventListener('resize', resizeChart);
  }
});

watch(
  () => props.options,
  (newOptions) => {
    if (chartInstance && newOptions) {
      chartInstance.setOption(newOptions);
    }
  }
);

onBeforeUnmount(() => {
  if (chartInstance) {
    window.removeEventListener("resize", chartInstance.resize);
    chartInstance.dispose();
  }
});
</script>
<template>
  <!-- Use a wrapper div to maintain the aspect ratio -->
  <div class="chart-wrapper">
    <div ref="chartRef" class="chart-container"></div>
  </div>
</template>
<style scoped>
.chart-wrapper {
  width: 100%;
  position: relative;
  /* The height is set to 100% / aspect ratio */
  padding-top: calc(100% / 1.45); /* 1.45 aspect ratio */
}

.chart-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>