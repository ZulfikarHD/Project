<script setup>
import AuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import { ref, defineProps, computed } from "vue";

const props = defineProps({
    fieldData: Array,
});

const showModal = ref(false);
const showDeleteConfirmation = ref(false);
const fieldToDelete = ref(null);
const searchQuery = ref("");
const sortKey = ref("name");
const currentPage = ref(1);
const itemsPerPage = 5;

const filteredFields = computed(() => {
    let filtered = props.fieldData;

    // Search filter
    if (searchQuery.value) {
        filtered = filtered.filter(field =>
            field.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            field.venue.name.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
    }

    // Sort
    filtered.sort((a, b) => {
        if (sortKey.value === "name") {
            return a.name.localeCompare(b.name);
        } else if (sortKey.value === "location") {
            return a.venue.address.localeCompare(b.venue.address);
        }
        return 0;
    });

    return filtered;
});

const paginatedFields = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    return filteredFields.value.slice(start, start + itemsPerPage);
});

const totalPages = computed(() => {
    return Math.ceil(filteredFields.value.length / itemsPerPage);
});

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const confirmDelete = (fieldId) => {
    fieldToDelete.value = fieldId;
    showDeleteConfirmation.value = true;
};

const deleteField = () => {
    // Logic to delete the field using fieldToDelete.value
    // After deletion, reset the confirmation modal
    showDeleteConfirmation.value = false;
    fieldToDelete.value = null;
};
</script>
<template>
    <AuthenticatedLayout>
        <div class="p-4">
            <h1 class="text-2xl font-bold mb-4">Daftar Lapangan</h1>

            <!-- Search Fields -->
            <input
                v-model="searchQuery"
                placeholder="Cari lapangan..."
                class="mb-4 p-2 border border-gray-300 rounded shadow"
            />

            <!-- Sort Options -->
            <select
                v-model="sortKey"
                class="mb-4 p-2 border border-gray-300 rounded shadow"
            >
                <option value="name">Nama</option>
                <option value="type">Tipe</option>
                <option value="location">Lokasi</option>
                <option value="availability">Ketersediaan</option>
            </select>

            <!-- Add New Field Button -->
            <button
                @click="$emit('show-modal')"
                class="mb-4 bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition"
            >
                Add New Field
            </button>
            <!-- Field List -->
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Lapangan</th>
                        <th class="py-2 px-4 border-b text-left">Venue</th>
                        <th class="py-2 px-4 border-b text-left">Lokasi</th>
                        <th class="py-2 px-4 border-b text-left">Olahraga</th>
                        <th class="py-2 px-4 border-b text-left">Fasilitas</th>
                        <th class="py-2 px-4 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="field in paginatedFields"
                        :key="field.id"
                        class="border-t hover:bg-gray-100"
                    >
                        <td class="py-2 px-4 border-b">
                            <div class="flex gap-4 items-center">
                                <img
                                    :src="field.field_images[0]?.image_url"
                                    :alt="field.name + 'image'"
                                    class="max-h-20 max-w-40 rounded-lg drop-shadow sm:h-48 object-cover flex-auto"
                                />
                                <p>
                                    {{ field.name }}
                                </p>
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b">{{ field.venue.name }}</td>
                        <td class="py-2 px-4 border-b">{{ field.venue.address }}</td>
                        <td class="py-2 px-4 border-b">
                            <div class="flex gap-2">
                                <span v-for="sportType in field.field_sports" class="px-3 py-1.5 bg-green-200 text-green-800 rounded-lg text-sm">{{ sportType.sport_id }}</span>
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b">-</td>
                        <td class="py-2 px-4 border-b">
                            <button
                                @click="confirmDelete(field.id)"
                                class="bg-red-500 text-white px-2 py-1 rounded shadow hover:bg-red-600 transition"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Delete Confirmation Modal -->
            <div v-if="showDeleteConfirmation" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold mb-2">Confirm Deletion</h2>
                    <p>Are you sure you want to delete this field?</p>
                    <div class="flex justify-end mt-4">
                        <button @click="deleteField" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600 transition">Yes, Delete</button>
                        <button @click="showDeleteConfirmation = false" class="ml-2 bg-gray-300 px-4 py-2 rounded shadow hover:bg-gray-400 transition">Cancel</button>
                    </div>
                </div>
            </div>

            <!-- Pagination Controls -->
            <div class="flex justify-center mt-4">
                <button @click="prevPage" :disabled="currentPage === 1" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">Previous</button>
                <span class="mx-2">Page {{ currentPage }} of {{ totalPages }}</span>
                <button @click="nextPage" :disabled="currentPage === totalPages" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">Next</button>
            </div>
            <div class="flex justify-center mt-2">
                <span v-for="page in totalPages" :key="page" class="mx-1">
                    <button
                        @click="currentPage = page"
                        :class="{'bg-blue-500 text-white': currentPage === page, 'bg-gray-300 text-black': currentPage !== page}"
                        class="px-3 py-1 rounded transition"
                    >
                        {{ page }}
                    </button>
                </span>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
