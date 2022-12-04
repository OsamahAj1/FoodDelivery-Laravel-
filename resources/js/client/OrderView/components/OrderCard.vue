<script setup>
import { defineProps } from 'vue';

let props = defineProps({
    order: Object,
    url: String
});
</script>


<template>

    <div class="container mt-5">

        <div class="cart-item row mb-4">

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <img :src="`${url}/${order.restaurant.image}`" class="im-size">
            </div>

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <p>{{ order.restaurant.name }}</p>
            </div>

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <p class="mt-5 text-break">{{ order.order }}</p>
            </div>

            <div class="col col-lg-3 col-sm-auto col-xs-auto">
                <p id="sum-order">${{ order.sum_order }}</p>
            </div>

        </div>

    </div>
</template>
