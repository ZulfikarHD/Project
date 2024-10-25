<script setup>
import { reactive, ref } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import OwAuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import VenueInfoStep from "./VenueInfoStep.vue";
import FacilityStep from "./FieldFacility.vue";
import AvailabilityStep from "./AvailabilityStep.vue";
import SummaryStep from "./SummaryStep.vue";
import { useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    user: Number,
    sportList: Array,
});

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
  try {
    const venueData = useForm({
      userId: props.user,
      venueName: venue.name,
      venueAddress: venue.address,
      venueLocation: venue.location,
      venueDescription: venue.description,
      venueOpenDay: venue.availability.days,
      venuePictures: venue.pictures,
      fields: venue.fields,
    });

    router.post("/api/owner/venues", venueData);

    Swal.fire({
      icon: "success",
      title: "Venue Submitted!",
      text: "Your venue has been successfully created.",
    });
  } catch (error) {
    if (error.response && error.response.status === 422) {
      const errors = error.response.data.errors;
      // Handle validation errors
      console.error("Validation Errors:", errors);
      Swal.fire({
        icon: "error",
        title: "Validation Error",
        text: "Please correct the errors and try again.",
      });
    } else {
      console.error("Error submitting venue:", error);
      Swal.fire({
        icon: "error",
        title: "Submission Failed",
        text: "There was a problem submitting your venue. Please try again.",
      });
    }
  }
};
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

        <!-- Step 2: Field Information-->
        <div v-if="step === 2">
          <FacilityStep
            :modelValue="venue.fields"
            @update:modelValue='venue.fields = $event'
            :sportList='props.sportList'
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
