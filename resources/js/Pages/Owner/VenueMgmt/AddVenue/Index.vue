<template>
    <OwAuthenticatedLayout>
        <div class="add-venue-page container p-4">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Venue</h1>

            <form @submit.prevent="submitVenue">
                <div v-if="step === 1">
                    <!-- Step 1: Venue Information -->
                    <VenueInfoStep v-model="venue" @next="nextStep" />
                </div>

                <div v-if="step === 2">
                    <!-- Step 2: Facility Information -->
                    <FacilityStep
                        v-model="venue.fields"
                        @previous="prevStep"
                        @next="nextStep"
                    />
                </div>

                <div v-if="step === 3">
                    <!-- Step 3: Availability & Pricing -->
                    <AvailabilityStep
                        v-model="venue.availability"
                        @previous="prevStep"
                        @next="nextStep"
                    />
                </div>

                <div v-if="step === 4">
                    <!-- Step 5: Summary & Confirmation -->
                    <SummaryStep :venue="venue" @previous="prevStep" @submit="submitVenue" />
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-end mt-4">
                    <button
                        v-if="step > 1"
                        @click="prevStep"
                        class="mr-2 px-4 py-2 bg-gray-300 rounded-md"
                    >
                        Back
                    </button>
                    <button
                        v-if="step < 5"
                        @click="nextStep"
                        class="px-4 py-2 bg-green-500 text-white rounded-md"
                    >
                        Next
                    </button>
                    <button
                        v-if="step === 5"
                        type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded-md"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </OwAuthenticatedLayout>
</template>

<script setup>
import { reactive, ref } from "vue";
import OwAuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import VenueInfoStep from "./VenueInfoStep.vue";
import FacilityStep from "./FacilityStep.vue";
import AvailabilityStep from "./AvailabilityStep.vue";
  import SummaryStep from './SummaryStep.vue';

// Step tracking
const step = ref(1);

// Venue data structure based on your ERD
const venue = reactive({
    name: "",
    address: "",
    location: { lat: 0, lng: 0 }, // Location (lat/lng from map)
    description: "",
    pictures: [], // Pictures for the venue
    fields: [], // Facility info: fields/courts with sports type
    availability: {}, // Open/close times and reservation slots with pricing
    dynamicPricing: {}, // Dynamic pricing rules (optional)
});

// Step control functions
function nextStep() {
    if (step.value < 5) step.value++;
}

function prevStep() {
    if (step.value > 1) step.value--;
}

// Submit the venue to backend
function submitVenue() {
    console.log("Submitting venue data:", venue);
    // API call or Inertia.js form submission
}
</script>

<style scoped>
/* Optional: styling for step indicator, buttons, etc. */
</style>
