<script setup>
import { ref, computed } from 'vue';

const fields = ref([
    { id: 1, name: 'Lapangan A', type: 'Futsal', location: 'Jakarta', availability: 'Available' },
    { id: 2, name: 'Lapangan B', type: 'Basket', location: 'Bandung', availability: 'Not Available' },
]);

const searchQuery = ref('');
const sortKey = ref('name');
const showModal = ref(false);
const newField = ref({ name: '', type: '', location: '', availability: '' });

const filteredAndSortedFields = computed(() => {
    return fields.value
        .filter(field => {
            return (
                field.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                field.type.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                field.location.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                field.availability.toLowerCase().includes(searchQuery.value.toLowerCase())
            );
        })
        .sort((a, b) => {
            if (a[sortKey.value] < b[sortKey.value]) return -1;
            if (a[sortKey.value] > b[sortKey.value]) return 1;
            return 0;
        });
});

const addField = () => {
    fields.value.push({ ...newField.value, id: Date.now() });
    newField.value = { name: '', type: '', location: '', availability: '' };
    showModal.value = false;
};

const deleteField = (id) => {
    fields.value = fields.value.filter(field => field.id !== id);
};
</script>

<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Lapangan</h1>

        <!-- Search Fields -->
        <input
            v-model="searchQuery"
            placeholder="Cari lapangan..."
            class="mb-4 p-2 border border-gray-300 rounded"
        />

        <!-- Sort Options -->
        <select
            v-model="sortKey"
            class="mb-4 p-2 border border-gray-300 rounded"
        >
            <option value="name">Nama</option>
            <option value="type">Tipe</option>
            <option value="location">Lokasi</option>
            <option value="availability">Ketersediaan</option>
        </select>

        <!-- Add New Field Button -->
        <button @click="showModal = true" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Add New Field</button>

        <!-- Field List -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Tipe</th>
                    <th class="py-2 px-4 border-b">Lokasi</th>
                    <th class="py-2 px-4 border-b">Ketersediaan</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="field in filteredAndSortedFields" :key="field.id" class="border-t">
                    <td class="py-2 px-4 border-b">{{ field.name }}</td>
                    <td class="py-2 px-4 border-b">{{ field.type }}</td>
                    <td class="py-2 px-4 border-b">{{ field.location }}</td>
                    <td class="py-2 px-4 border-b">{{ field.availability }}</td>
                    <td class="py-2 px-4 border-b">
                        <button @click="deleteField(field.id)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Add New Field Modal -->
        <div v-if="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-4 rounded shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Add New Field</h2>
                <div class="mb-4">
                    <label class="block mb-2">Nama</label>
                    <input v-model="newField.name" class="p-2 border border-gray-300 rounded w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Tipe</label>
                    <input v-model="newField.type" class="p-2 border border-gray-300 rounded w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Lokasi</label>
                    <input v-model="newField.location" class="p-2 border border-gray-300 rounded w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Ketersediaan</label>
                    <input v-model="newField.availability" class="p-2 border border-gray-300 rounded w-full" />
                </div>
                <div class="flex justify-end">
                    <button @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button @click="addField" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
                </div>
            </div>
        </div>
    </div>
</template>
