var options = {
  series: [
    {
      data: [400, 430, 448, 470, 540],
    },
  ],
  chart: {
    type: 'bar',
    height: 250,
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      horizontal: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  xaxis: {
    categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy'],
  },
};

var chart = new ApexCharts(document.querySelector('#chart'), options);
chart.render();

var options = {
  series: [44, 55, 13, 43, 22],
  chart: {
    width: 380,
    type: 'pie',
  },
  labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
  responsive: [
    {
      breakpoint: 480,
      options: {
        chart: {
          width: 200,
        },
        legend: {
          position: 'bottom',
        },
      },
    },
  ],
};

var chart = new ApexCharts(document.querySelector('#chart-donut'), options);
chart.render();
