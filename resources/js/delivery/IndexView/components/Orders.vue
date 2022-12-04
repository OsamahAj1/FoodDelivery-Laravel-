<script setup>
import { defineProps, ref } from 'vue';
import Order from './Order.vue'

let props = defineProps({
    orders: Array,
    url: String,
    delivery: Object
});

let ordersList = ref(props.orders);

const ordersChannel = window.Echo.channel('publicOrders');

ordersChannel.listen('.orders', (data) => {

    if (data.order_id) {

        let order = {
            id: data.order_id,
            restaurant: {
                id: data.res_id,
                image: data.res_img,
                name: data.res_name,
                address: data.res_adr,
            },
            order: data.order,
            sum_order: data.sum_order,
            client: {
                address: data.client_adr
            },
        };

        ordersList.value.unshift(order);

    }
});
</script>

<template>
    <p class="text-center fs-3 mt-5" id="orders-wait">Searching for orders</p>

    <order
    v-show="ordersList.length"
    v-for="order in ordersList" :key="order.id"
    :order="order"
    :url="url"
    :delivery="delivery"
    />

</template>
