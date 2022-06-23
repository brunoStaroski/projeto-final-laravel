import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'

import BootstrapVue3 from 'bootstrap-vue-3'
import App from './components/App';
import {createApp} from "vue";
import router from './router/index';
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import {fas} from "@fortawesome/free-solid-svg-icons";

library.add(fas);

createApp(App).use(router).use(BootstrapVue3).component('font-awesome-icon', FontAwesomeIcon).mount("#app");
