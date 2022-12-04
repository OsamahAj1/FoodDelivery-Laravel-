<script setup>
import { defineProps } from 'vue';
import DeliveryCard from './DeliveryCard.vue'
import OrderCard from './OrderCard.vue'

let props = defineProps({
    order: [Object, null],
    indexRoute: String,
    destroyOrderRoute: String,
    url: String,
    csrf: String
});

</script>

<template>

    <div v-if="order">

        <delivery-card
        :order="order"
        :url="url"
        :csrf="csrf"
        :destroy-order-route="destroyOrderRoute"
        />

        <order-card
        :order="order"
        :url="url"
        />

    </div>

    <h3 v-else class="text-center text-info mt-5">
        No live order go to <a :href="indexRoute">home page</a> to order.
    </h3>

</template>
