<template>

    <nav class="relative flex justify-center">
        <template v-for="link in pagination.links" :key="link.label">


        <Link
        preserve-scroll
        :href="link.url"
          v-html="link.label"
          class="flex item-center justify-center px-2 py-2 rounded-lg text-gray-600"
           :class="{'bg-gray-400':link.active,'!text-gray-400':!link.url}"
           ></Link>
    </template>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    pagination: Object
     });
</script>


