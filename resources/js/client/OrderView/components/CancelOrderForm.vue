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
        <input type="submit" class="btn btn-danger" value="Cancel order">
    </form>
    
    <h3 class="text-center text-warning mt-5">Warning: You can't cancel order if order got accepted.</h3>
</template>
