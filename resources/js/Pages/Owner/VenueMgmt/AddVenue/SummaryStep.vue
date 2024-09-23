<template>
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Summary & Confirmation</h2>

        <!-- Venue Information Summary -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Venue Information</h3>
            <p><strong>Name:</strong> {{ venue.name || 'N/A' }}</p>
            <p><strong>Address:</strong> {{ venue.address || 'N/A' }}</p>
            <p><strong>Description:</strong> {{ venue.description || 'N/A' }}</p>
            <div v-if="venue.pictures && venue.pictures.length" class="mt-2">
                <h4 class="font-medium">Pictures:</h4>
                <div class="flex space-x-4">
                    <img
                        v-for="(pic, index) in venue.pictures"
                        :key="index"
                        :src="getPictureUrl(pic)"
                        :alt="'Venue Picture ' + (index + 1)"
                        class="h-24 w-24 object-cover rounded-md"
                    />
                </div>
            </div>
            <button
                @click="editSection('venueInfo')"
                class="mt-4 text-blue-500 hover:text-blue-700"
            >
                Edit Venue Information
            </button>
        </div>

        <!-- Facility Information Summary -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Facility Information</h3>
            <div v-if="venue.fields && venue.fields.length" v-for="(field, index) in venue.fields" :key="index" class="mb-4">
                <p><strong>Field {{ index + 1 }}:</strong> {{ field.name || 'N/A' }}</p>
                <p><strong>Sports:</strong> {{ getSportsNames(field.sports) || 'N/A' }}</p>
                <p>
                    <strong>Equipment:</strong>
                    <span v-if="field.equipment && field.equipment.length">{{ getEquipmentNames(field.equipment) }}</span>
                    <span v-else>None</span>
                </p>
                <div v-if="field.imageUrl">
                    <h4 class="font-medium">Field Image:</h4>
                    <img
                        :src="field.imageUrl"
                        alt="Field Image"
                        class="h-24 w-24 object-cover rounded-md"
                    />
                </div>
            </div>
            <button @click="editSection('facilityInfo')" class="mt-4 text-blue-500 hover:text-blue-700">Edit Facility Information</button>
        </div>

        <!-- Availability & Pricing Summary -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Availability & Pricing</h3>
            <div v-if="venue.availability && venue.availability.length" v-for="(day, index) in venue.availability" :key="index" class="mb-4">
                <h4 class="font-semibold">{{ day.name || 'N/A' }}</h4>
                <div v-if="day.timeSlots && day.timeSlots.length">
                    <ul>
                        <li v-for="(slot, slotIndex) in day.timeSlots" :key="slotIndex" class="mb-2">
                            <strong>{{ slot.startTime }} - {{ slot.endTime }}:</strong> ${{ slot.price }}
                        </li>
                    </ul>
                </div>
                <p v-else class="text-gray-500">No time slots available for {{ day.name }}</p>
            </div>
            <button @click="editSection('availabilityPricing')" class="mt-4 text-blue-500 hover:text-blue-700">Edit Availability & Pricing</button>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between mt-6">
            <button @click="previousStep" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Back</button>
            <button @click="submitVenue" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Submit</button>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";
import Swal from "sweetalert2"; // SweetAlert for alerts

// Props to receive the venue data from the parent
const props = defineProps({
    venue: Object, // The venue object containing all the data from previous steps
});

// Define emit to handle navigation between steps and submission
const emit = defineEmits(["previous", "edit", "submit"]);

// Helper function to get the picture URL (handles both file objects and URLs)
const getPictureUrl = (picture) => {
    return typeof picture === "string" ? picture : URL.createObjectURL(picture);
};

// Helper function to get sports names based on their IDs
const getSportsNames = (sportsIds) => {
    if (!sportsIds || !sportsIds.length) return 'N/A';
    const sportsList = [
        { id: 1, name: "Football" },
        { id: 2, name: "Basketball" },
        { id: 3, name: "Tennis" },
    ];
    return sportsIds.map((id) => sportsList.find((sport) => sport.id === id)?.name).join(", ");
};

// Helper function to get equipment names
const getEquipmentNames = (equipment) => {
    if (!equipment || !equipment.length) return 'N/A';
    return equipment.map((e) => `${e.name} (x${e.quantity})`).join(", ");
};

// Function to edit a specific section
const editSection = (section) => {
    emit("edit", section); // Emit the section name to the parent to go back to that section
};

// Submit the venue information
const submitVenue = () => {
    Swal.fire({
        icon: "success",
        title: "Venue Submitted!",
        text: "Your venue information has been successfully submitted.",
    });
    emit("submit");
};

// Navigate to the previous step
const previousStep = () => {
    emit("previous");
};
</script>

<style scoped>
/* Basic styles for the summary page */
</style>
