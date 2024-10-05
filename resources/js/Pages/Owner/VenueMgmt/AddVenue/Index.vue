<script setup>
import { reactive, ref } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import OwAuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import VenueInfoStep from "./VenueInfoStep.vue";
import FacilityStep from "./FacilityStep.vue";
import AvailabilityStep from "./AvailabilityStep.vue";
import SummaryStep from "./SummaryStep.vue";
import { useForm } from "@inertiajs/vue3";

// Step tracking
const step = ref(1);

// Venue data structure
const venue = reactive({
    name: "",
    address: "",
    location: { lat: 0, lng: 0 }, // Location (lat/lng from map)
    description: "",
    availability: [], // Open/close times and reservation slots with pricing

    pictures: [], // Pictures for the venue
    fields: [], // Facility info: fields/courts with sports type
    availability: [], // Open/close times and reservation slots with pricing
});

// Step control functions
function nextStep() {
    if (step.value < 4) step.value++;
}

function prevStep() {
    if (step.value > 1) step.value--;
}

// Handle form submission
function handleSubmit() {
    if (step.value === 4) {
        submitVenue();
    }
}

// Submit the entire venue data at the final step

const submitVenue = () => {

        const venueData = useForm({
            venueName: venue.name,
            venueAddress: venue.address,
            venueLocation: venue.location,
            venueDescription: venue.description,
            venueOpenDay: venue.availability.days,
            venuePictures: venue.pictures,
            venueFields: venue.fields,
        });

        // console.log(venueData);

        // Submit all data in one API call
        const response = () => {
            axios.post("/api/owner/venues", venueData).then((res) => {
                console.log(res) // Menyimpan data yang diambil
            });
        };

};

// async function submitVenue() {

//     try{
//         console.log("Final Data to Submit:", venue);
//         const formVenue = useForm({
//             venueName :
//         })

//     }
// try {
//     const formData = new FormData();

//     // Add venue basic info
//     formData.append("name", venue.name);
//     formData.append("address", venue.address);
//     formData.append("location[lat]", venue.location.lat);
//     formData.append("location[lng]", venue.location.lng);
//     formData.append("description", venue.description);

//     // Add venue pictures
//     venue.pictures.forEach((picture, index) => {
//         formData.append(`pictures[${index}]`, picture);
//     });

//     // Add facility information (fields)
//     venue.fields.forEach((field, index) => {
//         formData.append(`fields[${index}][name]`, field.name);

//         // Append sports array
//         field.sports.forEach((sport, sportIndex) => {
//             formData.append(
//                 `fields[${index}][sports][${sportIndex}]`,
//                 sport
//             );
//         });

//         // Append equipment array
//         field.equipment.forEach((equipment, eqIndex) => {
//             formData.append(
//                 `fields[${index}][equipment][${eqIndex}][name]`,
//                 equipment.name
//             );
//             formData.append(
//                 `fields[${index}][equipment][${eqIndex}][quantity]`,
//                 equipment.quantity
//             );
//         });

//         // Append field image
//         if (field.image) {
//             formData.append(`fields[${index}][image]`, field.image);
//         }
//     });

//     // Add availability and pricing
//     if (Array.isArray(venue.availability.days)) {
//         venue.availability.forEach((day, dayIndex) => {
//             formData.append(`availability[${dayIndex}][name]`, day.name);
//             day.timeSlots.forEach((slot, slotIndex) => {
//                 formData.append(
//                     `availability[${dayIndex}][timeSlots][${slotIndex}][startTime]`,
//                     slot.startTime
//                 );
//                 formData.append(
//                     `availability[${dayIndex}][timeSlots][${slotIndex}][endTime]`,
//                     slot.endTime
//                 );
//                 formData.append(
//                     `availability[${dayIndex}][timeSlots][${slotIndex}][price]`,
//                     slot.price
//                 );
//             });
//         });
//     } else {
//         console.error(
//             "venue.availability is not an array:",
//             venue.availability
//         );
//     }

//     // Submit all data in one API call
//     const response = () => {
//         axios.post("/api/owner/venues", formData);
//     };

//     Swal.fire({
//         icon: "success",
//         title: "Venue Submitted!",
//         text: "Your venue has been successfully created.",
//     });
// } catch (error) {
//     if (error.response && error.response.status === 422) {
//         const errors = error.response.data.errors;
//         // Handle validation errors
//         console.error("Validation Errors:", errors);
//         Swal.fire({
//             icon: "error",
//             title: "Validation Error",
//             text: "Please correct the errors and try again.",
//         });
//     } else {
//         console.error("Error submitting venue:", error);
//         Swal.fire({
//             icon: "error",
//             title: "Submission Failed",
//             text: "There was a problem submitting your venue. Please try again.",
//         });
//     }
// }
// }
</script>

<template>
    <OwAuthenticatedLayout>
        <div class="add-venue-page container p-4">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Venue</h1>

            <!-- Attach @submit.prevent to prevent page refresh -->
            <form @submit.prevent="handleSubmit">
                <!-- Step 1: Venue Information -->
                <div v-if="step === 1">
                    <VenueInfoStep
                        :modelValue="venue"
                        @update:modelValue="venue = $event"
                        @next="nextStep"
                    />
                </div>

                <!-- Step 2: Facility Information -->
                <div v-if="step === 2">
                    <FacilityStep
                        :modelValue="venue.fields"
                        @update:modelValue="venue.fields = $event"
                        @previous="prevStep"
                        @next="nextStep"
                    />
                </div>

                <!-- Step 3: Availability & Pricing -->
                <div v-if="step === 3">
                    <AvailabilityStep
                        :modelValue="venue.availability"
                        @update:modelValue="venue.availability = $event"
                        @previous="prevStep"
                        @next="nextStep"
                    />
                </div>

                <!-- Step 4: Summary & Confirmation -->
                <div v-if="step === 4">
                    <SummaryStep
                        :venue="venue"
                        @previous="prevStep"
                        @submit="submitVenue"
                    />
                </div>
            </form>
        </div>
    </OwAuthenticatedLayout>
</template>
