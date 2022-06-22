import './bootstrap';

import App from './components/App';
import {createApp} from "vue";
import router from './router/index';

createApp(App).use(router).mount("#app");
