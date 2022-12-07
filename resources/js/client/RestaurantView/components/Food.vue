<script setup>
import { defineProps, ref } from 'vue';

let props = defineProps({
    food: Object,
    url: String
});

let currentNumber = ref(1);
let message = ref('');
let error = true;
let sum_cart = document.querySelector('#cart');

async function add() {

    // check for errors
    if (currentNumber.value == '' || currentNumber.value <= 0) {
        message.value = 'Number must be bigger than 0';
        return;
    }

    // post request to api to add item to cart
    let response;
    try {
        response = await window.axios.post(`/api/cart/add/${props.food.id}/${currentNumber.value}`);
    } catch (error) {
        // if there is error display it

        if (error.response.status == 404) {
            message.value = 'Number must be bigger than 0';

        } else {
            message.value = error.response.data.error;

        }
        return;
    }

    // update cart number
    sum_cart.innerHTML = parseInt(cart.innerHTML) + parseInt(currentNumber.value);

    // show success message
    message.value = response.data.success;
    error = false;
}

</script>

<template>
    <div class="space-y-4">
        <img :src="`${url}/${food.image}`" class="object-contain h-40 w-40">

        <p class="text-xl">{{ food.name }}</p>

        <p>${{ food.price }}</p>

        <p class="leading-loose">{{ food.des }}</p>

        <button
            @click="add"
            class="text-white bg-blue-600 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Add To
            Cart</button>

        <input
            v-model="currentNumber"
            type="number"
            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-16"
            min="1" required>

        <p :class="{
            'text-red-500': error === true,
            'text-green-500': error !== true
            }">{{ message }}</p>
    </div>
</template>
