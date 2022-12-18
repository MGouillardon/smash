export default {
    render: async () => `
        <div class="h-screen flex flex-col justify-center items-center py-5 space-y-6 font-primary">
        <h1 class="text-7xl text-center md:text-tablet lg:text-desktop">
            WHICH CHAMP DO U SMASH
        </h1>
        <div class="h-3/4 flex flex-col items-center justify-center space-y-6 md:space-y-20 lg:flex-row lg:space-y-0 lg:w-3/4 lg:justify-evenly">
            <div class="flex flex-col">
                <h2 class="text-5xl text-center md:text-7xl">NAME</h2>
                <div class="w-32 h-32 flex justify-evenly items-center">
                    <a href="#">
                        <img
                            class=""
                            src="http://ddragon.leagueoflegends.com/cdn/12.23.1/img/champion/Aatrox.png"
                            alt=""
                        />
                    </a>
                </div>
            </div>
            <p class="text-5xl md:text-7xl lg:pt-20">OR</p>
            <div class="flex flex-col-reverse lg:flex-col">
                <h2 class="text-5xl text-center md:text-7xl pt-2 lg:pt-0">NAME</h2>
                <div class="w-32 h-32 flex justify-center items-center">
                    <a href="#">
                        <img
                            class=""
                            src="http://ddragon.leagueoflegends.com/cdn/12.23.1/img/champion/Aatrox.png"
                            alt=""
                        />
                    </a>
                </div>
            </div>
        </div>
    
        <a
            class="text-5xl text-white bg-secondary rounded py-2 px-16 relative after:absolute after:h-full after:w-full after:rounded after:border-4 after:border-secondary after:bg-white after:-z-10 after:right-0 after:bottom-0 after:left-2.5 after:top-2.5 active:after:left-0 active:after:top-0 transition duration-1000 active:top-2.5 active:left-2.5 md:px-24"
            href="#results"
        >
            RESULTS
        </a>
    </div>;
    `,
    after_render: async () => {},
};
