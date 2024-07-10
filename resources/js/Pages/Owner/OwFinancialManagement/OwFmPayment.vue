
<script setup>
import { ref, computed } from 'vue';
import OwAuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';

const newPayment = ref({ amount: 0, date: '', method: 'credit card' });
const payments = ref([
    { id: 1, amount: 100, date: '2023-01-01', method: 'credit card' },
    { id: 2, amount: 200, date: '2023-01-02', method: 'bank transfer' },
    { id: 3, amount: 150, date: '2023-01-03', method: 'cash' },
    { id: 4, amount: 250, date: '2023-01-01', method: 'credit card' },
    { id: 5, amount: 300, date: '2023-01-02', method: 'bank transfer' }
]);

const recordPayment = () => {
    payments.value.push({ ...newPayment.value, id: Date.now() });
    newPayment.value = { amount: 0, date: '', method: 'credit card' };
};

const paymentDates = computed(() => {
    return [...new Set(payments.value.map(payment => payment.date))];
});

const paymentsByDate = (date) => {
    return payments.value.filter(payment => payment.date === date);
};

const paymentMethods = computed(() => {
    return [...new Set(payments.value.map(payment => payment.method))];
});

const paymentsByMethod = (method) => {
    return payments.value.filter(payment => payment.method === method);
};

const exportData = (format) => {
    // Implement export logic here
    console.log(`Exporting data as ${format}`);
};
</script>

<template>
    <OwAuthenticatedLayout>
        <div class="container mx-auto py-12">
            <h1 class="text-3xl font-bold mb-6">Payments Management</h1>

            <!-- Record New Payment Form -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Record New Payment</h2>
                <form @submit.prevent="recordPayment">
                    <div class="mb-4">
                        <label for="paymentAmount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <input type="number" id="paymentAmount" v-model="newPayment.amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="paymentDate" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="paymentDate" v-model="newPayment.date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Method</label>
                        <select id="paymentMethod" v-model="newPayment.method" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="credit card">Credit Card</option>
                            <option value="bank transfer">Bank Transfer</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Record Payment</button>
                </form>
            </div>

            <!-- View All Payments -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">View All Payments</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Amount</th>
                            <th class="py-2">Date</th>
                            <th class="py-2">Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="payment in payments" :key="payment.id">
                            <td class="py-2">${{ payment.amount }}</td>
                            <td class="py-2">{{ payment.date }}</td>
                            <td class="py-2">{{ payment.method }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Payments by Date -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Payments by Date</h2>
                <ul>
                    <li v-for="date in paymentDates" :key="date" class="mb-2">
                        <h3 class="text-xl font-medium">{{ date }}</h3>
                        <ul>
                            <li v-for="payment in paymentsByDate(date)" :key="payment.id" class="ml-4">
                                ${{ payment.amount }} - {{ payment.method }}
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Payments by Method -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Payments by Method</h2>
                <ul>
                    <li v-for="method in paymentMethods" :key="method" class="mb-2">
                        <h3 class="text-xl font-medium">{{ method }}</h3>
                        <ul>
                            <li v-for="payment in paymentsByMethod(method)" :key="payment.id" class="ml-4">
                                ${{ payment.amount }} - {{ payment.date }}
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Export Payment Data -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Export Payment Data</h2>
                <div class="flex space-x-2">
                    <button @click="exportData('csv')" class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as CSV</button>
                    <button @click="exportData('excel')" class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as Excel</button>
                    <button @click="exportData('pdf')" class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as PDF</button>
                </div>
            </div>
        </div>
    </OwAuthenticatedLayout>
</template>

