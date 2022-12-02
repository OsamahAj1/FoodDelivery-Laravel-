<script setup>
import { defineProps } from 'vue';
import Food from './Food.vue'

let props = defineProps({
    foods: Object,
});

</script>

<template>
    <Food v-show="foods.length"
    v-for="food in foods"
    :key="food.id"
    :food="food"
    />

    <p v-show="! foods.length" class="text-info text-center">No Foods</p>
</template>
