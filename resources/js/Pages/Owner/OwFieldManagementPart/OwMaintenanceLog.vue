<script setup>
import { ref } from 'vue';

const maintenanceLogs = ref([
    { id: 1, fieldName: 'Field A', date: '2023-01-15', description: 'Replaced grass' },
    { id: 2, fieldName: 'Field B', date: '2023-02-10', description: 'Fixed lighting' },
]);

const newLog = ref({
    fieldName: '',
    date: '',
    description: ''
});

const addMaintenanceLog = () => {
    if (newLog.value.fieldName && newLog.value.date && newLog.value.description) {
        maintenanceLogs.value.push({
            id: maintenanceLogs.value.length + 1,
            fieldName: newLog.value.fieldName,
            date: newLog.value.date,
            description: newLog.value.description
        });
        newLog.value.fieldName = '';
        newLog.value.date = '';
        newLog.value.description = '';
    }
};
</script>

<template>
    <div>
        <h2 class="text-xl font-bold mb-4">Maintenance Log</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Field Name</th>
                    <th class="py-2 px-4 border-b">Maintenance Date</th>
                    <th class="py-2 px-4 border-b">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="log in maintenanceLogs" :key="log.id">
                    <td class="py-2 px-4 border-b">{{ log.fieldName }}</td>
                    <td class="py-2 px-4 border-b">{{ log.date }}</td>
                    <td class="py-2 px-4 border-b">{{ log.description }}</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <h3 class="text-lg font-semibold mb-2">Add Maintenance Record</h3>
            <form @submit.prevent="addMaintenanceLog">
                <div class="mb-2">
                    <label for="fieldName" class="block text-sm font-medium text-gray-700">Field Name</label>
                    <input type="text" v-model="newLog.fieldName" id="fieldName"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-2">
                    <label for="date" class="block text-sm font-medium text-gray-700">Maintenance Date</label>
                    <input type="date" v-model="newLog.date" id="date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="newLog.description" id="description"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Add Record</button>
            </form>
        </div>
    </div>
</template>
