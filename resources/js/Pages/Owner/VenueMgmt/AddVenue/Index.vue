<template>
    <OwAuthenticatedLayout>
        <div class="add-venue-page container p-4">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Venue</h1>

            <!-- Remove @submit event to prevent submitting in each step -->
            <form>
                <!-- Step 1: Venue Information -->
                <div v-if="step === 1">
                    <VenueInfoStep :modelValue="venue" @update:modelValue="venue = $event" @next="nextStep" />
                </div>

                <!-- Step 2: Facility Information -->
                <div v-if="step === 2">
                    <FacilityStep :modelValue="venue.fields" @update:modelValue="venue.fields = $event" @previous="prevStep" @next="nextStep" />
                </div>

                <!-- Step 3: Availability & Pricing -->
                <div v-if="step === 3">
                    <AvailabilityStep :modelValue="venue.availability" @update:modelValue="venue.availability = $event" @previous="prevStep" @next="nextStep" />
                </div>

                <!-- Step 4: Summary & Confirmation -->
                <div v-if="step === 4">
                    <SummaryStep :venue="venue" @previous="prevStep" @submit="submitVenue" />
                </div>
            </form>
        </div>
    </OwAuthenticatedLayout>
</template>

<script setup>
import { reactive, ref } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import OwAuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import VenueInfoStep from "./VenueInfoStep.vue";
import FacilityStep from "./FacilityStep.vue";
import AvailabilityStep from "./AvailabilityStep.vue";
import SummaryStep from './SummaryStep.vue';

// Step tracking
const step = ref(1);

// Venue data structure
const venue = reactive({
    name: "",
    address: "",
    location: { lat: 0, lng: 0 }, // Location (lat/lng from map)
    description: "",
    pictures: [], // Pictures for the venue
    fields: [], // Facility info: fields/courts with sports type
    availability: [], // Open/close times and reservation slots with pricing
});

// Step control functions
function nextStep() {
    // Log the data at each step
    if (step.value === 1) {
        console.log("Step 1 (Venue Info):", venue);
    } else if (step.value === 2) {
        console.log("Step 2 (Facility Info):", venue.fields);
    } else if (step.value === 3) {
        console.log("Step 3 (Availability):", venue.availability);
    }

    if (step.value < 4) step.value++;
}

function prevStep() {
    if (step.value > 1) step.value--;
}

// Submit the entire venue data at the final step
async function submitVenue() {
    try {
        console.log("Final Data to Submit:", venue);
        const formData = new FormData();

        // Add venue basic info
        formData.append("name", venue.name);
        formData.append("address", venue.address);
        formData.append("location", JSON.stringify(venue.location));
        formData.append("description", venue.description);

        // Add venue pictures
        venue.pictures.forEach((picture, index) => {
            formData.append(`pictures[${index}]`, picture);
        });

        // Add facility information (fields)
        venue.fields.forEach((field, index) => {
            formData.append(`fields[${index}][name]`, field.name);
            formData.append(`fields[${index}][sports]`, JSON.stringify(field.sports));
            formData.append(`fields[${index}][equipment]`, JSON.stringify(field.equipment));
            if (field.image) {
                formData.append(`fields[${index}][image]`, field.image);
            }
        });

        // Add availability and pricing
        formData.append("availability", JSON.stringify(venue.availability));

        // Submit all data in one API call
        const response = await axios.post("/api/venues", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });

        Swal.fire({
            icon: "success",
            title: "Venue Submitted!",
            text: "Your venue has been successfully created.",
        });

    } catch (error) {
        console.error("Error submitting venue:", error);
        Swal.fire({
            icon: "error",
            title: "Submission Failed",
            text: "There was a problem submitting your venue. Please try again.",
        });
    }
}
</script>
