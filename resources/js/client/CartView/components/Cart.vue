<script setup>
import { defineProps, ref } from 'vue';
import CartItem from './CartItem.vue';

let props = defineProps({
    carts: Array,
    sum: Number,
    indexRoute: String,
    placeRoute: String,
    url: String,
    csrf: String
});

let sum_cart = ref(props.sum);
let cartItems = ref(props.carts);

function remove(id, sum) {

    const cart_item = document.querySelector(`#cart-item-${id}`);

    // play remove animation
    cart_item.style.animationPlayState = 'running';

    // when animation played
    cart_item.addEventListener('animationend', () => {
        _.remove(cartItems.value, (cart) => cart.id == id);
        sum_cart.value = sum;
    });
}

</script>

<template>
    <div v-if="cartItems.length">

            <cart-item
            v-for="cart in cartItems" :key="cart.id"
            :cart="cart"
            :url="url"
            @update="(sum) => sum_cart = sum"
            @remove="remove"
            />

            <form class="text-center mb-5 p-4" :action="placeRoute" method="post">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="submit" class="btn btn-outline-primary btn-lg" value="Preview Order">
            </form>

        <h3 class="text-center mt-5">${{ sum_cart }}</h3>
    </div>

    <h3 v-else class="text-center text-info">Cart is empty go to <a :href="indexRoute">home page</a> to add items.</h3>
</template>
