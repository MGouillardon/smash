import Chart from 'chart.js/auto';

export default {
    render: async () => `
      <div
      class="h-screen flex flex-col items-center justify-evenly py-5 space-y-6 font-primary"
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
          <div class="menu_container">
              <button class="list_btn">Select an option</button>
              <span class="button_arrow"></span>
              <div class="option_container">
                  <label class="option_field">
                      <input
                          class="list_option"
                          type="radio"
                          name="list"
                          title="Top Mage"
                      />Top Mage
                  </label>
                  <label class="option_field">
                      <input
                          class="list_option"
                          type="radio"
                          name="list"
                          title="Top Tank"
                      />Top Tank
                  </label>
                  <label class="option_field">
                      <input
                          class="list_option"
                          type="radio"
                          name="list"
                          title="Top Fighter"
                      />Top Fighter
                  </label>
                  <label class="option_field">
                      <input
                          class="list_option"
                          type="radio"
                          name="list"
                          title="Top Assassin"
                      />Top Assassin
                  </label>
                  <label class="option_field">
                      <input
                          class="list_option"
                          type="radio"
                          name="list"
                          title="Top Marksman"
                      />Top Marksman
                  </label>
                  <label class="option_field">
                      <input
                          class="list_option"
                          type="radio"
                          name="list"
                          title="Top Support"
                      />Top Support
                  </label>
              </div>
          </div>
      </div>
      <ul
          class="w-full h-full lg:h-1/2 flex flex-col lg:flex-row items-center justify-evenly relative lg:-top-12 space-y-10 lg:space-y-0"
      >
          <div class="lg:h-full h-3/4 w-3/4 flex justify-center">
              <canvas
                  class="h-full w-3/4 lg:w-1/2 bg-white rounded border-4 border-secondary relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-4 after:top-4"
                  id="chart"
              ></canvas>
          </div>
          <div class="hidden lg:flex horizontal-line"></div>
          <div class="lg:h-full h-3/4 w-3/4 flex justify-center">
              <div
                  class="h-full w-3/4 lg:w-1/2 bg-white rounded border-4 border-secondary relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-4 after:top-4"

              ></div>
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
        const listItems = document.getElementsByClassName('list_option');
        for (let i = 0; i < listItems.length; i += 1) {
            listItems[i].addEventListener('click', () => {
                document.getElementsByClassName('list_btn')[0].innerHTML =
                    listItems[i].title;
            });
        }
        const CHART = document.getElementById('chart');
        const MY_CHART = new Chart(CHART, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [
                    {
                        label: '# of Champions',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1,
                    },
                ],
            },
        });

        CHART.innerHTML += MY_CHART;
    },
};
