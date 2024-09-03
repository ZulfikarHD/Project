<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SearchBarVenue from "@/Components/SearchBarVenue.vue";
import VenueCard from "@/Components/Card/VenueCard.vue";
import { Head } from "@inertiajs/vue3";

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <!-- Hero Image Section -->
        <div class="absolute top-0 w-full h-[50vh]">
            <img src="" alt="tools" class="w-full h-full object-cover" />
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
                <h2 class="text-2xl font-semibold text-slate-800 mb-4">
                    Rekomendasi Venue
                </h2>
                <!-- Scrollable Container -->
                <div
                    class="flex overflow-x-auto no-scrollbar gap-4 sm:gap-8 py-4 scroll-smooth rounded-lg"
                >
                    <template v-for="i in 8" :key="i">
                       <VenueCard></VenueCard>
                    </template>
                </div>
            </div>
        </section>

        <!-- List Venue -->
        <section class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-10">
                <h2 class="text-2xl font-semibold text-slate-800 mb-4">
                    List Venue
                </h2>
                <!-- Scrollable Container -->
                <div
                    class="flex no-scrollbar gap-8 sm:gap-8 py-4 scroll-smooth rounded-lg flex-wrap justify-between"
                >
                    <template v-for="i in 8" :key="i">
                        <a
                            href="#"
                            class="flex-shrink-0 bg-white rounded-lg shadow-lg overflow-hidden min-w-[12rem] sm:min-w-[16rem] relative hover:scale-105 transition transform ease-in-out duration-200"
                        >
                            <img
                                src=""
                                alt="venueimg"
                                class="w-full h-32 sm:h-48 object-cover"
                            />
                            <div
                                class="absolute top-0 left-0 bg-green-600 text-green-50 px-2 py-1 rounded-br-lg font-light text-xs flex items-center gap-1"
                            >
                                <Heart class="w-4 h-4" />
                                Karawang
                            </div>
                            <div class="p-4">
                                <h3
                                    class="text-lg font-semibold text-slate-600 brightness-95"
                                >
                                    Sehat Futsal
                                </h3>
                                <p
                                    class="text-green-700 brightness-110 text-lg mt-0.5"
                                >
                                    Rp 100.000
                                </p>
                                <p class="text-slate-400 text-xs">Per-Sesi</p>
                                <div
                                    class="flex justify-start mt-4 gap-2 items-center"
                                >
                                    <img src="" alt="user" class="size-5" />
                                    <p class="text-green-700 brightness-110">
                                        3
                                    </p>
                                    <p class="text-slate-400 text-xs -ml-1">
                                        Lapangan
                                    </p>
                                </div>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
