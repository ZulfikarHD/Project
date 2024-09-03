<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ItemCard from "@/Components/Card/ItemCard.vue";
import VenueCard from "@/Components/Card/VenueCard.vue";
import SearchBarVenue from "@/Components/SearchBarVenue.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Cari Lapangan" />

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
            class="relative z-10 mt-[35vh] container mx-auto px-4 sm:px-6 lg:px-8"
        >
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
                        <ItemCard>
                            <div
                                class="flex flex-col gap-2 justify-center items-center mx-auto cursor-pointer hover:scale-105 transition transform ease-in-out duration-200"
                            >
                                <img
                                    src=""
                                    alt="kategori-icon"
                                    class="relative h-8 w-8"
                                />
                                <h1>Kategori {{ i }}</h1>
                            </div>
                        </ItemCard>
                    </template>
                </div>
            </div>
        </section>

        <!-- Lapangan Terkait -->
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="mt-10">
                <h2 class="text-2xl font-semibold text-slate-800 mb-4">
                    Lapangan Terkait
                </h2>
                <div
                    class="flex flex-wrap gap-4 lg:gap-6 py-4 scroll-smooth rounded-lg justify-between"
                >
                    <template v-for="i in 20" :key="i">
                        <VenueCard></VenueCard>
                    </template>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
