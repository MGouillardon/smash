import Chart from 'chart.js/auto';

export default (display, score) =>
  new Chart(display, {
    type: 'doughnut',
    data: {
      datasets: [
        {
          label: "Champion's score",
          data: score,
          backgroundColor: [
            '#1be7ff',
            '#6eeb83',
            '#e4ff1a',
            '#ffb800',
            '#ff5714',
            '#083d77',
            '#ebebd3',
            '#da4167',
            '#f4d35e',
            '#f78764',
          ],
          borderWidth: 3,
        },
      ],
    },
  });
