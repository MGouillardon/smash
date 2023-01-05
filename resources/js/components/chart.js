import Chart from 'chart.js/auto';

const getOrCreateLegendList = (chart, id) => {
  const legendContainer = document.getElementById(id);
  let listContainer = legendContainer.querySelector('ul');

  if (!listContainer) {
    listContainer = document.createElement('ul');
    listContainer.style.display = 'flex';
    listContainer.style.flexDirection = 'row';
    listContainer.style.margin = 0;
    listContainer.style.padding = 0;

    legendContainer.appendChild(listContainer);
  }

  return listContainer;
};

const htmlLegendPlugin = {
  id: 'htmlLegend',
  afterUpdate(chart, args, options) {
    const ul = getOrCreateLegendList(chart, options.containerId);

    // Remove old legend items
    while (ul.firstChild) {
      ul.firstChild.remove();
    }

    // Reuse the built-in legendItems generator
    const items = chart.options.plugins.legend.labels.generateLabels(chart);

    items.forEach(item => {
      const li = document.createElement('li');
      li.style.alignItems = 'center';
      li.style.cursor = 'pointer';
      li.style.display = 'flex';
      li.style.width = 'calc(100% / 1.25)';

      li.onclick = () => {
        chart.toggleDataVisibility(item.index);
        chart.update();
      };

      // Color box
      const boxSpan = document.createElement('span');
      boxSpan.style.background = item.fillStyle;
      boxSpan.style.borderColor = 'black';
      boxSpan.style.borderWidth = `${item.lineWidth}px`;
      boxSpan.style.display = 'flex';
      boxSpan.style.justifyContent = 'center';
      boxSpan.style.alignItems = 'center';
      boxSpan.style.height = '40px';
      boxSpan.style.width = '100%';

      // Text
      const textContainer = document.createElement('p');
      textContainer.style.color = 'black';
      textContainer.style.margin = 0;
      textContainer.style.padding = 0;
      textContainer.style.textDecoration = item.hidden ? 'line-through' : '';

      const text = document.createTextNode(item.text);
      textContainer.appendChild(text);
      boxSpan.appendChild(textContainer);
      li.appendChild(boxSpan);
      ul.appendChild(li);
    });
  },
};

const CHART_ELEMENT = document.getElementById('chart');
const CHART = new Chart(CHART_ELEMENT, {
  plugins: [htmlLegendPlugin],
  options: {
    plugins: {
      legend: {
        display: false,
      },
      htmlLegend: {
        containerId: 'labels',
      },
    },
  },
});

export default (champions, score) => {
  CHART.config.type = 'doughnut';
  CHART.config.data = {
    labels: champions,
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
          '#FFA5A5',
          '#ebebd3',
          '#da4167',
          '#f4d35e',
          '#f78764',
        ],
        borderWidth: 3,
      },
    ],
  };

  CHART.update();
};

export const update = DATA_CHAMPIONS => {
  CHART.data.labels = DATA_CHAMPIONS.DATA_TOP_CHAMPIONS;
  CHART.data.datasets.forEach((dataset, key) => {
    CHART.data.datasets[key].data = [];
    DATA_CHAMPIONS.DATA_SCORE_CHAMPIONS.forEach(score => {
      dataset.data.push(score);
    });
  });
  CHART.update();
};
