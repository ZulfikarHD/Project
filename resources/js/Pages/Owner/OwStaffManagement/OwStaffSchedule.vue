<script setup>
import { ref } from 'vue';
import CalendarView from '@/Components/CalendarView.vue';
import Card from '@/Components/Card.vue';

const showModal = ref(false);
const selectedShift = ref(null);
const shifts = ref([
    { id: 1, staff: 'John Doe', date: '2023-05-01', time: '09:00 - 17:00', availability: 'Available' },
    { id: 2, staff: 'Jane Smith', date: '2023-05-02', time: '10:00 - 18:00', availability: 'Not Available' },
]);

const newShift = ref({ staff: '', date: '', time: '', availability: '' });
const searchQuery = ref(''); // Added searchQuery
const sortKey = ref('name'); // Added sortKey

const addShift = () => {
    shifts.value.push({ ...newShift.value, id: Date.now() });
    newShift.value = { staff: '', date: '', time: '', availability: '' };
    showModal.value = false;
};

const modifyShift = (shift) => {
    selectedShift.value = shift;
    newShift.value = { ...shift };
    showModal.value = true;
};

const saveShift = () => {
    const index = shifts.value.findIndex(shift => shift.id === selectedShift.value.id);
    if (index !== -1) {
        shifts.value[index] = { ...newShift.value };
    }
    newShift.value = { staff: '', date: '', time: '', availability: '' };
    selectedShift.value = null;
    showModal.value = false;
};
</script>

<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Staff Schedule</h1>

        <div class="flex gap-4">
            <!-- Calendar View -->
            <Card class="mb-4 max-w-xl">
                <CalendarView />
            </Card>

            <div class="flex-auto">
                <!-- Add New Shift Button -->
                <div class="flex justify-between gap-4">
                    <div>
                        <!-- Search Staff -->
                        <input v-model="searchQuery" placeholder="Cari staff..."
                            class="mb-4 p-2 border border-gray-300 rounded" />

                        <!-- Sort Options -->
                        <select v-model="sortKey" class="mb-4 pr-8  pl-2 py-2 border border-gray-300 rounded w-fit">
                            <option value="name">Nama</option>
                            <option value="position">Posisi</option>
                            <option value="schedule">Jadwal</option>
                        </select>
                    </div>
                    <button @click="showModal = true" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Add New
                        Shift</button>
                </div>

                <!-- Shift List -->
                <table class="min-w-full bg-white h-[86%]">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Staff</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Time</th>
                            <th class="py-2 px-4 border-b">Availability</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="shift in shifts" :key="shift.id" class="border-t">
                            <td class="py-2 px-4 border-b">{{ shift.staff }}</td>
                            <td class="py-2 px-4 border-b">{{ shift.date }}</td>
                            <td class="py-2 px-4 border-b">{{ shift.time }}</td>
                            <td class="py-2 px-4 border-b">{{ shift.availability }}</td>
                            <td class="py-2 px-4 border-b">
                                <button @click="modifyShift(shift)"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded">Modify</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add/Modify Shift Modal -->
        <transition name="modal">
            <div v-if="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                @click="showModal = false">
                <div class="bg-white px-8 py-6 shadow-lg w-full max-w-xl h-fit flex flex-col justify-center items-center rounded-lg"
                    @click.stop>
                    <h2 class="text-xl font-semibold mb-4">{{ selectedShift ? 'Modify' : 'Add New' }} Shift</h2>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Staff</label>
                        <input v-model="newShift.staff" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Date</label>
                        <input v-model="newShift.date" type="date" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Time</label>
                        <input v-model="newShift.time" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Availability</label>
                        <input v-model="newShift.availability" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="flex justify-end w-full mt-4">
                        <button @click="showModal = false"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button @click="selectedShift ? saveShift() : addShift()"
                            class="bg-blue-500 text-white px-4 py-2 rounded">{{ selectedShift ? 'Save' : 'Add'
                            }}</button>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.modal-enter-active,
.modal-leave-active {
    transition: all 0.3s ease;
}

.modal-enter,
.modal-leave-to

/* .modal-leave-active in <2.1.8 */
    {
    transform: translateY(-10px);
    opacity: 0;
}
</style>
