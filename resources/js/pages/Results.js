import { TOP_CHAMPIONS, TOP_CHAMPIONS_BY_ROLE } from '../api';

export default {
  render: async () => `
      <div
      class="h-screen flex flex-col items-center justify-between py-5 space-y-6 md:space-y-0 font-primary"
  >
      <ul class="w-full flex items-center justify-evenly">
          <li class="line hidden lg:flex"></li>
          <li>
              <h1
                  class="text-7xl text-center md:text-tablet lg:text-9xl 2xl:text-desktop2"
              >
                  RESULTS
              </h1>
          </li>

          <li class="line hidden lg:flex"></li>
      </ul>
          <div class="w-full flex items-center justify-center">
            <label for="top__score"></label>
             <select name="score" id="top__score" class="text-5xl text-white bg-secondary rounded h-16 px-2 text-center">
                <option value="Top">Top 10</option>
                <option value="Assassin">Top Assassin</option>
                <option value="Fighter">Top Fighter</option>
                <option value="Mage">Top Mage</option>
                <option value="Marksman">Top Marksman</option>
                <option value="Support">Top Support</option>
                <option value="Tank">Top Tank</option>
              </select>
          </div>
      <ul
          class="w-full h-full lg:h-1/2 flex flex-col lg:flex-row items-center justify-evenly relative space-y-10 lg:space-y-0"
      >
          <div class="lg:h-full h-3/4 w-full lg:w-3/4 flex justify-center">
              <div
                  class="h-full w-3/4 lg:w-1/2 bg-white rounded border-4 border-secondary flex justify-center items-center p-6 relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-4 after:top-4"

              >
              <canvas id="chart"></canvas>
</div>
          </div>
          <div class="hidden lg:flex horizontal-line"></div>
          <div class="lg:h-full h-3/4 w-full lg:w-3/4 flex justify-center">
              <div
                  class="h-full w-3/4 lg:w-1/2 bg-white flex justify-center items-center rounded border-4 border-secondary relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-4 after:top-4"
                  id="labels"

              >
              <ul class="font-secondary lg:text-xl text-xs w-full h-full p-6 grid grid-cols-2 gap-2 md:gap-0 place-items-center"></ul>
</div>
          </div>
      </ul>
      <a
          class="text-5xl text-white bg-secondary rounded py-2 px-16 relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-2.5 after:top-2.5 active:after:left-0 active:after:top-0 transition duration-1000 active:top-2.5 active:left-2.5 md:px-24"
          href="#home"
          >BACK TO HOME</a
      >
  </div>
`,
  after_render: async () => {
    const CHART_COMPONENT = await import('../components/chart');
    const SELECT_ELEMENT = document.getElementById('top__score');

    async function fetchToJSON(URL) {
      const response = await fetch(URL);
      return response.json();
    }

    const getDataChampions = async value => {
      const INPUT_VALUE = value;
      let url = TOP_CHAMPIONS;
      if (INPUT_VALUE !== 'Top') {
        url = TOP_CHAMPIONS_BY_ROLE(INPUT_VALUE);
      }
      const DATA = await fetchToJSON(url);
      const DATA_TOP_CHAMPIONS = Object.keys(DATA);
      const DATA_SCORE_CHAMPIONS = Object.values(DATA);

      return { DATA_TOP_CHAMPIONS, DATA_SCORE_CHAMPIONS };
    };

    const { DATA_TOP_CHAMPIONS, DATA_SCORE_CHAMPIONS } = await getDataChampions(
      SELECT_ELEMENT.value
    );

    CHART_COMPONENT.default(DATA_TOP_CHAMPIONS, DATA_SCORE_CHAMPIONS);
    SELECT_ELEMENT.addEventListener('change', async e => {
      const RESPONSE = await getDataChampions(e.target.value);
      CHART_COMPONENT.update(RESPONSE);
    });
  },
};
