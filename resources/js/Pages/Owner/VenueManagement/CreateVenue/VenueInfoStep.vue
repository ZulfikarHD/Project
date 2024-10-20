<template>
    <div class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-full sm:max-w-lg mx-auto min-w-0 md:min-w-full ">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800 text-center">Venue Information</h2>

        <!-- Venue Name -->
        <div class="mb-4">
            <label for="venue-name" class="block text-sm font-medium text-gray-700">Venue Name</label>
            <input v-model="venue.name" type="text" id="venue-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter venue name" />
        </div>

        <!-- Venue Address -->
        <div class="mb-4">
            <label for="venue-address" class="block text-sm font-medium text-gray-700">Venue Address</label>
            <input v-model="venue.address" type="text" id="venue-address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" placeholder="Enter venue address" />
        </div>

        <!-- Venue Location on Map -->
        <div class="mb-4">
            <label for="venue-location" class="block text-sm font-medium text-gray-700">Venue Location</label>
            <div id="map" class="h-64 w-full mb-2 rounded-md shadow-sm"></div>
            <p class="text-xs text-gray-500 text-center">Click on the map to set the venue's location.</p>
        </div>

        <!-- Venue Description -->
        <div class="mb-4">
            <label for="venue-description" class="block text-sm font-medium text-gray-700">Venue Description</label>
            <textarea v-model="venue.description" id="venue-description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2" rows="4" placeholder="Enter a description for the venue"></textarea>
        </div>

        <!-- Venue Pictures -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Venue Pictures</label>
            <div class="mt-2 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M0 0h48v48H0z" fill="none"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21l12 12L42 11"></path>
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-green-500 hover:text-green-600">
                            <span>Upload files</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only" multiple @change="handleFileUpload" />
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG up to 5MB</p>
                </div>
            </div>
            <div v-if="venue.pictures.length">
                <p class="text-sm font-medium mt-2">Uploaded Pictures:</p>
                <ul class="list-disc pl-5">
                    <li v-for="(picture, index) in venue.pictures" :key="index" class="text-sm text-gray-600">{{ picture.name }}</li>
                </ul>
            </div>
        </div>

        <!-- Next Button -->
        <div class="flex justify-end mt-6">
            <button @click="nextStep" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">Next</button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Swal from "sweetalert2";

// Props for passing data from the parent component
const props = defineProps({
    modelValue: Object, // Expecting the venue object from the parent component
});

// Emit for updating the parent component's data
const emit = defineEmits(["update:modelValue", "next"]);

// Directly use modelValue as venue (this keeps the reactivity with parent component)
const venue = ref(props.modelValue);

// Initialize Google Maps
const initMap = () => {
    const defaultLocation = { lat: 37.7749, lng: -122.4194 }; // Default location (San Francisco)
    const map = new google.maps.Map(document.getElementById("map"), {
        center: defaultLocation,
        zoom: 13,
    });

    let marker = new google.maps.Marker({
        position: defaultLocation,
        map: map,
        draggable: true,
    });

    // Listen for click events on the map to set the venue's location
    map.addListener("click", (e) => {
        const { lat, lng } = e.latLng.toJSON();
        venue.value.location = { lat, lng };
        marker.setPosition(new google.maps.LatLng(lat, lng)); // Move marker to the new location
    });
};

// Handle file uploads
const handleFileUpload = (e) => {
    const files = e.target.files;
    for (let i = 0; i < files.length; i++) {
        venue.value.pictures.push(files[i]);
    }
};


// Call initMap after the component is mounted
onMounted(() => {
    initMap();
});

// Move to the next step and validate
const nextStep = () => {
    // Validate the form
    if (!venue.value.name || !venue.value.address || !venue.value.location.lat) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please fill in all required fields and select a location on the map.",
        });
        return;
    }

    // Emit the updated venue data to the parent component and move to the next step
    emit("next");
};
</script>
