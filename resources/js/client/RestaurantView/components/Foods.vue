<script setup>
import { defineProps } from 'vue';
import Food from './Food.vue'

let props = defineProps({
    foods: Object,
    url: String
});

</script>

<template>
    <Food v-show="foods.length"
    v-for="food in foods"
    :key="food.id"
    :food="food"
    :url="url"
    />

    <p v-show="! foods.length" class="text-info text-center">No Foods</p>
</template>
