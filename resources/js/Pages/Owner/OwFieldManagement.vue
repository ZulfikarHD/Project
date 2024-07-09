<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import OwFieldList from '@/Pages/Owner/OwFieldManagementPart/OwFieldList.vue';
import OwMaintenanceLog from '@/Pages/Owner/OwFieldManagementPart/OwMaintenanceLog.vue';
import OwFieldAnalytics from '@/Pages/Owner/OwFieldManagementPart/OwFieldAnalytics.vue';
import CalendarView from '@/Components/CalendarView.vue';
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import VueApexCharts from 'vue3-apexcharts';
import { ref } from 'vue';

const showModal = ref(false);
const newField = ref({ name: '', type: '', location: '', availability: '' });

const addField = () => {
    // Assuming fields is accessible here or passed as a prop
    fields.value.push({ ...newField.value, id: Date.now() });
    newField.value = { name: '', type: '', location: '', availability: '' };
    showModal.value = false;
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col gap-4">
            <div class="flex gap-4">

                <!-- Calendar View -->
                <Card class="flex-auto">
                    <CalendarView />
                </Card>

                <!-- View Sports Venue -->
                <Card class="flex-auto">
                    <OwFieldList @show-modal="showModal = true" />
                </Card>

            </div>

            <!-- Mainetenace Log -->
            <Card class="flex-auto">
                <OwMaintenanceLog />
            </Card>

            <OwFieldAnalytics />

            <!-- Add New Field Modal -->
            <transition name="modal">
                <div v-if="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50" @click="showModal = false">
                    <div class="bg-white px-8 py-6 shadow-lg w-full max-w-xl h-fit flex flex-col justify-center items-center rounded-lg" @click.stop>
                        <h2 class="text-xl font-semibold mb-4">Add New Field</h2>
                        <div class="mb-4 w-full">
                            <label class="block mb-2">Nama</label>
                            <input v-model="newField.name" class="p-2 border border-gray-300 rounded w-full" />
                        </div>
                        <div class="mb-4 w-full">
                            <label class="block mb-2">Tipe</label>
                            <input v-model="newField.type" class="p-2 border border-gray-300 rounded w-full" />
                        </div>
                        <div class="mb-4 w-full">
                            <label class="block mb-2">Lokasi</label>
                            <input v-model="newField.location" class="p-2 border border-gray-300 rounded w-full" />
                        </div>
                        <div class="mb-4 w-full">
                            <label class="block mb-2">Ketersediaan</label>
                            <input v-model="newField.availability" class="p-2 border border-gray-300 rounded w-full" />
                        </div>
                        <div class="flex justify-end w-full mt-4">
                            <button @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                            <button @click="addField" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.modal-enter-active, .modal-leave-active {
    transition: all 0.3s ease;
}
.modal-enter, .modal-leave-to /* .modal-leave-active in <2.1.8 */ {
    transform: translateY(-10px);
    opacity: 0;
}
</style>
