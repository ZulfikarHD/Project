<script setup>
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Navigation" />

    <div class="container mx-auto z-50">
        <div class="flex justify-between items-center py-6">
            <!-- Logo -->
            <div class="logo">
                <img alt="logo">
            </div>

            <!-- Link -->
            <div class="flex justify-center gap-6 items-center">
                <Link href="/">Home</Link>
                <Link href="/game">Game</Link>
                <Link href="/find-venue">Lapangan</Link>
            </div>

            <!-- Button -->
            <div class="flex justify-center gap-6 items-center">
                <Link href="/login">Masuk</Link>
                <Link href="/register" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition ease-in-out duration-200 active:ring-2 active:ring-green-600">Daftar</Link>
            </div>
        </div>
    </div>
</template>
bb
