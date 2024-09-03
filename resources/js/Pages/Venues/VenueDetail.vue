<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SearchBarVenue from "@/Components/SearchBarVenue.vue";
import ItemCard from "@/Components/Card/ItemCard.vue";
import VenueScheduleCard from "@/Components/Card/VenueScheduleCard.vue";
import { Head } from "@inertiajs/vue3";
import { MapPin, Calendar, Clock, Search, Heart } from "lucide-vue-next";

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.12085),
        zoom: 5,
    };
    var map = new google.maps.Map(
        document.getElementById("lokasiVenue"),
        mapProp
    );
}
</script>

<template>
    <AppLayout>
        <!-- Hero Image Section -->
        <div class="absolute top-0 w-full h-[30vh]">
            <img src="" alt="tools" class="w-full h-full object-cover" />
        </div>

        <!-- Hero Image Overlay -->
        <div
            class="absolute top-0 w-full h-[30vh] bg-black bg-opacity-60"
        ></div>

        <!-- Search Lapangan -->
        <div
            class="relative z-10 mt-[15vh] container mx-auto px-4 sm:px-6 lg:px-8"
        >
            <!-- Card Search -->
            <SearchBarVenue></SearchBarVenue>
        </div>

        <!-- Venue image -->
        <section>
            <div
                class="max-w-6xl flex flex-col gap-6 mx-auto mt-14 px-4 lg:px-0 pb-16"
            >
                <!-- Main Image -->
                <div
                    class="w-full rounded-lg h-48 lg:h-96 shadow drop-shadow bg-slate-200"
                ></div>

                <!-- Sub Image -->
                <div class="md:flex gap-4 justify-between hidden">
                    <template v-for="i in 4" :key="i">
                        <div
                            class="rounded-lg h-32 w-64 shadow drop-shadow bg-slate-200 flex-auto"
                        ></div>
                    </template>
                </div>
            </div>
        </section>

        <!-- venue Description -->
        <section
            class="max-w-6xl flex flex-col gap-6 mx-auto mt-4 px-4 lg:px-0 pb-4 border-b border-slate-300"
        >
            <div class="flex justify-between gap-4 flex-wrap">
                <!-- Venue Description -->
                <div>
                    <!-- Venue Name -->
                    <h1 class="font-bold text-xl">Sehat Sport</h1>

                    <!-- Venue Location -->
                    <div class="flex items-center mt-4 leading-tight">
                        <MapPin class="size-4 text-slate-600 mr-3"></MapPin>
                        <p>Jawa Barat,Indonesia</p>
                    </div>

                    <!-- Venue Operation Time -->
                    <div class="flex items-center mt-2 leading-tight">
                        <Clock class="size-4 text-slate-600 mr-3"></Clock>
                        <p class="text-sm">08.00 - 21.00 (setiap hari)</p>
                    </div>

                    <!-- Venue Description -->
                    <div class="mt-4 max-w-[60ch]">
                        <p class="text-sm font-light text-slate-500">
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Accusamus possimus nisi vero perspiciatis
                            error eligendi quaerat eius quam est minus!
                        </p>
                    </div>
                </div>

                <!-- Available Sports -->
                <div class="flex flex-wrap gap-6 items-start">
                    <!-- {{-- List Lapangan --}} -->
                    <div class="flex gap-2 items-center mt-1.5">
                        <!-- {{-- Futsal --}} -->
                        <div
                            class="relative border border-green-600/70 px-2 py-0.5 rounded-md overflow-clip flex gap-2"
                        >
                            <div
                                class="bg-green-500 rounded-xl -left-1 inset-y-0 h-[20px] w-[28px] z-0 ml-0.5 absolute"
                            ></div>
                            <img
                                src="{{ asset('svg/soccer-ball.svg') }}"
                                class="absolute w-4 h-4 left-0 ml-1"
                            />
                            <span class="text-xs pl-6 text-green-800"
                                >Futsal</span
                            >
                        </div>

                        <!-- {{-- Badminton --}} -->
                        <div
                            class="relative border border-green-600/70 px-2 py-0.5 rounded-md overflow-clip flex gap-2"
                        >
                            <div
                                class="bg-green-500 rounded-xl -left-1 inset-y-0 h-[20px] w-[28px] z-0 ml-0.5 absolute"
                            ></div>
                            <img
                                src="{{ asset('svg/badminton.svg') }}"
                                class="absolute w-4 h-4 left-0 ml-1"
                            />
                            <span class="text-xs pl-6 text-green-800"
                                >Badminton</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lokasi Section -->
        <section
            class="max-w-6xl flex flex-col gap-6 mx-auto mt-4 px-4 lg:px-0 pb-4 border-b border-slate-300"
        >
            <h1 class="font-bold text-xl">Lokasi</h1>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.1706346242454!2d106.79939089839479!3d-6.2186488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d30079f01%3A0x2e74f2341fff266d!2sGelora%20Bung%20Karno%20Main%20Stadium!5e0!3m2!1sen!2sid!4v1711879663078!5m2!1sen!2sid"
                class="w-full h-36 bg-slate-200 rounded-lg shadow drop-shadow"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </section>

        <!-- Facility Section -->
        <section
            class="max-w-6xl flex flex-col gap-6 mx-auto mt-4 px-4 lg:px-0 pb-4 border-b border-slate-300"
        >
            <h1 class="font-bold text-xl">Fasilitas</h1>
            <div class="flex gap-4 flex-wrap">
                <!-- this is where list of facility icon and name placed -->
            </div>
        </section>

        <!-- Jadwal Main -->
        <section
            class="max-w-6xl flex flex-col gap-6 mx-auto mt-4 px-4 lg:px-0 pb-4 border-b border-slate-300 overflow-x-clip"
        >
            <div class="flex justify-between w-full px-4">
                <VenueScheduleCard></VenueScheduleCard>
                <VenueScheduleCard></VenueScheduleCard>
                <VenueScheduleCard></VenueScheduleCard>
                <VenueScheduleCard></VenueScheduleCard>
                <VenueScheduleCard></VenueScheduleCard>
                <VenueScheduleCard></VenueScheduleCard>
                <VenueScheduleCard></VenueScheduleCard>
            </div>
        </section>
    </AppLayout>
</template>
