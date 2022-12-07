<script setup>
import { defineProps } from 'vue';

let props = defineProps({
    order: Object,
});
</script>


<template>
    <div class="grid grid-cols-1 gap-y-14  justify-items-center p-5">

        <div class="grid grid-cols-6 gap-x-14  justify-items-center">

            <div class="mt-12">{{ order.id }}</div>

            <div class="mt-12">Delivery: {{ order.delivery.name }}</div>

            <div class="mt-12">{{ order.order }}</div>

            <div class="mt-12">${{ order.sum_order }}</div>

            <div class="mt-12">
                <button
                @click="(e) => e.target.className ='text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2'"
                :disabled="disabled"
                class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                >Ready</button>
            </div>

        </div>

    </div>
</template>
