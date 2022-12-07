<script setup>
import { defineProps } from 'vue';

let props = defineProps({
    order: Object,
    url: String
});
</script>


<template>

    <div class="grid grid-cols-1 gap-y-14 justify-items-center p-5">

        <div class="grid grid-cols-6 gap-x-14 justify-items-center">
            <img :src="`${url}/${order.restaurant.image}`" class="object-contain h-40 w-40">

            <div class="mt-12">{{ order.restaurant.name }}</div>

            <div class="mt-12">{{ order.order }}</div>

            <div class="mt-12">${{ order.sum_order }}</div>

        </div>
    </div>

</template>
