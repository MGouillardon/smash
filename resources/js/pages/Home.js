export default {
    render: async () => `
        <div class="h-screen flex flex-col justify-center items-center py-5 space-y-6 font-primary">
        <h1 class="text-7xl text-center md:text-tablet lg:text-desktop">
            WHICH CHAMP DO U SMASH
        </h1>
        <div class="h-3/4 flex flex-col items-center justify-center space-y-6 md:space-y-20 lg:flex-row lg:space-y-0 lg:w-3/4 lg:justify-evenly">
            <div class="flex flex-col" id="first-champion-js"></div>
            <p class="text-5xl md:text-7xl lg:pt-20">OR</p>
            <div class="flex flex-col-reverse lg:flex-col" id="second-champion-js"></div>
        </div>
        <a
            class="text-5xl text-white bg-secondary rounded py-2 px-16 relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-2.5 after:top-2.5 active:after:left-0 active:after:top-0 transition duration-1000 active:top-2.5 active:left-2.5 md:px-24"
            href="#results"
        >
            RESULTS
        </a>
    </div>
    `,
    after_render: async () => {
        const DUEL = '/api/duel';

        const CHAMP_CHOICE = await import('../components/championChoice');

        async function fetchToJSON(URL) {
            const response = await fetch(URL);
            const data = await response.json();
            return data;
        }

        const DATA = await fetchToJSON(DUEL);

        const CHAMP_NAME_ONE = Object.values(DATA)[0];
        const CHAMP_NAME_TWO = Object.values(DATA)[1];
        const KEY_ONE = Object.keys(DATA)[0];
        const KEY_TWO = Object.keys(DATA)[1];
        let CLASS_NAME = 'pt-2 lg:pt-0';

        const FIRST_CHAMP = document.getElementById('first-champion-js');
        FIRST_CHAMP.innerHTML += CHAMP_CHOICE.default(
            (CLASS_NAME = ''),
            KEY_ONE,
            CHAMP_NAME_ONE
        );

        const SECOND_CHAMP = document.getElementById('second-champion-js');
        SECOND_CHAMP.innerHTML += CHAMP_CHOICE.default(
            CLASS_NAME,
            KEY_TWO,
            CHAMP_NAME_TWO
        );
    },
};
