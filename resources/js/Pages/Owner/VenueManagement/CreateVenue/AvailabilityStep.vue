<template>
    <div class="w-full max-w-5xl bg-white rounded-lg shadow-lg p-6 sm:p-8 mb-6 transition duration-300 ease-in-out transform hover:shadow-xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Ketersediaan & Harga</h2>

        <!-- Time Slot Batch Creation with Day Selection -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Auto-Generate Time Slots</h3>

            <!-- Checkbox for Days Selection -->
            <div class="grid grid-cols-2 gap-4 mb-6 sm:gap-6">
                <div v-for="(day, index) in daysOfWeek" :key="index" class="flex items-center">
                    <input type="checkbox" v-model="daysSelected" :value="index" class="mr-3 h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-500" />
                    <label class="text-lg text-gray-800">{{ day.name }}</label>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6 sm:gap-6">
                <div>
                    <label for="start-time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                    <input
                        type="time"
                        v-model="batchTime.start"
                        id="start-time"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                    />
                </div>
                <div>
                    <label for="end-time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                    <input
                        type="time"
                        v-model="batchTime.end"
                        id="end-time"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                    />
                </div>
                <div>
                    <label for="session-duration" class="block text-sm font-medium text-gray-700">Durasi Sesi (menit)</label>
                    <input
                        type="number"
                        v-model="batchTime.duration"
                        id="session-duration"
                        min="15"
                        step="15"
                        placeholder="60"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                    />
                </div>
                <div>
                    <label for="default-price" class="block text-sm font-medium text-gray-700">Harga Default per Sesi</label>
                    <input
                        type="number"
                        v-model="batchTime.price"
                        id="default-price"
                        min="0"
                        placeholder="50"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                    />
                </div>
            </div>

            <button type="button" @click="generateTimeSlots" class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">
                Auto-Generate Time Slots
            </button>
        </div>

        <!-- Accordion with Animation -->
        <transition-group name="accordion" tag="div">
            <div v-for="(day, index) in daysOfWeek" :key="index" class="mb-6">
                <div
                    @click="toggleAccordion(index)"
                    class="cursor-pointer bg-gray-100 px-4 py-3 rounded-md flex justify-between items-center transition duration-200 hover:bg-gray-200"
                >
                    <h3 class="text-lg font-semibold text-gray-800">{{ day.name }}</h3>
                    <svg
                        :class="{
                            'transform rotate-180': openAccordions.includes(index),
                        }"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-600"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.9l3.71-3.67a.75.75 0 011.06 1.06l-4.25 4.2a.75.75 0 01-1.06 0l-4.25-4.2a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>

                <transition name="fade">
                    <div v-if="openAccordions.includes(index)" class="mt-2">
                        <div v-for="(slot, slotIndex) in day.timeSlots" :key="slotIndex" class="flex items-center mb-2">
                            <input
                                type="time"
                                v-model="slot.startTime"
                                class="mr-2 w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                                @input="updateEndTime(slot, slotIndex)"
                            />
                            <input
                                type="time"
                                v-model="slot.endTime"
                                class="mr-2 w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            />
                            <input
                                type="number"
                                v-model="slot.price"
                                class="w-1/4 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"
                            />
                            <button type="button" @click="removeTimeSlot(index, slotIndex)" class="text-red-600 hover:text-red-700 text-sm font-medium ml-2">
                                Hapus
                            </button>
                        </div>

                        <!-- Option to remove the entire day with confirmation -->
                        <div class="mt-4">
                            <button type="button" @click="confirmRemoveDay(index)" class="text-red-600 hover:text-red-700 text-sm font-medium">
                                Hapus {{ day.name }}
                            </button>
                        </div>
                    </div>
                </transition>
            </div>
        </transition-group>

        <!-- Next and Previous Buttons -->
        <div class="flex justify-between mt-8">
            <button type="button" @click="previousStep" class="px-6 py-3 bg-gray-300 rounded-md hover:bg-gray-400 transition duration-200">Kembali</button>
            <button type="button" @click="nextStep" class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">Selanjutnya</button>
        </div>
    </div>
</template>

<script setup>
import { ref, defineEmits, watch } from "vue";
import Swal from "sweetalert2"; // SweetAlert for alerts

// Props to receive data from parent component
const props = defineProps({
    modelValue: Object, // Passing the availability object with days and time slots from the parent
});

// Emit function to update the parent component
const emit = defineEmits(["update:modelValue", "next", "previous"]);

// Reactive data for availability and pricing
const availability = ref({ ...props.modelValue });

// Days of the week with open/close times and time slots
const daysOfWeek = ref(availability.value.days || [
    { name: "Senin", timeSlots: [] },
    { name: "Selasa", timeSlots: [] },
    { name: "Rabu", timeSlots: [] },
    { name: "Kamis", timeSlots: [] },
    { name: "Jumat", timeSlots: [] },
    { name: "Sabtu", timeSlots: [] },
    { name: "Minggu", timeSlots: [] },
]);

// Batch time slot creation data
const batchTime = ref({
    start: "08:00",
    end: "21:00",
    duration: 60,
    price: 50,
});

// Selected days for auto-generation
const daysSelected = ref([0, 1, 2, 3, 4, 5, 6]); // Default all days selected

// Accordion state
const openAccordions = ref([]);

// Watch for changes in `daysOfWeek` and emit updates to parent
watch(daysOfWeek, (newDays) => {
    availability.value.days = newDays;
    emit("update:modelValue", availability.value);
}, { deep: true });

// Generate time slots for selected days with validation
const generateTimeSlots = () => {
    const { start, end, duration, price } = batchTime.value;

    // Validation: Ensure valid start/end times, duration, and price
    if (!start || !end || !duration || !price || start >= end) {
        Swal.fire({
            icon: "error",
            title: "Invalid Input",
            text: "Please ensure the start time is earlier than the end time, and all fields are filled out.",
        });
        return;
    }

    daysSelected.value.forEach((dayIndex) => {
        const day = daysOfWeek.value[dayIndex];
        day.timeSlots = [];
        let currentTime = start;
        while (currentTime < end) {
            let nextTime = addMinutes(currentTime, duration);
            if (nextTime > end) break;
            day.timeSlots.push({
                startTime: currentTime,
                endTime: nextTime,
                price,
            });
            currentTime = nextTime;
        }
    });

    Swal.fire({
        icon: "success",
        title: "Time slots generated!",
        text: "Time slots have been created for the selected days.",
    });
};

// Utility function to add minutes to time strings
const addMinutes = (time, minutes) => {
    let [hours, mins] = time.split(":").map(Number);
    mins += minutes;
    if (mins >= 60) {
        hours += Math.floor(mins / 60);
        mins %= 60;
    }
    if (hours >= 24) hours %= 24;
    return `${String(hours).padStart(2, "0")}:${String(mins).padStart(2, "0")}`;
};

// Automatically update the end time when the start time is set and the duration is provided
const updateEndTime = (slot, slotIndex) => {
    if (batchTime.value.duration) {
        slot.endTime = addMinutes(slot.startTime, batchTime.value.duration);
    }
};

// Remove a specific time slot
const removeTimeSlot = (dayIndex, slotIndex) => {
    daysOfWeek.value[dayIndex].timeSlots.splice(slotIndex, 1);
    Swal.fire({
        icon: "success",
        title: "Time slot removed!",
        text: "The selected time slot has been removed.",
    });
};

// Confirm removal of a day with undo option
const confirmRemoveDay = (dayIndex) => {
    const removedDay = { ...daysOfWeek.value[dayIndex] };

    Swal.fire({
        title: "Are you sure?",
        text: `You are about to remove ${daysOfWeek.value[dayIndex].name}. This action cannot be undone.`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, remove it!",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            daysOfWeek.value.splice(dayIndex, 1);
            Swal.fire({
                icon: "success",
                title: "Day removed!",
                text: "The selected day has been removed from the schedule.",
                showConfirmButton: false,
                timer: 3000,
                footer: `<a href="#" @click="undoRemoveDay(${dayIndex}, removedDay)">Undo</a>`,
            });
        }
    });
};

// Undo the removal of a day
const undoRemoveDay = (dayIndex, removedDay) => {
    daysOfWeek.value.splice(dayIndex, 0, removedDay);
    Swal.fire({
        icon: "success",
        title: "Undo successful!",
        text: `The day ${removedDay.name} has been restored.`,
    });
};

// Accordion control for each day
const toggleAccordion = (index) => {
    if (openAccordions.value.includes(index)) {
        openAccordions.value = openAccordions.value.filter((i) => i !== index);
    } else {
        openAccordions.value.push(index);
    }
};

// Navigation between steps
const nextStep = () => {
    // Emit updated availability data to the parent and move to the next step
    emit("update:modelValue", availability.value);
    emit("next");

};

const previousStep = () => {
    emit("previous");
};
</script>
