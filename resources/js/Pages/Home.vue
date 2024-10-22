<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SearchBarVenue from "@/Components/SearchBarVenue.vue";
import VenueCard from "@/Components/Card/VenueCard.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    venues : Object,
    recVenues : Object,
});

const venues = ref(props.venues);
const recVenues = ref(props.recVenues);
console.log(venues);
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <!-- Hero Image Section -->
        <div class="absolute top-0 w-full h-[50vh]">
            <img src="/storage/images/hero-image.jpg" alt="tools" class="w-full h-full object-cover" />
        </div>

        <!-- Hero Image Overlay -->
        <div
            class="absolute top-0 w-full h-[50vh] bg-black bg-opacity-60"
        ></div>

        <!-- Search Lapangan -->
        <div
            class="relative z-10 mt-[30vh] container mx-auto px-4 sm:px-6 lg:px-8"
        >
            <!-- Slogan -->
            <h1
                class="text-2xl sm:text-4xl font-bold text-center text-green-50"
            >
                Satu Platform Untuk Solusi Olahragamu
            </h1>

            <!-- Card Search -->
             <SearchBarVenue></SearchBarVenue>
        </div>

        <!-- Kategori Olahraga -->
        <section class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-14">
                <div
                    class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4"
                >
                    <template v-for="i in 8" :key="i">
                        <div>
                            <div
                                class="flex flex-col gap-2 justify-center items-center mx-auto cursor-pointer hover:scale-105 transition transform ease-in-out duration-200"
                            >
                                <img
                                    src=""
                                    alt="kategori-icon"
                                    class="relative h-8 w-8"
                                />
                                <h1 class="text-center">Kategori {{ i }}</h1>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- Rekomendasi Venue -->
        <section class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-10">
                <h2 class="text-3xl font-bold text-green-600 mb-6 text-center">
                    Rekomendasi Venue
                </h2>
                <!-- Scrollable Container -->
                <div
                    class="flex overflow-x-auto no-scrollbar gap-4 py-4 scroll-smooth rounded-lg"
                >
                    <template v-for="recVenue in recVenues" :key="'reccomend' + recVenue.venue_id">
                       <VenueCard :venueProps="recVenue" class="flex-shrink-0 w-56 sm:w-64 transition-transform transform hover:scale-105" />
                    </template>
                </div>
            </div>
        </section>

        <!-- List Venue -->
        <section class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-10">
                <h2 class="text-3xl font-bold text-green-600 mb-6 text-center">
                    List Venue
                </h2>
                <!-- Scrollable Container -->
                <div
                    class="flex no-scrollbar gap-4 py-4 scroll-smooth rounded-lg flex-wrap justify-center"
                >
                    <template v-for="venue in venues" :key="'list' + venue.venue_id">
                       <VenueCard :venueProps="venue" class="flex-shrink-0 w-56 sm:w-64 transition-transform transform hover:scale-105" />
                    </template>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
