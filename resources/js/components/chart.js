import Chart from 'chart.js/auto';

export default value =>
  new Chart(value, {
    type: 'doughnut',
    data: {
      labels: [
        'Red',
        'Blue',
        'Yellow',
        'Green',
        'Purple',
        'Orange',
        'Grey',
        'Black',
        'White',
        'Pink',
      ],
      datasets: [
        {
          label: '# of Champions',
          data: [12, 19, 3, 5, 2, 3, 7, 1, 1, 1],
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
          borderWidth: 1,
        },
      ],
    },
  });
