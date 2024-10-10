<script setup>
import AuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import { ref, defineProps } from "vue";

const props = defineProps({
    dataTable : {
        type : Array
    },
})

const showModal = ref(false);
const fields = ref(props.dataTable);

console.log(fields)

</script>

<template>
    <AuthenticatedLayout
        ><div class="p-4">
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
            <button
                @click="$emit('show-modal')"
                class="mb-4 bg-blue-500 text-white px-4 py-2 rounded"
            >
                Add New Field
            </button>

            <!-- Field List -->
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Venue</th>
                        <th class="py-2 px-4 border-b">Lokasi</th>
                        <th class="py-2 px-4 border-b">Lapangan</th>
                        <th class="py-2 px-4 border-b">Olahraga</th>
                        <th class="py-2 px-4 border-b">Fasilitas</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="field in fields"
                        :key="field.id"
                        class="border-t"
                    >
                        <td class="py-2 px-4 border-b">{{ field.name }}</td>
                        <td class="py-2 px-4 border-b">{{ field.type }}</td>
                        <td class="py-2 px-4 border-b">{{ field.location }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ field.availability }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button
                                @click="deleteField(field.id)"
                                class="bg-red-500 text-white px-2 py-1 rounded"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
