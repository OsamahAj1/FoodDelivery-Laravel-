<script setup>
import { defineProps, ref } from 'vue';
import CancelOrderForm from './CancelOrderForm.vue'

let props = defineProps({
    order: Object,
    url: String,
    destroyOrderRoute: String,
    csrf: String
});

let orderInfo = ref(props.order);

if (orderInfo.value.is_sent == true) {
    listenForAccept();
}

async function send() {
    orderInfo.value.is_sent = true;

    let data = {
        'order_id': orderInfo.value.id,
        'res_img': orderInfo.value.restaurant.image,
        'res_name': orderInfo.value.restaurant.name,
        'res_adr': orderInfo.value.restaurant.address,
        'res_id': orderInfo.value.restaurant.id,
        'order': orderInfo.value.order,
        'sum_order': orderInfo.value.sum_order,
        'client_adr': orderInfo.value.client.address,
    }

    let response = await window.axios.post('/api/sendOrder', { data: JSON.stringify(data) });

    listenForAccept();
}

function listenForAccept() {

    const orderChannel = window.Echo.private(`privateOrder_${orderInfo.value.id}`);

    orderChannel.listen('.order', (data) => {

        orderInfo.value.delivery = {
            image: data.del_img,
            name: data.del_name,
            car: data.del_car,
            number: data.del_number
        };

        orderInfo.value.is_active = true;

    });

}


</script>

<template>

    <p
    v-if="(orderInfo.is_sent == true && ! orderInfo.delivery)"
    class="text-center fs-3 mt-4"
    id="order-status-wait"
    >Please wait finding delivery person</p>

    <div v-if="orderInfo.delivery" class="container mt-5">

        <div class="row">

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <img :src="`${url}/${orderInfo.delivery.image}`" class="im-size">
            </div>

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <p>{{ orderInfo.delivery.name }}</p>
            </div>

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <p>{{ orderInfo.delivery.car }}</p>
            </div>

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <p>{{ orderInfo.delivery.number }}</p>
            </div>

            <div class="row">
                <p class="text-info text-center fs-3">
                    You gonna get call from delivery person when he get to your address.
                </p>
            </div>

        </div>
    </div>

    <div v-if="(orderInfo.is_sent == false)" class="text-center mt-4">
        <button
        @click="send"
        class="btn btn-success
        ">Send Order</button>
    </div>

    <cancel-order-form
    v-if="(orderInfo.is_active == false)"
    :csrf="csrf"
    :destroy-order-route="destroyOrderRoute"
    />

</template>
