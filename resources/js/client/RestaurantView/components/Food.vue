<script setup>
import { defineProps, ref } from 'vue';

let props = defineProps({
    food: Object,
    url: String
});

let currentNumber = ref(1);
let message = ref('');
let error = false;
let cart = document.querySelector('#cart');

async function add() {
    // check for errors
    if (currentNumber.value == '' || currentNumber.value <= 0) {
        message.value = 'Number must be bigger than 0';
        error = true;
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
            error = true;
        } else {
            message.value = error.response.data.error;
            error = true;
        }
        return;
    }

    // update cart number
    cart.innerHTML = parseInt(cart.innerHTML) + parseInt(currentNumber.value);

    // show success message
    message.value = response.data.success;
    error = false;
}

</script>

<template>
    <div class="col p-5">
        <img :src="`${url}/${food.image}`" class="im-size mb-3 rounded mx-auto d-block">
        <p class="fs-3">{{ food.name }}</p>
        <p>${{ food.price }}</p>
        <p class="text-break mb-4">{{ food.des }}</p>
        <input @click="add" type="button" class="add-button btn btn-primary me-3" value="Add to cart">
        <input v-model="currentNumber" type="number" class="number-input btn text-center" min="1">
        <p :class="error === true ? 'text-danger' : 'text-success'">{{ message }}</p>
    </div>
</template>
