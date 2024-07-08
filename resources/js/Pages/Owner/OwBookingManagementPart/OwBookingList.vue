<script setup>
import { ref } from 'vue';

const bookings = ref([
    { id: 1, name: 'John Doe', date: '2024-07-08', status: 'Confirmed' },
    { id: 2, name: 'Jane Smith', date: '2024-07-09', status: 'Pending' },
    { id: 3, name: 'Michael Johnson', date: '2024-07-10', status: 'Cancelled' }
]);

const deleteBooking = (id) => {
    bookings.value = bookings.value.filter(booking => booking.id !== id);
};
</script>

<template>
    <div>
        <h2 class="text-xl font-semibold mb-4">Booking List</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="booking in bookings" :key="booking.id">
                    <td class="py-2 px-4 border-b">{{ booking.id }}</td>
                    <td class="py-2 px-4 border-b">{{ booking.name }}</td>
                    <td class="py-2 px-4 border-b">{{ booking.date }}</td>
                    <td class="py-2 px-4 border-b">{{ booking.status }}</td>
                    <td class="py-2 px-4 border-b">
                        <button @click="deleteBooking(booking.id)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
