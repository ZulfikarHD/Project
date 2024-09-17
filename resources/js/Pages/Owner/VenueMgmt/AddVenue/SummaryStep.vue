<template>
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">
            Summary & Confirmation
        </h2>

        <!-- Venue Information Summary -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Venue Information</h3>
            <p><strong>Name:</strong> {{ venue.name }}</p>
            <p><strong>Address:</strong> {{ venue.address }}</p>
            <p><strong>Description:</strong> {{ venue.description }}</p>
            <div v-if="venue.pictures.length" class="mt-2">
                <h4 class="font-medium">Pictures:</h4>
                <div class="flex space-x-4">
                    <img
                        v-for="(pic, index) in venue.pictures"
                        :src="pic.url"
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
            <div
                v-for="(field, index) in venue.fields"
                :key="index"
                class="mb-4"
            >
                <p>
                    <strong>Field {{ index + 1 }}:</strong> {{ field.name }}
                </p>
                <p>
                    <strong>Sports:</strong> {{ getSportsNames(field.sports) }}
                </p>
                <p>
                    <strong>Equipment:</strong>
                    <span v-if="field.equipment.length">{{
                        getEquipmentNames(field.equipment)
                    }}</span
                    ><span v-else>None</span>
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
            <button
                @click="editSection('facilityInfo')"
                class="mt-4 text-blue-500 hover:text-blue-700"
            >
                Edit Facility Information
            </button>
        </div>

        <!-- Availability & Pricing Summary -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Availability & Pricing</h3>
            <div v-for="(day, index) in daysOfWeek" :key="index" class="mb-4">
                <h4 class="font-semibold">{{ day.name }}</h4>
                <div v-if="day.timeSlots.length">
                    <ul>
                        <li
                            v-for="(slot, slotIndex) in day.timeSlots"
                            :key="slotIndex"
                            class="mb-2"
                        >
                            <strong
                                >{{ slot.startTime }} -
                                {{ slot.endTime }}:</strong
                            >
                            ${{ slot.price }}
                        </li>
                    </ul>
                </div>
                <p v-else class="text-gray-500">
                    No time slots available for {{ day.name }}
                </p>
            </div>
            <button
                @click="editSection('availabilityPricing')"
                class="mt-4 text-blue-500 hover:text-blue-700"
            >
                Edit Availability & Pricing
            </button>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between mt-6">
            <button
                @click="previousStep"
                class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400"
            >
                Back
            </button>
            <button
                @click="submitVenue"
                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"
            >
                Submit
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, defineEmits } from "vue";
import Swal from "sweetalert2"; // SweetAlert for alerts

// Define emit for step navigation
const emit = defineEmits(["next", "previous", "edit"]);

// Mocked data to simulate summary (you'd replace this with real data from previous steps)
const venue = ref({
    name: "Super Sports Arena",
    address: "123 Sports Avenue, Cityville",
    description: "A modern venue with top-notch facilities.",
    pictures: [
        { url: "https://via.placeholder.com/150" },
        { url: "https://via.placeholder.com/150" },
    ],
    fields: [
        {
            name: "Field 1",
            sports: [1, 2],
            equipment: [
                { name: "Soccer Net", quantity: 2 },
                { name: "Basketball Hoop", quantity: 1 },
            ],
            imageUrl: "https://via.placeholder.com/150",
        },
        {
            name: "Field 2",
            sports: [3],
            equipment: [],
            imageUrl: "",
        },
    ],
});

// Days of the week with open/close times and time slots (mocked data for summary)
const daysOfWeek = ref([
    {
        name: "Monday",
        timeSlots: [{ startTime: "08:00", endTime: "10:00", price: 50 }],
    },
    {
        name: "Tuesday",
        timeSlots: [{ startTime: "08:00", endTime: "10:00", price: 50 }],
    },
    { name: "Wednesday", timeSlots: [] },
    { name: "Thursday", timeSlots: [] },
    { name: "Friday", timeSlots: [] },
    {
        name: "Saturday",
        timeSlots: [{ startTime: "10:00", endTime: "12:00", price: 60 }],
    },
    { name: "Sunday", timeSlots: [] },
]);

// Get sports names (you'd normally fetch this from an API or data store)
const getSportsNames = (sportsIds) => {
    const sportsList = [
        { id: 1, name: "Football" },
        { id: 2, name: "Basketball" },
        { id: 3, name: "Tennis" },
    ];
    return sportsIds
        .map((id) => sportsList.find((sport) => sport.id === id)?.name)
        .join(", ");
};

// Get equipment names
const getEquipmentNames = (equipment) => {
    return equipment.map((e) => `${e.name} (x${e.quantity})`).join(", ");
};

// Navigate back to a specific section
const editSection = (section) => {
    emit("edit", section);
};

// Submit the venue information
const submitVenue = () => {
    Swal.fire({
        icon: "success",
        title: "Venue Submitted!",
        text: "Your venue information has been successfully submitted.",
    });
    emit("next");
};

const previousStep = () => {
    emit("previous");
};
</script>

<style scoped>
/* Basic styles for the summary page */
</style>
