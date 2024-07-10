<script setup>
import { ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import { DollarSign, CreditCard, CalendarCheck, User, FileText } from 'lucide-vue-next';

// Data properties
const revenues = ref([]);
const newRevenue = ref({
  date: '',
  field: '',
  customer: '',
  amount: 0
});
const isModalOpen = ref(false); // State to control modal visibility

// Methods
const addRevenue = () => {
  if (newRevenue.value.date && newRevenue.value.field && newRevenue.value.customer && newRevenue.value.amount) {
    revenues.value.push({ ...newRevenue.value });
    newRevenue.value = { date: '', field: '', customer: '', amount: 0 }; // Reset form
    isModalOpen.value = false; // Close modal after adding revenue
  }
};

const exportData = (format) => {
  // logic to export data in the specified format
};

// Computed properties for summaries
const totalRevenue = computed(() => revenues.value.reduce((sum, revenue) => sum + revenue.amount, 0));
const revenueByField = computed(() => {
  const result = {};
  revenues.value.forEach(revenue => {
    if (!result[revenue.field]) result[revenue.field] = 0;
    result[revenue.field] += revenue.amount;
  });
  return result;
});
const revenueByDate = computed(() => {
  const result = {};
  revenues.value.forEach(revenue => {
    if (!result[revenue.date]) result[revenue.date] = 0;
    result[revenue.date] += revenue.amount;
  });
  return result;
});
const revenueByCustomer = computed(() => {
  const result = {};
  revenues.value.forEach(revenue => {
    if (!result[revenue.customer]) result[revenue.customer] = 0;
    result[revenue.customer] += revenue.amount;
  });
  return result;
});
</script>

<template>
  <AuthenticatedLayout>
    <div>
      <h1>Revenue Management</h1>

      <!-- View All Revenue -->
      <Card class="mb-4">
        <h2>All Revenue</h2>
        <button @click="isModalOpen = true" class="bg-blue-500 text-white p-2 rounded mb-4">Add New Revenue</button>
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">Date</th>
              <th class="py-2 px-4 border-b">Field</th>
              <th class="py-2 px-4 border-b">Customer</th>
              <th class="py-2 px-4 border-b">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(revenue, index) in revenues" :key="index" class="border-t">
              <td class="py-2 px-4 border-b">{{ revenue.date }}</td>
              <td class="py-2 px-4 border-b">{{ revenue.field }}</td>
              <td class="py-2 px-4 border-b">{{ revenue.customer }}</td>
              <td class="py-2 px-4 border-b">{{ revenue.amount }}</td>
            </tr>
          </tbody>
        </table>
      </Card>

      <!-- Add New Revenue Modal -->
      <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <Card class="p-4 rounded shadow-lg w-1/2">
          <h2>Add New Revenue</h2>
          <form @submit.prevent="addRevenue" class="mb-4">
            <div class="mb-2">
              <label for="date" class="block">Date:</label>
              <input id="date" v-model="newRevenue.date" type="date" required class="w-full p-2 border rounded" />
            </div>
            <div class="mb-2">
              <label for="field" class="block">Field:</label>
              <input id="field" v-model="newRevenue.field" type="text" required class="w-full p-2 border rounded" />
            </div>
            <div class="mb-2">
              <label for="customer" class="block">Customer:</label>
              <input id="customer" v-model="newRevenue.customer" type="text" required class="w-full p-2 border rounded" />
            </div>
            <div class="mb-2">
              <label for="amount" class="block">Amount:</label>
              <input id="amount" v-model="newRevenue.amount" type="number" required class="w-full p-2 border rounded" />
            </div>
            <div class="flex justify-end gap-2">
              <button type="button" @click="isModalOpen = false" class="bg-gray-500 text-white p-2 rounded">Cancel</button>
              <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Revenue</button>
            </div>
          </form>
        </Card>
      </div>

      <!-- Revenue by Field -->
      <Card class="mb-4">
        <h2>Revenue by Field</h2>
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">Field</th>
              <th class="py-2 px-4 border-b">Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(amount, field) in revenueByField" :key="field" class="border-t">
              <td class="py-2 px-4 border-b">{{ field }}</td>
              <td class="py-2 px-4 border-b">{{ amount }}</td>
            </tr>
          </tbody>
        </table>
      </Card>

      <!-- Revenue by Date -->
      <Card class="mb-4">
        <h2>Revenue by Date</h2>
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">Date</th>
              <th class="py-2 px-4 border-b">Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(amount, date) in revenueByDate" :key="date" class="border-t">
              <td class="py-2 px-4 border-b">{{ date }}</td>
              <td class="py-2 px-4 border-b">{{ amount }}</td>
            </tr>
          </tbody>
        </table>
      </Card>

      <!-- Revenue by Customer -->
      <Card class="mb-4">
        <h2>Revenue by Customer</h2>
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">Customer</th>
              <th class="py-2 px-4 border-b">Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(amount, customer) in revenueByCustomer" :key="customer" class="border-t">
              <td class="py-2 px-4 border-b">{{ customer }}</td>
              <td class="py-2 px-4 border-b">{{ amount }}</td>
            </tr>
          </tbody>
        </table>
      </Card>

      <!-- Export Revenue Data -->
      <Card class="mb-4">
        <h2>Export Revenue Data</h2>
        <div class="flex gap-2">
          <button @click="exportData('csv')" class="bg-green-500 text-white p-2 rounded">Export as CSV</button>
          <button @click="exportData('excel')" class="bg-yellow-500 text-white p-2 rounded">Export as Excel</button>
          <button @click="exportData('pdf')" class="bg-red-500 text-white p-2 rounded">Export as PDF</button>
        </div>
      </Card>
    </div>
  </AuthenticatedLayout>
</template>
