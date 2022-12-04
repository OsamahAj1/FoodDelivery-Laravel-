import '../bootstrap';
import { createApp } from 'vue';
import Orders from './IndexView/components/Orders.vue'

const app_node = document.querySelector('#app');

if (app_node) {
    const app = createApp({});

    app
        .component('orders', Orders);

    app.mount('#app');
}
