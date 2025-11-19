// ================================ Branch Performance Chart (Actual vs Target) ================================
var options = {
  series: [
    {
      name: "Actual",
      data: [1800000, 1900000, 1600000, 1200000, 1000000, 1300000],
    },
    {
      name: "Target",
      data: [2500000, 2000000, 2200000, 1800000, 1600000, 1900000],
    },
  ],
  chart: {
    type: "bar",
    height: 280,
    toolbar: { show: false },
  },
  colors: ["#007DFE", "#B8B8B8"],
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "35%",
      borderRadius: 6,
      endingShape: "rounded",
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    show: true,
    width: 4,
    colors: ["transparent"],
  },
  grid: {
    show: true,
    borderColor: "#D1D5DB",
    strokeDashArray: 4,
  },
  xaxis: {
    categories: [
      "Dili",
      "Singapore",
      "Shanghai",
      "Hong Kong",
      "Cayman",
      "London",
    ],
    labels: {
      style: {
        colors: "#6B7280",
        fontSize: "12px",
        fontWeight: 500,
      },
    },
  },
  yaxis: {
    labels: {
      formatter: function (value) {
        return "USD " + (value / 1000000).toFixed(1) + "M";
      },
      style: {
        colors: "#6B7280",
        fontSize: "11px",
      },
    },
  },
  tooltip: {
    shared: true,
    intersect: false,
    custom: function ({ series, seriesIndex, dataPointIndex, w }) {
      const actual = series[0][dataPointIndex];
      const target = series[1][dataPointIndex];
      const gap = ((actual / target) * 100).toFixed(1);

      return `
        <div class="chartpanel">
          <strong>${w.globals.labels[dataPointIndex]}</strong><br>
          <span style="color:#007DFE;">Actual:</span> USD ${actual.toLocaleString()}<br>
          <span style="color:#999;">Target:</span> USD ${target.toLocaleString()}<br>
          <span style="color:${gap >= 100 ? "#16A34A" : "#DC2626"};">Gap:</span> ${gap}%
        </div>
      `;
    },
  },
  legend: {
    show: true,
    position: "top",
    horizontalAlign: "right",
    fontSize: "13px",
    fontWeight: 500,
  },
  fill: {
    opacity: 1,
  },
};

var chart = new ApexCharts(document.querySelector("#branchPerformanceChart"), options);
chart.render();
// ================================ Branch Performance Chart End ================================