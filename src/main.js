import { createApp } from 'vue'
import App from './App.vue'
import router from './route/router';
import './css/app.scss';

createApp(App)
    .use(router)
    .mount('#app')
