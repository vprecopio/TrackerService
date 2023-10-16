<script>
window.addEventListener("load", function () {
  const getChartOptions = () => {
    return {
      series: <?=json_encode($contador_estados)?>,
      colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
      chart: {
        height: "380px",
        width: "100%",
        type: "radialBar",
        sparkline: {
          enabled: true,
        },
      },
      plotOptions: {
        radialBar: {
          track: {
            background: "#E5E7EB",
          },
          dataLabels: {
            show: false,
          },
          hollow: {
            margin: 0,
            size: "32%",
          },
        },
      },
      grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
          left: 2,
          right: 2,
          top: -23,
          bottom: -20,
        },
      },
      labels: <?=json_encode($array_unico_titulos_estado_de_los_tickets);?>,
      legend: {
        show: true,
        position: "bottom",
        fontFamily: "sans-serif",
      },
      tooltip: {
        enabled: true,
        x: {
          show: false,
        },
      },
      yaxis: {
        show: false,
        labels: {
          formatter: function (value) {
            return value + "%";
          },
        },
      },
    };
  };

  if (
    document.getElementById("radial-chart") &&
    typeof ApexCharts !== "undefined"
  ) {
    var chart = new ApexCharts(
      document.querySelector("#radial-chart"),
      getChartOptions()
    );
    chart.render();
  }
});
</script>