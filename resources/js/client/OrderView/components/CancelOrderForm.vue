<script setup>
import { defineProps } from 'vue';

let props = defineProps({
    destroyOrderRoute: String,
    csrf: String
});

</script>

<template>
    <form id="cancel-order-form" :action="destroyOrderRoute" class="text-center mt-4" method="post">
        <input type="hidden" name="_token" :value="csrf" />
        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
        >Cancel Order</button>
    </form>

    <h3 class="text-yellow-400 text-2xl mt-5">Warning: You can't cancel order if order got accepted.</h3>
</template>
