<script setup>
import { defineProps, ref } from 'vue';

let props = defineProps({
    order: Object,
    url: String,
    delivery: Object
});

let message = ref('');

let disabled = ref(false);

async function accept() {

    disabled.value = true;

    // send delivery info to client
    let data = {
        'order_id': parseInt(props.order.id),
        'del_id': props.delivery.id,
        'del_name': props.delivery.name,
        'del_img': props.delivery.image,
        'del_car': props.delivery.car,
        'del_number': props.delivery.number,
    }

    let response;
    try {
        response = await window.axios.post('/api/acceptOrder', { data: JSON.stringify(data) });
    } catch (error) {
        message.value = error.response.data.error;
        return;
    }

    // send to restaurant
    let restaurant_data = {
        'res_id': parseInt(props.order.restaurant.id),
        'order_id': parseInt(props.order.id),
        'del_name': props.delivery.name,
        'order_order': props.order.order,
        'sum_order': `$${props.order.sum_order}`,
    };

    response = await window.axios.post('/api/sendToRestaurant', { data: JSON.stringify(restaurant_data) });

    window.location.replace('/delivery/order');

}
</script>


<template>
    <div class="row order-row">
        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <img class="im-size" :src="`${url}/${order.restaurant.image}`">
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>{{ order.restaurant.name }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p class="text-break">
                <span class="text-info">
                FROM:
                </span>{{ order.restaurant.address }}.
                <span class="text-info">
                TO:
                </span> {{ order.client.address }}
            </p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p class="text-break">{{ order.order }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <p>${{ order.sum_order }}</p>
        </div>

        <div class="col col-lg-2 col-sm-auto col-xs-auto">
            <button @click="accept" type="submit" class="btn btn-success" :disabled="disabled">Accept</button>
            <span class="text-danger ms-3 fs-3">{{ message }}</span>
        </div>
    </div>

</template>
