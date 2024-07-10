<script setup>
import { ref, computed } from 'vue';
import OwAuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';

const newExpense = ref({ name: '', amount: 0, category: '', date: '', vendor: '' });
const expenses = ref([]);

const addExpense = () => {
    expenses.value.push({ ...newExpense.value, id: Date.now() });
    newExpense.value = { name: '', amount: 0, category: '', date: '', vendor: '' };
};

const exportData = (format) => {
    // Implement export logic here
    console.log(`Exporting data as ${format}`);
};
</script>

<style scoped>
.btn-primary {
    background-color: #4f46e5;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    cursor: pointer;
}

.btn-secondary {
    background-color: #e5e7eb;
    color: #374151;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    cursor: pointer;
}
</style>

<template>
    <OwAuthenticatedLayout>
        <div class="container mx-auto py-12">
            <h1 class="text-3xl font-bold mb-6">Expenses</h1>

            <!-- Add New Expense Form -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Add New Expense</h2>
                    <form @submit.prevent="addExpense">
                        <div class="mb-4">
                            <label for="expenseName" class="block text-sm font-medium text-gray-700">Expense Name</label>
                            <input type="text" id="expenseName" v-model="newExpense.name" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="expenseAmount" class="block text-sm font-medium text-gray-700">Amount</label>
                            <input type="number" id="expenseAmount" v-model="newExpense.amount" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="expenseCategory" class="block text-sm font-medium text-gray-700">Category</label>
                            <input type="text" id="expenseCategory" v-model="newExpense.category" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="expenseDate" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="expenseDate" v-model="newExpense.date" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="expenseVendor" class="block text-sm font-medium text-gray-700">Vendor</label>
                            <input type="text" id="expenseVendor" v-model="newExpense.vendor" class="mt-1 block w-full" required>
                        </div>
                        <button type="submit" class="btn-primary">Add Expense</button>
                    </form>
                </div>
            </Card>

            <!-- View All Expenses -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">View All Expenses</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Expense Name</th>
                                <th class="py-2">Amount</th>
                                <th class="py-2">Category</th>
                                <th class="py-2">Date</th>
                                <th class="py-2">Vendor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="expense in expenses" :key="expense.id">
                                <td class="py-2">{{ expense.name }}</td>
                                <td class="py-2">${{ expense.amount }}</td>
                                <td class="py-2">{{ expense.category }}</td>
                                <td class="py-2">{{ expense.date }}</td>
                                <td class="py-2">{{ expense.vendor }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>

            <!-- Export Expense Data -->
            <Card>
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Export Expense Data</h2>
                    <div class="flex space-x-2">
                        <button @click="exportData('csv')" class="btn-secondary">Export as CSV</button>
                        <button @click="exportData('excel')" class="btn-secondary">Export as Excel</button>
                        <button @click="exportData('pdf')" class="btn-secondary">Export as PDF</button>
                    </div>
                </div>
            </Card>
        </div>
    </OwAuthenticatedLayout>
</template>
