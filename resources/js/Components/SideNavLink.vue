<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-2 rounded-md shadow-md shadow-lime-600/25 w-full py-2 font-medium  leading-5 text-lime-50  bg-gradient-to-r from-lime-600 to-lime-400 transition duration-150 ease-in-out'
        : 'inline-flex hover:bg-gray-100 items-center px-2 font-light rounded w-full py-2 leading-5 text-slate-800 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <li>
        <Link :href="href" :class="classes">
        <slot />
        </Link>
    </li>
</template>
