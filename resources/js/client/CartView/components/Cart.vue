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
        <div class="grid grid-cols-1 gap-y-14  justify-items-center p-5">

            <cart-item
            v-for="cart in cartItems" :key="cart.id"
            :cart="cart"
            :url="url"
            @update="(sum) => sum_cart = sum"
            @remove="remove"
            />
        </div>

        <form class="text-center p-4" :action="placeRoute" method="post">
            <input type="hidden" name="_token" :value="csrf" />
            <button
            type="submit"
            class="px-5 py-2.5 text-blue-500 text-lg hover:text-white border border-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center"
            >Preview Order</button>
        </form>

        <h3 class="text-4xl text-center mt-5 pb-20">${{ sum_cart }}</h3>

    </div>

    <h3 v-else class="text-center text-4xl text-sky-400 mt-10">
        Cart is empty go to
        <a class="underline text-blue-700 hover:text-blue-500" :href="indexRoute">home page</a>
        to add items.
        </h3>
</template>
