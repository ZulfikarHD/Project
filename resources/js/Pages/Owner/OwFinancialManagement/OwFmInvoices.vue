<script setup>
import { ref, computed } from 'vue';
import OwAuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';

const newInvoice = ref({ number: '', amount: 0, date: '', status: 'pending' });
const invoices = ref([
    { id: 1, number: 'INV-001', amount: 100, date: '2023-01-01', status: 'pending' },
    { id: 2, number: 'INV-002', amount: 200, date: '2023-01-02', status: 'paid' },
    { id: 3, number: 'INV-003', amount: 300, date: '2023-01-03', status: 'overdue' },
    { id: 4, number: 'INV-004', amount: 400, date: '2023-01-04', status: 'pending' },
]);

const createInvoice = () => {
    invoices.value.push({ ...newInvoice.value, id: Date.now() });
    newInvoice.value = { number: '', amount: 0, date: '', status: 'pending' };
};

const pendingInvoices = computed(() => {
    return invoices.value.filter(invoice => invoice.status === 'pending');
});

const paidInvoices = computed(() => {
    return invoices.value.filter(invoice => invoice.status === 'paid');
});

const overdueInvoices = computed(() => {
    return invoices.value.filter(invoice => invoice.status === 'overdue');
});

const exportData = (format) => {
    // Implement export logic here
    console.log(`Exporting data as ${format}`);
};
</script>

<template>
    <OwAuthenticatedLayout>
        <div class="container mx-auto py-12">
            <h1 class="text-3xl font-bold mb-6">Booking Invoices</h1>

            <!-- Create New Invoice Form -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Create New Invoice</h2>
                <form @submit.prevent="createInvoice">
                    <div class="mb-4">
                        <label for="invoiceNumber" class="block text-sm font-medium text-gray-700">Invoice
                            Number</label>
                        <input type="text" id="invoiceNumber" v-model="newInvoice.number"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="invoiceAmount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <input type="number" id="invoiceAmount" v-model="newInvoice.amount"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="invoiceDate" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="invoiceDate" v-model="newInvoice.date"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="invoiceStatus" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="invoiceStatus" v-model="newInvoice.status"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="overdue">Overdue</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Create
                        Invoice</button>
                </form>
            </div>

            <!-- View All Invoices -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">View All Invoices</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Invoice Number</th>
                            <th class="py-2">Amount</th>
                            <th class="py-2">Date</th>
                            <th class="py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="invoice in invoices" :key="invoice.id">
                            <td class="py-2">{{ invoice.number }}</td>
                            <td class="py-2">${{ invoice.amount }}</td>
                            <td class="py-2">{{ invoice.date }}</td>
                            <td class="py-2">{{ invoice.status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pending Invoices -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Pending Invoices</h2>
                <ul>
                    <li v-for="invoice in pendingInvoices" :key="invoice.id" class="mb-2">
                        {{ invoice.number }} - ${{ invoice.amount }} - {{ invoice.date }}
                    </li>
                </ul>
            </div>

            <!-- Paid Invoices -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Paid Invoices</h2>
                <ul>
                    <li v-for="invoice in paidInvoices" :key="invoice.id" class="mb-2">
                        {{ invoice.number }} - ${{ invoice.amount }} - {{ invoice.date }}
                    </li>
                </ul>
            </div>

            <!-- Overdue Invoices -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Overdue Invoices</h2>
                <ul>
                    <li v-for="invoice in overdueInvoices" :key="invoice.id" class="mb-2">
                        {{ invoice.number }} - ${{ invoice.amount }} - {{ invoice.date }}
                    </li>
                </ul>
            </div>

            <!-- Export Invoice Data -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Export Invoice Data</h2>
                <div class="flex space-x-2">
                    <button @click="exportData('csv')"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as
                        CSV</button>
                    <button @click="exportData('excel')"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as
                        Excel</button>
                    <button @click="exportData('pdf')"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as
                        PDF</button>
                </div>
            </div>
        </div>
    </OwAuthenticatedLayout>
</template>
