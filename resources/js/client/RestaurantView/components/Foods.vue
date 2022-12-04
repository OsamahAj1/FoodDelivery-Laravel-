<script setup>
import { defineProps } from 'vue';
import food from './Food.vue'

let props = defineProps({
    foods: Array,
    url: String
});

</script>

<template>
    <food v-show="foods.length"
    v-for="food in foods"
    :key="food.id"
    :food="food"
    :url="url"
    />

    <p v-show="! foods.length" class="text-info text-center">No Foods</p>
</template>
