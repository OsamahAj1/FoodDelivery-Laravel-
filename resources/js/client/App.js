import '../bootstrap';
import { createApp } from 'vue';
import Foods from './RestaurantView/components/Foods.vue'
import Cart from './CartView/components/Cart.vue'

const app = createApp({});

app
    .component('restaurant-foods', Foods)
    .component('cart', Cart);

app.mount('#app');

// // Remove from cart

// const remove_button = document.querySelectorAll('.remove-button');
// if (remove_button) {

//     // listen for click
//     remove_button.forEach(button => {

//         // when button is clicked
//         button.onclick = async () => {

//             // get cart_id and message field and element user want to remove
//             const cart_id = button.previousElementSibling.value;
//             const message = button.nextElementSibling;
//             const cart_item = document.querySelector(`#cart-item-${cart_id}`);
//             const sum_cart = document.querySelector('#sum-price-cart');
//             const cart = document.querySelector('#cart');

//             // check for errors
//             if (cart_id == '' || parseInt(cart_id) <= 0) {
//                 message.innerHTML = 'Error removing item';
//                 message.className = "text-danger";
//                 return;
//             }

            // // post request to API to delete cart item
            // let response;
            // try {
            //     response = await window.axios.post(`/api/cart/destroy/${cart_id}`);
            // } catch (error) {
            //     // if there is error display it

            //     if (error.response.status == 404) {
            //         message.innerHTML = 'Error removing item';
            //         message.className = "text-danger";
            //     } else {
            //         message.innerHTML = error.response.data.error;
            //         message.className = "text-danger";
            //     }
            //     return;
            // }

//             // remove error message
//             message.innerHTML = "";
//             message.className = "";

            // // play remove animation
            // cart_item.style.animationPlayState = 'running';

            // // when animation played
            // cart_item.addEventListener('animationend', () => {

            //     // remove cart_item
            //     cart_item.remove();

            //     // update sum_cart and cart count
            //     sum_cart.innerHTML = `$${response.data.sum_cart}`;
            //     cart.innerHTML = response.data.cart_count;

            //     // if response is 0 hide place order div and show empty message
            //     if (response.data.sum_cart < 1) {
            //         document.querySelector('#place-order').style.display = "none";
            //         document.querySelector('#empty').innerHTML = `<h3 class="text-center text-info">Cart is empty go to <a href="/home">home page</a> to add items.</h3>`
            //     }
            // });
//         }
//     });
// }


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

//         let data = {
//             'order_id': order_id.value,
//             'res_img': document.querySelector('#res-img').src,
//             'res_name': document.querySelector('#res-name').innerHTML,
//             'res_adr': document.querySelector('#res-adr').value,
//             'res_id': document.querySelector('#res-id').value,
//             'order': document.querySelector('#order-order').innerHTML,
//             'sum_order': document.querySelector('#sum-order').innerHTML,
//             'client_adr': document.querySelector('#client-adr').value,
//         }

//         let response = await window.axios.post('/api/sendOrder', { data: JSON.stringify(data) });

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

