<script setup>
import { defineProps, ref } from 'vue';
import Order from './Order.vue'

let props = defineProps({
    orders: Array,
    restaurantId: Number
});

let ordersList = ref(props.orders);

const restaurantChannel = window.Echo.private(`privateRestaurant_${props.restaurantId}`);

restaurantChannel.listen('.restaurantOrders', (data) => {

    let order = {
        id: data.order_id,
        order: data.order_order,
        sum_order: data.sum_order,
        delivery: {
            name: data.del_name
        }
    };

    ordersList.value.unshift(order);
});

</script>

<template>

    <p class="text-center fs-3 mb-4" id="orders-wait">Searching for orders</p>

    <order
    v-show="ordersList.length"
    v-for="order in ordersList" :key="order.id"
    :order="order"
    />


</template>
