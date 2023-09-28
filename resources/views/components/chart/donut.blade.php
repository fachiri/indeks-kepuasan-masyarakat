<div class="max-w-xs w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div>
    <div class="flex flex-wrap gap-3" id="devices">
      <div class="flex items-center mr-4">
        <input id="desktop" type="checkbox" value="desktop"
          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="desktop" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kota Tengah</label>
      </div>
      <div class="flex items-center mr-4">
        <input id="tablet" type="checkbox" value="tablet"
          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="tablet" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kota Timur</label>
      </div>
      <div class="flex items-center mr-4">
        <input id="mobile" type="checkbox" value="mobile"
          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="mobile" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dungingi</label>
      </div>
    </div>
  </div>

  <!-- Line Chart -->
  <div class="py-6" id="donut-chart"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  // ApexCharts options and config
  window.addEventListener("load", function() {
    const getChartOptions = () => {
      return {
        series: [35.1, 23.5, 2.4, 5.4],
        colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
        chart: {
          height: 320,
          width: "100%",
          type: "donut",
        },
        stroke: {
          colors: ["transparent"],
          lineCap: "",
        },
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true,
                name: {
                  show: true,
                  fontFamily: "Inter, sans-serif",
                  offsetY: 20,
                },
                total: {
                  showAlways: true,
                  show: true,
                  label: "Unique visitors",
                  fontFamily: "Inter, sans-serif",
                  formatter: function(w) {
                    const sum = w.globals.seriesTotals.reduce((a, b) => {
                      return a + b
                    }, 0)
                    return `${sum}k`
                  },
                },
                value: {
                  show: true,
                  fontFamily: "Inter, sans-serif",
                  offsetY: -20,
                  formatter: function(value) {
                    return value + "k"
                  },
                },
              },
              size: "80%",
            },
          },
        },
        grid: {
          padding: {
            top: -2,
          },
        },
        labels: ["Direct", "Sponsor", "Affiliate", "Email marketing"],
        dataLabels: {
          enabled: false,
        },
        legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
        },
        yaxis: {
          labels: {
            formatter: function(value) {
              return value + "k"
            },
          },
        },
        xaxis: {
          labels: {
            formatter: function(value) {
              return value + "k"
            },
          },
          axisTicks: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
        },
      }
    }

    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
      chart.render();

      // Get all the checkboxes by their class name
      const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

      // Function to handle the checkbox change event
      function handleCheckboxChange(event, chart) {
        const checkbox = event.target;
        if (checkbox.checked) {
          switch (checkbox.value) {
            case 'desktop':
              chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
              break;
            case 'tablet':
              chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
              break;
            case 'mobile':
              chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
              break;
            default:
              chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
          }

        } else {
          chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
        }
      }

      // Attach the event listener to each checkbox
      checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
      });
    }
  });
</script>
