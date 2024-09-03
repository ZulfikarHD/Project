<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Link
        href="/venue-details"
        class="bg-white flex-1 rounded-lg shadow-lg overflow-hidden min-w-[12rem] sm:min-w-[16rem] relative hover:scale-105 transition transform ease-in-out duration-200"
    >
        <img
            src=""
            alt="venueimg"
            class="w-full h-32 sm:h-48 object-cover rounded-lg"
        />
        <div
            class="absolute top-0 left-0 bg-green-600 text-green-50 px-2 py-1 rounded-br-lg font-light text-xs flex items-center gap-1"
        >
            <MapPin class="w-4 h-4" />
            Karawang
        </div>
        <div class="p-4">
            <h3 class="text-lg font-semibold text-slate-600 brightness-95">
                Sehat Futsal
            </h3>
            <p class="text-green-700 brightness-110 text-lg mt-0.5">
                Rp 100.000
            </p>
            <p class="text-slate-400 text-xs">Per-Sesi</p>
            <div class="flex justify-start mt-4 gap-2 items-center">
                <img src="" alt="user" class="size-5" />
                <p class="text-green-700 brightness-110">3</p>
                <p class="text-slate-400 text-xs -ml-1">Lapangan</p>
            </div>
        </div>
    </Link>
</template>
