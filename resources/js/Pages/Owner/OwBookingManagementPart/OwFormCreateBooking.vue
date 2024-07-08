<script setup>
import { ref } from 'vue';

const name = ref('');
const date = ref('');
const time = ref('');
const field = ref('');
const duration = ref('');
const customerName = ref('');
const customerEmail = ref('');
const paymentMethod = ref('');

const checkAvailability = () => {
    // Logic to check field availability based on date and time
    console.log('Checking availability for:', {
        date: date.value,
        time: time.value,
        field: field.value
    });
};

const createBooking = () => {
    // Here you would typically send the booking data to your server
    console.log('Booking Created:', {
        name: name.value,
        date: date.value,
        time: time.value,
        field: field.value,
        duration: duration.value,
        customerName: customerName.value,
        customerEmail: customerEmail.value,
        paymentMethod: paymentMethod.value
    });

    // Reset form fields
    name.value = '';
    date.value = '';
    time.value = '';
    field.value = '';
    duration.value = '';
    customerName.value = '';
    customerEmail.value = '';
    paymentMethod.value = '';
};
</script>

<template>
    <div>
        <h2 class="text-xl font-semibold mb-4">Create Booking</h2>
        <form @submit.prevent="createBooking">
            <!-- Field Availability -->
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date</label>
                <input type="date" id="date" v-model="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="time" class="block text-gray-700">Time</label>
                <input type="time" id="time" v-model="time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="field" class="block text-gray-700">Field</label>
                <input type="text" id="field" v-model="field" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="button" @click="checkAvailability" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Check Availability</button>

            <!-- Customer Information -->
            <div class="mb-4">
                <label for="customerName" class="block text-gray-700">Customer Name</label>
                <input type="text" id="customerName" v-model="customerName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="customerEmail" class="block text-gray-700">Customer Email</label>
                <input type="email" id="customerEmail" v-model="customerEmail" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Booking Details -->
            <div class="mb-4">
                <label for="duration" class="block text-gray-700">Duration (hours)</label>
                <input type="number" id="duration" v-model="duration" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Payment Information -->
            <div class="mb-4">
                <label for="paymentMethod" class="block text-gray-700">Payment Method</label>
                <select id="paymentMethod" v-model="paymentMethod" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Booking</button>
            </div>
        </form>
    </div>
</template>
