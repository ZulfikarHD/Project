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
        <!-- Venue Image -->
        <img
            :src="venueProps.images[0].image_url"
            alt="venueimg"
            class="w-full h-32 sm:h-48 object-cover rounded-t-lg transition-transform duration-300 ease-in-out hover:scale-105"
        />

        <!-- Address Badge -->
        <div
            class="absolute top-0 left-0 bg-green-600 text-green-50 px-3 py-1.5 rounded-br-lg font-medium text-xs flex items-center gap-1 shadow-md"
        >
            <MapPin class="w-4 h-4" />
            <span class="truncate">{{ venueProps.address }}</span>
        </div>

        <!-- Card Content -->
        <div class="p-4 space-y-2">
            <!-- Title -->
            <h3 class="text-base font-medium text-slate-800 hover:text-green-600 transition-colors duration-200 truncate">
                {{ venueProps.name }}
            </h3>

            <!-- Price -->
            <p class="text-xl font-bold text-green-700">
                {{ venueProps.starting_price[0].price }}
            </p>
            <p class="text-slate-500 text-sm">Per-Sesi</p>

            <!-- Venue Details -->
            <div class="flex items-center gap-2 mt-3">
                <img src="" alt="user" class="w-6 h-6 rounded-full border border-green-600" />
                <p class="text-green-700 font-medium">3</p>
                <p class="text-slate-500 text-sm">Lapangan</p>
            </div>
        </div>
    </Link>
</template>


