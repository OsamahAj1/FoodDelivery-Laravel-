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

    <div>
        <p class="text-danger">{{ message }}</p>
    </div>

    <div :id="`cart-item-${cart.id}`" class="cart-item row mb-4">

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
    </div>

</template>
