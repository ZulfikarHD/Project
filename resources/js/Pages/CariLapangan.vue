<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ItemCard from "@/Components/Card/ItemCard.vue"
import { Head } from "@inertiajs/vue3";
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
        <div class="relative z-10 mt-[30vh] container mx-auto px-4 sm:px-6 lg:px-8">

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

        <!-- Kategori Olahraga -->
        <section class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-14">
                <div
                    class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4"
                >
                    <template v-for="i in 8" :key="i">
                        <ItemCard>
                            <div
                                class="flex flex-col gap-2 justify-center items-center mx-auto cursor-pointer"
                            >
                                <img
                                    src=""
                                    alt="bola.svg"
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
                    class="flex flex-wrap gap-4 sm:gap-8 py-4 scroll-smooth rounded-lg"
                >
                    <template v-for="i in 20" :key="i">
                        <a
                            href="#"
                            class="bg-white rounded-lg shadow-lg overflow-hidden min-w-[12rem] sm:min-w-[16rem] relative"
                        >
                            <img
                                src=""
                                alt="venueimg"
                                class="w-full h-32 sm:h-48 object-cover rounded-lg"
                            />
                            <div
                                class="absolute top-0 left-0 bg-green-600 text-green-50 px-2 py-1 rounded-br-lg font-light text-xs flex items-center gap-1"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="inline-block w-4 h-4"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
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
