<script setup>
import { ref } from 'vue';
import OwAuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';

const generalSettings = ref({ currency: '', taxRate: 0 });
const paymentMethods = ref('');
const invoiceSettings = ref({ prefix: '', dueDays: 0 });
const notificationSettings = ref({ email: false, sms: false });
const exportSettings = ref({ format: 'csv' });

const saveGeneralSettings = () => {
    // Implement save logic here
    console.log('General settings saved:', generalSettings.value);
};

const savePaymentMethods = () => {
    // Implement save logic here
    console.log('Payment methods saved:', paymentMethods.value);
};

const saveInvoiceSettings = () => {
    // Implement save logic here
    console.log('Invoice settings saved:', invoiceSettings.value);
};

const saveNotificationSettings = () => {
    // Implement save logic here
    console.log('Notification settings saved:', notificationSettings.value);
};

const saveExportSettings = () => {
    // Implement save logic here
    console.log('Export settings saved:', exportSettings.value);
};
</script>

<template>
    <OwAuthenticatedLayout>
        <div class="container mx-auto py-12">
            <h1 class="text-3xl font-bold mb-6">Financial Settings</h1>

            <!-- General Settings -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">General Settings</h2>
                <form @submit.prevent="saveGeneralSettings">
                    <div class="mb-4">
                        <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                        <input type="text" id="currency" v-model="generalSettings.currency"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="taxRate" class="block text-sm font-medium text-gray-700">Tax Rate (%)</label>
                        <input type="number" id="taxRate" v-model="generalSettings.taxRate"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Save
                        Settings</button>
                </form>
            </div>

            <!-- Payment Methods -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Payment Methods</h2>
                <form @submit.prevent="savePaymentMethods">
                    <div class="mb-4">
                        <label for="paymentMethods" class="block text-sm font-medium text-gray-700">Payment
                            Methods</label>
                        <input type="text" id="paymentMethods" v-model="paymentMethods"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Save
                        Methods</button>
                </form>
            </div>

            <!-- Invoice Settings -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Invoice Settings</h2>
                <form @submit.prevent="saveInvoiceSettings">
                    <div class="mb-4">
                        <label for="invoicePrefix" class="block text-sm font-medium text-gray-700">Invoice
                            Prefix</label>
                        <input type="text" id="invoicePrefix" v-model="invoiceSettings.prefix"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="invoiceDueDays" class="block text-sm font-medium text-gray-700">Due Days</label>
                        <input type="number" id="invoiceDueDays" v-model="invoiceSettings.dueDays"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Save
                        Settings</button>
                </form>
            </div>

            <!-- Notification Settings -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Notification Settings</h2>
                <form @submit.prevent="saveNotificationSettings">
                    <div class="mb-4">
                        <label for="emailNotifications" class="block text-sm font-medium text-gray-700">Email
                            Notifications</label>
                        <input type="checkbox" id="emailNotifications" v-model="notificationSettings.email"
                            class="mt-1 block">
                    </div>
                    <div class="mb-4">
                        <label for="smsNotifications" class="block text-sm font-medium text-gray-700">SMS
                            Notifications</label>
                        <input type="checkbox" id="smsNotifications" v-model="notificationSettings.sms"
                            class="mt-1 block">
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Save
                        Settings</button>
                </form>
            </div>

            <!-- Export Settings -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Export Settings</h2>
                <form @submit.prevent="saveExportSettings">
                    <div class="mb-4">
                        <label for="exportFormat" class="block text-sm font-medium text-gray-700">Default Export
                            Format</label>
                        <select id="exportFormat" v-model="exportSettings.format"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Save
                        Settings</button>
                </form>
            </div>
        </div>
    </OwAuthenticatedLayout>
</template>
