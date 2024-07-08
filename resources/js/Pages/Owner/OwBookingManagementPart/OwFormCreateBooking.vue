<script setup>
import { ref } from 'vue';

const name = ref('');
const date = ref('');
const status = ref('Pending');

const createBooking = () => {
    // Here you would typically send the booking data to your server
    console.log('Booking Created:', {
        name: name.value,
        date: date.value,
        status: status.value
    });

    // Reset form fields
    name.value = '';
    date.value = '';
    status.value = 'Pending';
};
</script>

<template>
    <div>
        <h2 class="text-xl font-semibold mb-4">Create Booking</h2>
        <form @submit.prevent="createBooking">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" v-model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date</label>
                <input type="date" id="date" v-model="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select id="status" v-model="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Booking</button>
            </div>
        </form>
    </div>
</template>
