<script setup>
import { defineProps } from 'vue';

let props = defineProps({
    order: Object,
});
</script>


<template>
    <div class="order-row row">

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>{{ order.id }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p class="text-break">Delivery: {{ order.delivery.name }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto fs-3">
            <p class="text-break">{{ order.order }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>${{ order.sum_order }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <button @click="(e) => e.target.className='btn btn-success'" class="btn btn-danger">Ready</button>
        </div>

    </div>
</template>
