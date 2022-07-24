import {createApp} from 'vue';

import _ from 'lodash';
window._ = _

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import router from './router';
import Reservoir from './components/Reservoir.vue'

createApp(Reservoir)
    .use(router)
    .mount('#reservoir-admin')
