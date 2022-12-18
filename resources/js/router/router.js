import ROUTES from './routes';

const APP = document.getElementById('app');

const ROUTER = async () => {
    const hash = window.location.hash.split('#')[1] || '/';

    APP.innerHTML = await ROUTES[hash].render();
    await ROUTES[hash].after_render();
};

window.addEventListener('hashchange', async () => {
    await ROUTER();
});

export default ROUTER;
