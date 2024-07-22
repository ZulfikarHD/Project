<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ItemCard from "@/Components/Card/ItemCard.vue";
import { Head } from "@inertiajs/vue3";
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
            <div class="mt-8 flex justify-center">
                <div
                    class="bg-white rounded-lg shadow-lg py-4 px-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4 w-full max-w-6xl"
                >
                    <div class="flex items-center space-x-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
                            />
                        </svg>
                        <div>
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
                    <div class="flex items-center space-x-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"
                            />
                        </svg>
                        <div>
                            <p class="text-slate-600">Tanggal Main</p>
                            <input
                                type="date"
                                class="w-full border-none text-green-500 focus:ring-0 -ml-2.5 -mt-1.5 bg-inherit"
                                value="2024-05-24"
                            />
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                            />
                        </svg>
                        <div>
                            <p class="text-slate-600">Waktu Main</p>
                            <input
                                type="time"
                                class="w-full border-none text-green-500 focus:ring-0 -ml-2.5 -mt-1.5 bg-inherit"
                                value="08:00"
                            />
                        </div>
                    </div>
                    <button
                        class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition ease-in-out duration-200 active:ring-2 active:ring-green-600"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-6"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Venue Overview Section -->
        <div class="max-w-6xl flex flex-col gap-4 mx-auto mt-14 px-4 lg:px-0">
            <!-- Main Image -->
            <div class="w-full rounded-lg h-48 lg:h-96 shadow drop-shadow bg-slate-200">

            </div>

            <!-- Sub Image -->
            <div class="flex gap-4">

            </div>
        </div>
    </AppLayout>
</template>
