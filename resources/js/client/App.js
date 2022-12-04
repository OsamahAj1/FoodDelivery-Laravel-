import '../bootstrap';
import { createApp } from 'vue';
import Foods from './RestaurantView/components/Foods.vue'
import Cart from './CartView/components/Cart.vue'
import Order from './OrderView/components/Order.vue'

const app_node = document.querySelector('#app');

if (app_node) {
    const app = createApp({});

    app
        .component('restaurant-foods', Foods)
        .component('cart', Cart)
        .component('order', Order);

    app.mount('#app');
}
