import {createApp} from 'vue';
import router from './router';
import Reservoir from './components/Reservoir.vue'

createApp(Reservoir)
    .use(router)
    .mount('#reservoir-admin')
