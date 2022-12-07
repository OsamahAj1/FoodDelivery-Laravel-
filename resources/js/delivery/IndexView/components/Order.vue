<script setup>
import { defineProps, ref } from 'vue';

let props = defineProps({
    order: Object,
    url: String,
    delivery: Object
});

let message = ref('');

let disabled = ref(false);

async function accept() {

    disabled.value = true;

    // send delivery info to client
    let data = {
        'order_id': parseInt(props.order.id),
        'del_id': props.delivery.id,
        'del_name': props.delivery.name,
        'del_img': props.delivery.image,
        'del_car': props.delivery.car,
        'del_number': props.delivery.number,
    }

    let response;
    try {
        response = await window.axios.post('/api/acceptOrder', { data: JSON.stringify(data) });
    } catch (error) {
        message.value = error.response.data.error;
        return;
    }

    // send to restaurant
    let restaurant_data = {
        'res_id': parseInt(props.order.restaurant.id),
        'order_id': parseInt(props.order.id),
        'del_name': props.delivery.name,
        'order_order': props.order.order,
        'sum_order': props.order.sum_order,
    };

    response = await window.axios.post('/api/sendToRestaurant', { data: JSON.stringify(restaurant_data) });

    window.location.replace('/delivery/order');

}
</script>


<template>

    <div class="grid grid-cols-1 gap-y-14  justify-items-center p-5">

        <div class="grid grid-cols-6 gap-x-14  justify-items-center">
            <img :src="`${url}/${order.restaurant.image}`" class="object-contain h-40 w-40">

            <div class="mt-12">{{ order.restaurant.name }}</div>

            <div class="mt-12">
                From <p>{{ order.restaurant.address }}</p>
                To <p>{{ order.client.address }}</p>
            </div>

            <div class="mt-12">{{ order.order }}</div>

            <div class="mt-12">${{ order.sum_order }}</div>

            <div class="mt-12">
                <button
                @click="accept"
                :disabled="disabled"
                class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                >Accept</button>
            </div>

        </div>

        <p class="text-red-500">{{ message }}</p>

    </div>

</template>
