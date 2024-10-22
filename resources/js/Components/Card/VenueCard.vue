<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { MapPin } from "lucide-vue-next";

const props = defineProps({
    venueProps : Object,
});
const venueProps = ref(props.venueProps);

</script>
<template>
    <Link
        :href='"/venue-details/" + venueProps.venue_id'
        class="bg-white w-64 h-80 sm:w-72 sm:h-96 rounded-lg shadow-lg overflow-hidden relative hover:scale-105 transition-transform duration-200 ease-in-out transform hover:shadow-xl"
    >
        <img
            :src="venueProps.pictures[0].image_url"
            alt="venueimg"
            class="w-full h-32 sm:h-48 object-cover rounded-t-lg transition-transform duration-300 ease-in-out hover:scale-105"
        />
        <div
            class="absolute top-0 left-0 bg-green-600 text-green-50 px-3 py-2 rounded-br-lg font-medium text-xs flex items-center gap-1 shadow-md"
        >
            <MapPin class="w-4 h-4" />
            {{ venueProps.address }}
        </div>
        <div class="p-4">
            <h3 class="text-lg font-semibold text-slate-800 hover:text-green-600 transition-colors duration-200">
                {{ venueProps.address }}
            </h3>
            <p class="text-green-700 text-lg mt-0.5 font-bold">
                {{ venueProps.starting_price[0].price }}
            </p>
            <p class="text-slate-500 text-xs">Per-Sesi</p>
            <div class="flex justify-start mt-4 gap-2 items-center">
                <img src="" alt="user" class="w-5 h-5 rounded-full border border-green-600" />
                <p class="text-green-700 font-semibold">3</p>
                <p class="text-slate-500 text-xs -ml-1">Lapangan</p>
            </div>
        </div>
    </Link>
</template>
