
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

const expenseCategories = computed(() => {
    return [...new Set(expenses.value.map(expense => expense.category))];
});

const expensesByCategory = (category) => {
    return expenses.value.filter(expense => expense.category === category);
};

const expenseDates = computed(() => {
    return [...new Set(expenses.value.map(expense => expense.date))];
});

const expensesByDate = (date) => {
    return expenses.value.filter(expense => expense.date === date);
};

const expenseVendors = computed(() => {
    return [...new Set(expenses.value.map(expense => expense.vendor))];
});

const expensesByVendor = (vendor) => {
    return expenses.value.filter(expense => expense.vendor === vendor);
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
                    <ul>
                        <li v-for="expense in expenses" :key="expense.id" class="mb-2 flex justify-between items-center">
                            <span>{{ expense.name }} - ${{ expense.amount }} - {{ expense.category }} - {{ expense.date }} - {{ expense.vendor }}</span>
                        </li>
                    </ul>
                </div>
            </Card>

            <!-- Expenses by Category -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Expenses by Category</h2>
                    <ul>
                        <li v-for="category in expenseCategories" :key="category" class="mb-2">
                            <h3 class="text-xl font-medium">{{ category }}</h3>
                            <ul>
                                <li v-for="expense in expensesByCategory(category)" :key="expense.id" class="ml-4">
                                    {{ expense.name }} - ${{ expense.amount }} - {{ expense.date }} - {{ expense.vendor }}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </Card>

            <!-- Expenses by Date -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Expenses by Date</h2>
                    <ul>
                        <li v-for="date in expenseDates" :key="date" class="mb-2">
                            <h3 class="text-xl font-medium">{{ date }}</h3>
                            <ul>
                                <li v-for="expense in expensesByDate(date)" :key="expense.id" class="ml-4">
                                    {{ expense.name }} - ${{ expense.amount }} - {{ expense.category }} - {{ expense.vendor }}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </Card>

            <!-- Expenses by Vendor -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Expenses by Vendor</h2>
                    <ul>
                        <li v-for="vendor in expenseVendors" :key="vendor" class="mb-2">
                            <h3 class="text-xl font-medium">{{ vendor }}</h3>
                            <ul>
                                <li v-for="expense in expensesByVendor(vendor)" :key="expense.id" class="ml-4">
                                    {{ expense.name }} - ${{ expense.amount }} - {{ expense.category }} - {{ expense.date }}
                                </li>
                            </ul>
                        </li>
                    </ul>
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

