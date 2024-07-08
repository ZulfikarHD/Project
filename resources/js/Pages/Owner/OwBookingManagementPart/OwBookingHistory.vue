
<script setup>
import { ref, computed } from 'vue';

const filterDate = ref('');
const filterStatus = ref('');
const bookings = ref([
    { id: 1, customerName: 'John Doe', date: '2024-07-08', status: 'confirmed' },
    { id: 2, customerName: 'Jane Smith', date: '2024-07-09', status: 'cancelled' },
    { id: 3, customerName: 'Alice Johnson', date: '2024-07-10', status: 'pending' },
    // Add more booking data as needed
]);

const filteredBookings = computed(() => {
    return bookings.value.filter(booking => {
        return (!filterDate.value || booking.date === filterDate.value) &&
               (!filterStatus.value || booking.status === filterStatus.value);
    });
});
</script>

<template>
    <div>
        <h2 class="text-xl font-semibold mb-4">Booking History</h2>
        <div class="mb-4">
            <label for="filter-date" class="block text-sm font-medium text-gray-700">Filter by Date</label>
            <input type="date" id="filter-date" v-model="filterDate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="filter-status" class="block text-sm font-medium text-gray-700">Filter by Status</label>
            <select id="filter-status" v-model="filterStatus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">All</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
                <option value="pending">Pending</option>
            </select>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="booking in filteredBookings" :key="booking.id">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ booking.id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ booking.customerName }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ booking.date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ booking.status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


