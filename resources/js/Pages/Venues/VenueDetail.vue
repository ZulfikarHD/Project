<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import SearchBarVenue from "@/Components/SearchBarVenue.vue";
import ItemCard from "@/Components/Card/ItemCard.vue";
import VenueScheduleCard from "@/Components/Card/VenueScheduleCard.vue";
import { Head } from "@inertiajs/vue3";
import {
    MapPin,
    Calendar,
    Clock,
    Search,
    Heart,
    ChevronRight,
    ChevronLeft,
    ChevronDown,
    ChevronUp,
} from "lucide-vue-next";

const props = defineProps({
    fields: Object,
    totalVenueImages: Number,
});

const fields = ref(props.fields[0]);
const venueImage = ref(fields.value.venue.pictures[0].image_url ?? "");
const venueImages = ref(fields.value.venue.pictures ?? "");
const totalVenueImages = ref(props.totalVenueImages ?? 0);

const carousel = ref(null);

// Scrolls the carousel to the right by the width of one card
const scrollRight = () => {
    const carouselElement = carousel.value;
    if (carouselElement) {
        const cardWidth = carouselElement.querySelector("div").offsetWidth + 24; // card width + gap (6 = 24px)
        carouselElement.scrollBy({ left: cardWidth, behavior: "smooth" });
    }
};

// Scrolls the carousel to the left by the width of one card
const scrollLeft = () => {
    const carouselElement = carousel.value;
    if (carouselElement) {
        const cardWidth = carouselElement.querySelector("div").offsetWidth + 24; // card width + gap (6 = 24px)
        carouselElement.scrollBy({ left: -cardWidth, behavior: "smooth" });
    }
};

const isAccordionOpen = ref(false);

const toggleAccordion = () => {
    isAccordionOpen.value = !isAccordionOpen.value;
};

console.log(fields);
</script>

<template>
    <AppLayout>
        <!-- Hero Image Section -->
        <div class="absolute top-0 w-full h-[30vh]">
            <img
                src=""
                alt="tools"
                class="w-full h-full object-cover rounded-lg shadow-lg"
            />
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
                    class="w-full rounded-lg h-48 lg:h-96 shadow-lg bg-slate-200 overflow-hidden"
                >
                    <img :src="venueImage" class="object-cover w-full h-full" />
                </div>

                <!-- Sub Image -->
                <div
                    v-if="totalVenueImages > 1"
                    class="md:flex gap-4 justify-between hidden"
                >
                    <template
                        v-for="venueImage in venueImages"
                        :key="venueImage.venue_picture_id"
                    >
                        <div
                            class="rounded-lg h-32 w-64 shadow-lg bg-slate-200 flex-auto"
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
                    <h1 class="font-bold text-xl text-green-600">
                        {{ fields.venue.name }}
                    </h1>

                    <!-- Venue Location -->
                    <div class="flex items-center mt-4 leading-tight">
                        <MapPin class="size-4 text-slate-600 mr-3"></MapPin>
                        <p class="text-slate-700">{{ fields.venue.address }}</p>
                    </div>

                    <!-- Venue Operation Time -->
                    <div class="flex items-center mt-2 leading-tight">
                        <Clock class="size-4 text-slate-600 mr-3"></Clock>
                        <p class="text-sm text-slate-600">
                            08.00 - 21.00 (setiap hari)
                        </p>
                    </div>

                    <!-- Venue Description -->
                    <div class="mt-4 max-w-[60ch]">
                        <p class="text-sm font-light text-slate-500">
                            {{ fields.venue.description }}
                        </p>
                    </div>
                </div>

                <!-- Available Sports -->
                <div class="flex flex-wrap gap-6 items-start">
                    <div class="flex gap-2 items-center mt-1.5">
                        <a
                            href="#"
                            class="relative border border-green-600/70 px-2 py-0.5 rounded-md overflow-clip flex gap-2"
                        >
                            <div
                                class="bg-green-500 rounded-xl -left-1 inset-y-0 h-[20px] w-[28px] z-0 ml-0.5 absolute"
                            ></div>
                            <img
                                src="/svg/soccer-ball.svg"
                                class="absolute w-4 h-4 left-0 ml-1 fill-green-50"
                            />
                            <span class="text-xs pl-6 text-green-800"
                                >Futsal</span
                            >
                        </a>
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
                class="w-full h-36 bg-slate-200 rounded-lg shadow-lg"
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

            <div class="flex gap-4 items-center mt-1.5 flex-wrap">
                <div
                    class="flex flex-wrap gap-2 bg-slate-500 px-2 py-1 rounded-md"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 fill-slate-50"
                        viewBox="0 0 31.446 31.446"
                    >
                        <path
                            d="M5.034 8.776c.149.021.34.032.554.032.959 0 1.78-.234 2.333-.757.425-.405.66-1.002.66-1.705 0-.704-.309-1.3-.769-1.662-.478-.384-1.191-.575-2.193-.575-.991 0-1.694.063-2.193.149v7.085h1.608V8.776zm0-3.378c.116-.032.339-.064.67-.064.809 0 1.267.395 1.267 1.055 0 .735-.532 1.172-1.395 1.172-.234 0-.404-.011-.543-.043l.001-2.12z"
                        />
                        <path
                            d="M1.999 13.565h8.008a1.834 1.834 0 0 0 1.834-1.834V3.722a1.834 1.834 0 0 0-1.834-1.834H1.999A1.834 1.834 0 0 0 .165 3.722v8.009c0 1.013.822 1.834 1.834 1.834zm-.385-9.734c0-.273.222-.495.495-.495h7.789c.273 0 .495.222.495.495v7.79a.496.496 0 0 1-.495.495H2.109a.495.495 0 0 1-.495-.495v-7.79zM7.592 23.151a3.202 3.202 0 0 0-3.203 3.203 3.203 3.203 0 1 0 6.406 0 3.204 3.204 0 0 0-3.203-3.203zm0 4.17c-.532 0-.968-.434-.968-.967s.436-.967.968-.967c.531 0 .966.434.966.967s-.435.967-.966.967z"
                        />
                        <path
                            d="m30.914 23.729-.525-4.262a1.568 1.568 0 0 0-1.642-1.373l-1.147.063-3.565-3.211a1.863 1.863 0 0 0-1.249-.479l-7.241-.001a7.133 7.133 0 0 0-4.468 1.573l-4.039 3.247-5.433 1.356a1.569 1.569 0 0 0-1.188 1.521v1.565a.419.419 0 0 0-.417.418v2.071c0 .295.239.534.534.534h3.067c-.013-.133-.04-.26-.04-.396a4.029 4.029 0 1 1 8.059 0c0 .137-.028.264-.041.396h8.494c-.013-.133-.04-.26-.04-.396a4.029 4.029 0 1 1 8.058 0c0 .137-.027.264-.041.396h2.861a.534.534 0 0 0 .534-.534v-1.953a.53.53 0 0 0-.531-.535zm-10.747-5.238-10.102.512 1.934-1.555a5.906 5.906 0 0 1 3.706-1.306h4.462v2.349zm1.679-.086v-2.262h.657c.228 0 .447.084.616.237l2.062 1.856-3.335.169z"
                        />
                        <path
                            d="M24.064 23.151a3.203 3.203 0 1 0 0 6.408 3.203 3.203 0 0 0 0-6.408zm0 4.17c-.532 0-.967-.434-.967-.967s.435-.967.967-.967c.531 0 .967.434.967.967s-.435.967-.967.967z"
                        />
                    </svg>
                    <span class="text-xs text-slate-50 font-light tracking-wide"
                        >Parkiran</span
                    >
                </div>

                <div class="flex gap-2 bg-slate-500 px-2 py-1 rounded-md">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 fill-slate-50 text-slate-50"
                        viewBox="0 0 60 60"
                    >
                        <path
                            fill="#f8fafc"
                            fill-rule="evenodd"
                            d="M55 34a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2a1 1 0 1 0 0-2h-1v-8h1Zm0-8H45a1 1 0 0 0-1 1v22a1 1 0 0 0 1 1h10a1 1 0 1 0 0-2h-9V28h9a1 1 0 1 0 0-2ZM5 42a1 1 0 1 0 0 2h2a1 1 0 0 0 1-1V33a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h1v8H5Zm0 8h10a1 1 0 0 0 1-1V27a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h9v20H5a1 1 0 1 0 0 2ZM20.853 7.976l3.276 1.064L29 5.491v-3.44c-3.65.364-6.724 2.701-8.147 5.925ZM31 2.051V5.49l4.884 3.545 3.263-1.059C37.724 4.752 34.65 2.415 31 2.051ZM40 12c0-.729-.083-1.438-.232-2.123l-3.269 1.061-1.88 5.894 2.011 2.634C38.691 17.633 40 14.969 40 12ZM30 22c1.826 0 3.535-.5 5.01-1.359L32.993 18h-6.015l-1.993 2.638A9.929 9.929 0 0 0 30 22Zm-4.532-11.46L27.201 16h5.584l1.746-5.475-4.53-3.289-4.533 3.304Zm-2.101 8.923 1.996-2.642-1.867-5.883-3.264-1.061A9.978 9.978 0 0 0 20 12c0 2.968 1.307 5.63 3.367 7.463ZM18 12c0-1.287.209-2.524.585-3.687l.003-.021c.003-.01.011-.017.015-.026C20.177 3.474 24.688 0 30 0c5.314 0 9.827 3.476 11.399 8.271.003.008.009.013.012.021.002.005 0 .011.002.017C41.791 9.473 42 10.712 42 12c0 3.949-1.926 7.448-4.879 9.636-.018.017-.028.041-.049.056-.027.021-.059.03-.089.047a11.915 11.915 0 0 1-13.96.005c-.03-.018-.063-.026-.091-.048-.022-.016-.033-.042-.053-.059C19.926 19.448 18 15.949 18 12Zm11 29.858v-7.716c-1.72.447-3 2-3 3.858s1.28 3.411 3 3.858Zm2-7.716v7.716c1.721-.447 3-2 3-3.858s-1.279-3.411-3-3.858ZM29 55V43.91c-2.833-.478-5-2.943-5-5.91s2.167-5.432 5-5.91V27a1 1 0 1 1 2 0v5.09c2.833.478 5 2.943 5 5.91s-2.167 5.432-5 5.91V55a1 1 0 1 1-2 0Zm31-34v34c0 2.757-2.243 5-5 5H5c-2.757 0-5-2.243-5-5V21c0-2.757 2.243-5 5-5h11a1 1 0 1 1 0 2H5c-1.654 0-3 1.346-3 3v34c0 1.654 1.346 3 3 3h50c1.654 0 3-1.346 3-3V21c0-1.654-1.346-3-3-3H44a1 1 0 1 1 0-2h11c2.757 0 5 2.243 5 5Z"
                        />
                    </svg>
                    <span class="text-xs text-slate-50 font-light tracking-wide"
                        >Rumput Sintetis</span
                    >
                </div>

                <div class="flex gap-2 bg-slate-500 px-2 py-1 rounded-md">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        id="Layer_1"
                        class="w-4 h-4 fill-slate-50"
                        data-name="Layer 1"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M22.5 21.55c-1.31 0-1.31.95-2.63.95s-1.31-.95-2.63-.95-1.31.95-2.62.95-1.32-.95-2.63-.95-1.31.95-2.62.95-1.31-.95-2.62-.95V5.32c1.31 0 1.31.95 2.62.95s1.32-.95 2.63-.95 1.31.95 2.62.95 1.31-.95 2.63-.95 1.31.95 2.62.95 1.31-.95 2.63-.95ZM.55 1.5h22.9M7.23 1.5v3.82M12 1.5v3.82M16.77 1.5v3.82M21.55 1.5v3.82M2.45 1.5v3.82M6.27 8.18v10.5M12 8.18v10.5M17.73 8.18v10.5"
                            class="cls-1"
                        />
                    </svg>
                    <span class="text-xs text-slate-50 font-light tracking-wide"
                        >Ruang Ganti</span
                    >
                </div>
            </div>
        </section>

        <!-- Jadwal Main -->
        <section
            class="max-w-6xl mx-auto mt-4 mb-6 px-4 lg:px-0 pb-6 border-b border-slate-300"
        >
            <h1 class="font-bold text-xl">Jadwal Main</h1>
            <div class="flex justify-between items-center relative mt-4">
                <button
                    @click="scrollLeft"
                    class="absolute left-0 z-10 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-slate-100 transition-colors"
                    aria-label="Scroll Left"
                >
                    <ChevronLeft class="w-6 h-6 text-slate-700"></ChevronLeft>
                </button>

                <div
                    ref="carousel"
                    class="flex gap-5 overflow-x-auto no-scrollbar scroll-smooth py-2 px-6"
                >
                    <template v-for="i in 7" :key="i">
                        <VenueScheduleCard></VenueScheduleCard>
                    </template>
                </div>

                <button
                    @click="scrollRight"
                    class="absolute right-0 z-10 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-slate-100 transition-colors"
                    aria-label="Scroll Right"
                >
                    <ChevronRight class="w-6 h-6 text-slate-700"></ChevronRight>
                </button>
            </div>
        </section>

        <!-- List Venue Section -->
        <section
            class="max-w-6xl mx-auto mt-4 mb-6 px-4 lg:px-0 pb-6 border-b border-slate-200"
        >
            <div
                class="flex justify-between gap-6 flex-wrap bg-white flex-1 rounded-lg shadow-md drop-shadow-lg overflow-hidden w-full relative p-4"
            >
                <div class="flex flex-col gap-4 w-full md:w-fit">
                    <img
                        src=""
                        alt="field Pic"
                        class="w-full min-w-0 md:min-w-96 h-48 bg-slate-400 rounded-lg shadow-lg"
                    />

                    <div class="lg:grid grid-cols-2 hidden gap-4">
                        <img
                            src=""
                            alt="field Pic"
                            class="w-48 h-24 bg-slate-400 rounded-lg shadow-lg"
                        />
                        <img
                            src=""
                            alt="field Pic"
                            class="w-48 h-24 bg-slate-400 rounded-lg shadow-lg"
                        />
                    </div>
                </div>

                <div class="flex flex-col w-full flex-1 px-4">
                    <div
                        class="pt-4 pb-6 border-b border-slate-200 flex justify-between flex-wrap gap-4"
                    >
                        <div>
                            <h1 class="font-bold text-xl"></h1>
                            <div class="mt-4 max-w-[30ch]">
                                <p
                                    class="text-sm font-light text-slate-500 line-clamp-3"
                                >
                                    Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Accusamus possimus nisi
                                    vero perspiciatis error eligendi quaerat
                                    eius quam est minus!
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 items-baseline mt-1.5">
                            <a
                                href="#"
                                class="relative border border-green-600/70 px-2 py-0.5 rounded-md overflow-clip flex gap-2"
                            >
                                <div
                                    class="bg-green-500 rounded-xl -left-1 inset-y-0 h-[20px] w-[28px] z-0 ml-0.5 absolute"
                                ></div>
                                <img
                                    src="/svg/soccer-ball.svg"
                                    class="absolute w-4 h-4 left-0 ml-1 fill-green-50"
                                />
                                <span class="text-xs pl-6 text-green-800"
                                    >Futsal</span
                                >
                            </a>

                            <a
                                href="#"
                                class="relative border border-green-600/70 px-2 py-0.5 rounded-md overflow-clip flex gap-2"
                            >
                                <div
                                    class="bg-green-500 rounded-xl -left-1 inset-y-0 h-[20px] w-[28px] z-0 ml-0.5 absolute"
                                ></div>
                                <img
                                    src="/svg/badminton.svg"
                                    class="absolute w-4 h-4 left-0 ml-1"
                                />
                                <span class="text-xs pl-6 text-green-800"
                                    >Badminton</span
                                >
                            </a>
                        </div>
                    </div>

                    <div
                        class="pt-4 pb-6 border-b border-slate-200 flex justify-between flex-wrap gap-4"
                    >
                        <h1 class="font-bold text-xl">Fasilitas</h1>
                        <div class="flex gap-4 flex-wrap">
                            <div class="flex gap-4 items-center flex-wrap">
                                <div
                                    class="flex gap-2 bg-slate-500 px-2 py-1 rounded-md"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 fill-slate-50 text-slate-50"
                                        viewBox="0 0 60 60"
                                    >
                                        <path
                                            fill="#f8fafc"
                                            fill-rule="evenodd"
                                            d="M55 34a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2a1 1 0 1 0 0-2h-1v-8h1Zm0-8H45a1 1 0 0 0-1 1v22a1 1 0 0 0 1 1h10a1 1 0 1 0 0-2h-9V28h9a1 1 0 1 0 0-2ZM5 42a1 1 0 1 0 0 2h2a1 1 0 0 0 1-1V33a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h1v8H5Zm0 8h10a1 1 0 0 0 1-1V27a1 1 0 0 0-1-1H5a1 1 0 1 0 0 2h9v20H5a1 1 0 1 0 0 2ZM20.853 7.976l3.276 1.064L29 5.491v-3.44c-3.65.364-6.724 2.701-8.147 5.925ZM31 2.051V5.49l4.884 3.545 3.263-1.059C37.724 4.752 34.65 2.415 31 2.051ZM40 12c0-.729-.083-1.438-.232-2.123l-3.269 1.061-1.88 5.894 2.011 2.634C38.691 17.633 40 14.969 40 12ZM30 22c1.826 0 3.535-.5 5.01-1.359L32.993 18h-6.015l-1.993 2.638A9.929 9.929 0 0 0 30 22Zm-4.532-11.46L27.201 16h5.584l1.746-5.475-4.53-3.289-4.533 3.304Zm-2.101 8.923 1.996-2.642-1.867-5.883-3.264-1.061A9.978 9.978 0 0 0 20 12c0 2.968 1.307 5.63 3.367 7.463ZM18 12c0-1.287.209-2.524.585-3.687l.003-.021c.003-.01.011-.017.015-.026C20.177 3.474 24.688 0 30 0c5.314 0 9.827 3.476 11.399 8.271.003.008.009.013.012.021.002.005 0 .011.002.017C41.791 9.473 42 10.712 42 12c0 3.949-1.926 7.448-4.879 9.636-.018.017-.028.041-.049.056-.027.021-.059.03-.089.047a11.915 11.915 0 0 1-13.96.005c-.03-.018-.063-.026-.091-.048-.022-.016-.033-.042-.053-.059C19.926 19.448 18 15.949 18 12Zm11 29.858v-7.716c-1.72.447-3 2-3 3.858s1.28 3.411 3 3.858Zm2-7.716v7.716c1.721-.447 3-2 3-3.858s-1.279-3.411-3-3.858ZM29 55V43.91c-2.833-.478-5-2.943-5-5.91s2.167-5.432 5-5.91V27a1 1 0 1 1 2 0v5.09c2.833.478 5 2.943 5 5.91s-2.167 5.432-5 5.91V55a1 1 0 1 1-2 0Zm31-34v34c0 2.757-2.243 5-5 5H5c-2.757 0-5-2.243-5-5V21c0-2.757 2.243-5 5-5h11a1 1 0 1 1 0 2H5c-1.654 0-3 1.346-3 3v34c0 1.654 1.346 3 3 3h50c1.654 0 3-1.346 3-3V21c0-1.654-1.346-3-3-3H44a1 1 0 1 1 0-2h11c2.757 0 5 2.243 5 5Z"
                                        />
                                    </svg>
                                    <span
                                        class="text-xs text-slate-50 font-light tracking-wide"
                                        >Rumput Sintetis</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="pt-4 pb-6 border-b border-slate-200 flex flex-col flex-wrap gap-4"
                    >
                        <div class="flex justify-between gap-4 flex-wrap">
                            <h1 class="font-bold text-xl">Waktu Main</h1>
                            <button
                                @click="toggleAccordion"
                                class="text-blue-500 flex items-center gap-1"
                            >
                                <span>Lihat Jadwal</span>
                                <ChevronDown
                                    v-if="!isAccordionOpen"
                                    class="w-4 h-4"
                                />
                                <ChevronUp
                                    v-if="isAccordionOpen"
                                    class="w-4 h-4"
                                />
                            </button>
                        </div>

                        <transition
                            enter-active-class="transition-all duration-300 ease-in-out"
                            leave-active-class="transition-all duration-300 ease-in-out"
                            enter-from-class="max-h-0 opacity-0"
                            enter-to-class="max-h-screen opacity-100"
                            leave-from-class="max-h-screen opacity-100"
                            leave-to-class="max-h-0 opacity-0"
                        >
                            <div
                                v-if="isAccordionOpen"
                                class="mt-4 overflow-hidden"
                            >
                                <div
                                    class="flex justify-between gap-4 flex-wrap"
                                >
                                    <input
                                        type="date"
                                        class="border-slate-300 border-t-0 border-x-0 border-b p-2 focus:outline-none focus:ring-0 focus:ring-green-500 text-sm"
                                        :value="
                                            new Date()
                                                .toISOString()
                                                .substr(0, 10)
                                        "
                                    />
                                </div>

                                <div
                                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mt-4"
                                >
                                    <template v-for="i in 12" :key="i">
                                        <button
                                            class="rounded-lg px-4 py-2 border border-blue-800 shadow hover:bg-blue-100 transition-colors duration-200"
                                        >
                                            <p
                                                class="text-xs text-blue-900 font-semibold"
                                            >
                                                {{ 7 + i }}:00 - {{ 8 + i }}:00
                                            </p>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <div
                        class="pt-4 pb-6 border-b border-slate-200 flex justify-between flex-wrap gap-4"
                    >
                        <div class="flex justify-end w-full flex-wrap gap-4">
                            <button
                                class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition-colors duration-200"
                            >
                                Prosess
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
