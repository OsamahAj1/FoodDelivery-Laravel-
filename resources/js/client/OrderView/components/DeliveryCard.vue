<script setup>
import { defineProps, ref } from 'vue';
import CancelOrderForm from './CancelOrderForm.vue';

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
    class="text-center text-3xl mt-4"
    id="order-status-wait"
    >Please wait finding delivery person</p>

        <div v-if="orderInfo.delivery" class="grid grid-cols-1 gap-y-14  justify-items-center p-5">

            <div class="grid grid-cols-6 gap-x-14  justify-items-center">
                <img :src="`${url}/${orderInfo.delivery.image}`"
                    class="object-contain h-40 w-40">

                <div class="mt-12">{{ orderInfo.delivery.name }}</div>

                <div class="mt-12">{{ orderInfo.delivery.car }}</div>

                <div class="mt-12">{{ orderInfo.delivery.number }}</div>

            </div>

            <div class="text-sky-400 text-2xl">You gonna get call from delivery person when he get to your address.</div>

        </div>

        <div class="grid grid-cols-1  justify-items-center p-5">

            <div v-if="(orderInfo.is_sent == false)">
                <button
                @click="send"
                class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                >Send Order</button>
            </div>

            <cancel-order-form
            v-if="(orderInfo.is_active == false)"
            :csrf="csrf"
            :destroy-order-route="destroyOrderRoute"
            />

        </div>

</template>
