<script setup>
import { defineProps } from 'vue';
import food from './Food.vue'

let props = defineProps({
    foods: Array,
    url: String
});

</script>

<template>
    <div
    class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-14  justify-items-center p-5">

        <food v-show="foods.length"
        v-for="food in foods"
        :key="food.id"
        :food="food"
        :url="url"
        />

    </div>

    <p v-show="! foods.length" class="text-cyan-300 text-3xl">No Foods</p>
</template>
