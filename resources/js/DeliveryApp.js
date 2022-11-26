import './bootstrap';



// search

const orders = document.querySelector('#orders');

if (orders) {

    const ordersChannel = window.Echo.channel('publicOrders');

    ordersChannel.listen('.orders', (data) => {

        // if there is new message
        if (data.order_id) {

            // create row
            const row = document.createElement('div');
            row.className = "order-row row";

            // insert data to it
            row.innerHTML = `<div class="col col-lg-2 col-sm-auto col-xs-auto"><img class="im-size" src=${data.res_img}></div>
                        <div class="col col-lg-2 col-sm-auto col-xs-auto"><p>${data.res_name}</p></div>
                        <div class="col col-lg-2 col-sm-auto col-xs-auto">
                        <p class="text-break"><span class="text-info">FROM: </span>${data.res_adr}. <span class="text-info">TO: </span> ${data.client_adr}.</p>
                        </div>
                        <div class="col col-lg-2 col-sm-auto col-xs-auto"><p class="text-break" id="order-order-${data.order_id}">${data.order}</p></div>
                        <div class="col col-lg-2 col-sm-auto col-xs-auto"><p id="sum-order-${data.order_id}">${data.sum_order}</p></div>
                        <div class="col col-lg-2 col-sm-auto col-xs-auto">
                        <button type="submit" class="accept-btn btn btn-success" data-order="${data.order_id}" data-res="${data.res_id}">Accept</button><span class="text-danger ms-3 fs-3"></span>
                        </div>`;

            // append row to orders
            orders.prepend(row);
        }
    });


    document.addEventListener('click', async btn => {
        if (btn.target.className === "accept-btn btn btn-success") {

            let data = {
                'order_id': btn.target.dataset.order,
                'del_id': document.querySelector('#del-id').value,
                'del_name': document.querySelector('#del-name').value,
                'del_img': document.querySelector('#del-img').value,
                'del_car': document.querySelector('#del-car').value,
                'del_number': document.querySelector('#del-number').value,
            }

            let response;

            try {
                response = await window.axios.post('/api/acceptOrder', { data: JSON.stringify(data) });
            } catch (error) {
                btn.target.nextElementSibling.innerHTML = error.response.data.error;
                return;
            }

            let restaurant_data = {
                'res_id': btn.target.dataset.res,
                'order_id': btn.target.dataset.order,
                'del_name': document.querySelector('#del-name').value,
                'order_order': document.querySelector(`#order-order-${btn.target.dataset.order}`).innerHTML,
                'sum_order': document.querySelector(`#sum-order-${btn.target.dataset.order}`).innerHTML,
            };

            response = await window.axios.post('/api/sendToRestaurant', { data: JSON.stringify(restaurant_data) });

            window.location.replace('/delivery/order');


        }
    });
}

