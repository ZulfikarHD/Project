<script setup>
import { ref } from "vue";

// Reference to the carousel
const carousel = ref(null);

// Scroll Left function
const scrollLeft = () => {
    carousel.value.scrollBy({
        left: -300, // Adjust the amount to scroll
        behavior: "smooth",
    });
};

// Scroll Right function
const scrollRight = () => {
    carousel.value.scrollBy({
        left: 300, // Adjust the amount to scroll
        behavior: "smooth",
    });
};
</script>

<template>
    <section
        class="max-w-6xl mx-auto mt-4 px-4 lg:px-0 pb-4 border-b border-slate-300"
    >
        <!-- Carousel Container -->
        <div class="flex justify-between items-center relative">
            <!-- Left Arrow -->
            <button
                @click="scrollLeft"
                class="absolute left-0 z-10 -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-slate-100 transition-colors"
                aria-label="Scroll Left"
            >
                <lucide-icon
                    name="chevron-left"
                    class="w-6 h-6 text-slate-700"
                ></lucide-icon>
            </button>

            <!-- Carousel Wrapper -->
            <div
                ref="carousel"
                class="flex gap-6 overflow-x-auto no-scrollbar scroll-smooth"
            >
                <template v-for="i in 7" :key="i">
                    <div
                        class="bg-white flex-shrink-0 rounded-lg shadow-lg drop-shadow-lg overflow-hidden min-w-[12rem] sm:min-w-[16rem] relative hover:scale-105 transition-transform duration-300 px-4 py-2"
                    >
                        <div class="flex flex-col justify-center items-center">
                            <h4 class="font-medium text-slate-700">
                                Senin, 06 Mei 2024
                            </h4>
                            <p class="text-sm text-center text-slate-600">
                                Rp.
                                <span
                                    class="text-green-600 font-semibold text-base"
                                    >175.000</span
                                >
                                <br />Per-Sesi
                            </p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Right Arrow -->
            <button
                @click="scrollRight"
                class="absolute right-0 z-10 -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-slate-100 transition-colors"
                aria-label="Scroll Right"
            >
                <lucide-icon
                    name="chevron-right"
                    class="w-6 h-6 text-slate-700"
                ></lucide-icon>
            </button>
        </div>
    </section>
</template>

<style scoped>
/* Hide scrollbar on all platforms */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-scrollbar {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
}

/* Ensure smooth scroll behavior for browsers */
.scroll-smooth {
    scroll-behavior: smooth;
}
</style>
