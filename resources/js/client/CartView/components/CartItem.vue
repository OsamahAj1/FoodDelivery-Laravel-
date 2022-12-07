<script setup>
import { defineProps, defineEmits, ref } from 'vue';

let props = defineProps({
    cart: Object,
    url: String
});

const emit = defineEmits(['update', 'remove']);

let currentNumber = ref(props.cart.number);
let sum_price = ref(props.cart.sum_price);
let message = ref('');
let disabled = ref(false);

let sum_cart = document.querySelector('#cart');

async function update() {

    // check for errors
    if (currentNumber.value == '' || currentNumber.value <= 0) {
        message.value = 'Number must be bigger than 0';
        return;
    }

    // post request to api to update n
    let response;
    try {
        response = await window.axios.post(`/api/cart/update/${props.cart.id}/${currentNumber.value}`);
    } catch (error) {
        // if there is error display it

        if (error.response.status == 404) {
            message.value = 'Number must be bigger than 0';
        } else {
            message.value = error.response.data.error;
        }
        return;
    }

    message.value = '';

    // update sum price and sum cart and cart count
    sum_price.value = response.data.sum_price;
    emit('update', response.data.sum_cart);
    sum_cart.innerHTML = response.data.cart_count;
}

async function remove() {

    disabled.value = true;

    // post request to API to delete cart item
    let response;
    try {
        response = await window.axios.post(`/api/cart/destroy/${props.cart.id}`);
    } catch (error) {
        // if there is error display it

        if (error.response.status == 404) {
            message.value = 'error removing item';
        } else {
            message.value = error.response.data.error;
        }
        return;
    }

    message.value = '';

    // update sum cart and remove item
    emit('remove', props.cart.id, response.data.sum_cart);
    sum_cart.innerHTML = response.data.cart_count;

}
</script>

<template>

    <div :id="`cart-item-${cart.id}`" class="cart-item grid grid-cols-6 gap-x-14  justify-items-center">

        <img :src="`${url}/${cart.food.image}`" class="object-contain h-40 w-40">

        <div class="mt-12">{{ cart.food.name }}</div>

        <div class="mt-12">{{ cart.food.price }}</div>

        <div class="mt-12">${{ sum_price }}</div>

        <div class="mt-12">
            <input
            v-model="currentNumber"
            @input="update"
            type="number"
            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg text-sm text-center px-2 py-2.5 mr-2 mb-2 w-16"
            min="1" required>
        </div>

        <div class="mt-12">
            <button
            @click="remove"
            class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 disabled:cursor-not-allowed"
            :disabled="disabled"
            >Remove</button>
        </div>

    </div>

    <p class="text-red-500">{{ message }}</p>

    <!-- <div :id="`cart-item-${cart.id}`" class="cart-item row mb-4">

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <img :src="`${url}/${cart.food.image}`" class="im-size">
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>{{ cart.food.name }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>${{ cart.food.price }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>${{ sum_price }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <div>
                <input type="number" class="update-number-input btn text-center" min="1"
                v-model="currentNumber"
                @input="update"
                >
            </div>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <div>
                <input @click="remove" type="button" class="remove-button btn btn-danger" value="Remove">
            </div>
        </div>
    </div> -->

</template>
