<script setup>
import { ref } from 'vue';
import OwAuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';

const newBudget = ref({ name: '', amount: 0 });
const budgets = ref([]);
const selectedBudget = ref(null);

const createBudget = () => {
    budgets.value.push({ ...newBudget.value, id: Date.now(), actualAmount: 0 });
    newBudget.value = { name: '', amount: 0 };
};

const editBudget = (budget) => {
    selectedBudget.value = { ...budget };
};

const updateBudget = () => {
    const index = budgets.value.findIndex(b => b.id === selectedBudget.value.id);
    if (index !== -1) {
        budgets.value[index] = { ...selectedBudget.value };
        selectedBudget.value = null;
    }
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
            <h1 class="text-3xl font-bold mb-6">Budgeting</h1>

            <!-- Create Budget Form -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Create Budget</h2>
                    <form @submit.prevent="createBudget">
                        <div class="mb-4">
                            <label for="budgetName" class="block text-sm font-medium text-gray-700">Budget Name</label>
                            <input type="text" id="budgetName" v-model="newBudget.name" class="mt-1 block w-full"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="budgetAmount" class="block text-sm font-medium text-gray-700">Amount</label>
                            <input type="number" id="budgetAmount" v-model="newBudget.amount" class="mt-1 block w-full"
                                required>
                        </div>
                        <button type="submit" class="btn-primary">Create Budget</button>
                    </form>
                </div>
            </Card>

            <!-- View Budgets -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">View Budgets</h2>
                    <ul>
                        <li v-for="budget in budgets" :key="budget.id" class="mb-2 flex justify-between items-center">
                            <span>{{ budget.name }} - ${{ budget.amount }}</span>
                            <button @click="editBudget(budget)" class="btn-secondary ml-4">Edit</button>
                        </li>
                    </ul>
                </div>
            </Card>

            <!-- Budget vs Actual -->
            <Card class="mb-8">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Budget vs Actual</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Budget Name</th>
                                <th class="py-2">Budgeted Amount</th>
                                <th class="py-2">Actual Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="budget in budgets" :key="budget.id">
                                <td class="py-2">{{ budget.name }}</td>
                                <td class="py-2">${{ budget.amount }}</td>
                                <td class="py-2">${{ budget.actualAmount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>

            <!-- Adjust Budget Form -->
            <Card class="mb-8" v-if="selectedBudget">
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Adjust Budget</h2>
                    <form @submit.prevent="updateBudget">
                        <div class="mb-4">
                            <label for="adjustedBudgetName" class="block text-sm font-medium text-gray-700">Budget
                                Name</label>
                            <input type="text" id="adjustedBudgetName" v-model="selectedBudget.name"
                                class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="adjustedBudgetAmount"
                                class="block text-sm font-medium text-gray-700">Amount</label>
                            <input type="number" id="adjustedBudgetAmount" v-model="selectedBudget.amount"
                                class="mt-1 block w-full" required>
                        </div>
                        <button type="submit" class="btn-primary">Update Budget</button>
                    </form>
                </div>
            </Card>

            <!-- Export Budget Data -->
            <Card>
                <div class="p-4">
                    <h2 class="text-2xl font-semibold mb-4">Export Budget Data</h2>
                    <div class="flex space-x-2">
                        <button @click="exportData('csv')" class="btn-secondary">Export as CSV</button>
                        <button @click="exportData('excel')" class="btn-secondary">Export as Excel</button>s
                        <button @click="exportData('pdf')" class="btn-secondary">Export as PDF</button>
                    </div>
                </div>
            </Card>
        </div>
    </OwAuthenticatedLayout>
</template>
