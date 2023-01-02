import '../styles/main.css';
import ROUTER from './router/router';

window.addEventListener('load', async () => {
  await ROUTER();
});
