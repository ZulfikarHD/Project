<script setup>
// Import Lucide icons
import { MapPin, Calendar, Clock, Search, Heart } from "lucide-vue-next";

</script>

<template>
    <div class="mt-8 flex justify-center">
        <div
            class="bg-white rounded-lg shadow-lg py-4 px-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4 w-full max-w-6xl"
        >
            <!-- Location Input -->
            <div class="flex items-center space-x-2">
                <MapPin class="size-6 text-green-500" />
                <div class="w-full">
                    <p class="text-slate-600">Lokasi Lapangan</p>
                    <select
                        class="w-full border-none text-green-500 focus:ring-0 -ml-2.5 -mt-1.5 bg-inherit"
                    >
                        <option value="karawang">Karawang</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="surabaya">Surabaya</option>
                    </select>
                </div>
            </div>

            <!-- Date Input -->
            <div class="flex items-center space-x-2">
                <Calendar class="size-6 text-green-500" />
                <div class="w-full">
                    <p class="text-slate-600">Tanggal Main</p>
                    <input
                        type="date"
                        class="w-full border-none text-green-500 focus:ring-0 -ml-2.5 -mt-1.5 bg-inherit"
                        value="2024-05-24"
                    />
                </div>
            </div>

            <!-- Time Input -->
            <div class="flex items-center space-x-2">
                <Clock class="size-6 text-green-500" />
                <div class="w-full">
                    <p class="text-slate-600">Waktu Main</p>
                    <input
                        type="time"
                        class="w-full border-none text-green-500 focus:ring-0 -ml-2.5 -mt-1.5 bg-inherit"
                        value="08:00"
                    />
                </div>
            </div>

            <!-- Search Button -->
            <button
                class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition ease-in-out duration-200 active:ring-2 active:ring-green-600"
            >
                <Search class="size-6" />
            </button>
        </div>
    </div>
</template>
