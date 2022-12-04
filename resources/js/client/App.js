import '../bootstrap';
import { createApp } from 'vue';
import Foods from './RestaurantView/components/Foods.vue'
import Cart from './CartView/components/Cart.vue'
import Order from './OrderView/components/Order.vue'

const app = createApp({});

app
    .component('restaurant-foods', Foods)
    .component('cart', Cart)
    .component('order', Order);

app.mount('#app');



// // Order status

// const order_id = document.querySelector('#order_id');
// const send_order = document.querySelector('#send-btn');
// const cancel_order = document.querySelector('#cancel-order-form');
// const wait = document.querySelector('#order-status-wait');
// const info = document.querySelector('#delivery-info');
// const not_active = document.querySelector('#not-active');
// const message = document.querySelector('#message');

// if (send_order) {

//     info.style.display = 'none';

//     // when send button clicked
//     send_order.onclick = async e => {

//         wait.style.animationPlayState = 'running';
//         wait.style.display = 'block';
//         send_order.remove();

        // let data = {
        //     'order_id': order_id.value,
        //     'res_img': document.querySelector('#res-img').src,
        //     'res_name': document.querySelector('#res-name').innerHTML,
        //     'res_adr': document.querySelector('#res-adr').value,
        //     'res_id': document.querySelector('#res-id').value,
        //     'order': document.querySelector('#order-order').innerHTML,
        //     'sum_order': document.querySelector('#sum-order').innerHTML,
        //     'client_adr': document.querySelector('#client-adr').value,
        // }

        // let response = await window.axios.post('/api/sendOrder', { data: JSON.stringify(data) });

//         message.innerHTML = response.data.message;


//         // listen for accept
//         listenForAccept(order_id.value);
//     }
// }

// if (not_active && !send_order) {

//     wait.style.animationPlayState = 'running';
//     wait.style.display = 'block';
//     info.style.display = 'none';

//     listenForAccept(order_id.value);
// }

// function listenForAccept(order_id) {

//     const orderChannel = window.Echo.private(`privateOrder_${order_id}`);

//     orderChannel.listen('.order', (data) => {

//         // remove cancel
//         cancel_order.remove();
//         wait.remove();

//         document.querySelector('#delivery-image').src = data.del_img;
//         document.querySelector('#delivery-name').innerHTML = data.del_name;
//         document.querySelector('#delivery-car').innerHTML = data.del_car;
//         document.querySelector('#delivery-number').innerHTML = data.del_number;

//         info.style.display = 'flex';
//     });
// }

