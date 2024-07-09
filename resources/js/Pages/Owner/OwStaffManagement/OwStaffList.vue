<script setup>
import { ref, computed } from 'vue';

const staffMembers = ref([
    { id: 1, name: 'John Doe', position: 'Manager', schedule: '9 AM - 5 PM', role: 'Admin', permission: 'Full Access' },
    { id: 2, name: 'Jane Smith', position: 'Assistant', schedule: '10 AM - 6 PM', role: 'User', permission: 'Limited Access' },
]);

const searchQuery = ref('');
const sortKey = ref('name');

const filteredAndSortedStaff = computed(() => {
    return staffMembers.value
        .filter(staff => {
            return (
                staff.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                staff.position.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                staff.schedule.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                staff.role.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                staff.permission.toLowerCase().includes(searchQuery.value.toLowerCase())
            );
        })
        .sort((a, b) => {
            if (a[sortKey.value] < b[sortKey.value]) return -1;
            if (a[sortKey.value] > b[sortKey.value]) return 1;
            return 0;
        });
});

const deleteStaff = (id) => {
    staffMembers.value = staffMembers.value.filter(staff => staff.id !== id);
};

const showModal = ref(false);
const newStaff = ref({ name: '', position: '', schedule: '', role: '', permission: '' });

const addStaff = () => {
    staffMembers.value.push({ ...newStaff.value, id: Date.now() });
    newStaff.value = { name: '', position: '', schedule: '', role: '', permission: '' };
    showModal.value = false;
};

const editStaff = (id) => {
    const staff = staffMembers.value.find(staff => staff.id === id);
    if (staff) {
        newStaff.value = { ...staff };
        showModal.value = true;
    }
};

const updateStaff = () => {
    const index = staffMembers.value.findIndex(staff => staff.id === newStaff.value.id);
    if (index !== -1) {
        staffMembers.value[index] = { ...newStaff.value };
        newStaff.value = { name: '', position: '', schedule: '', role: '', permission: '' };
        showModal.value = false;
    }
};
</script>

<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Staff</h1>

        <div class=" flex justify-between gap-4">
            <div>
                <!-- Search Staff -->
                <input v-model="searchQuery" placeholder="Cari staff..."
                    class="mb-4 p-2 border border-gray-300 rounded" />

                <!-- Sort Options -->
                <select v-model="sortKey" class="mb-4 pr-8  pl-2 py-2 border border-gray-300 rounded w-fit">
                    <option value="name">Nama</option>
                    <option value="position">Posisi</option>
                    <option value="schedule">Jadwal</option>
                    <option value="role">Role</option>
                    <option value="permission">Permission</option>
                </select>
            </div>

            <!-- Add New Staff Button -->
            <button @click="showModal = true" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Add New
                Staff</button>
        </div>

        <!-- Staff List -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Posisi</th>
                    <th class="py-2 px-4 border-b">Jadwal</th>
                    <th class="py-2 px-4 border-b">Role</th>
                    <th class="py-2 px-4 border-b">Permission</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="staff in filteredAndSortedStaff" :key="staff.id" class="border-t">
                    <td class="py-2 px-4 border-b">{{ staff.name }}</td>
                    <td class="py-2 px-4 border-b">{{ staff.position }}</td>
                    <td class="py-2 px-4 border-b">{{ staff.schedule }}</td>
                    <td class="py-2 px-4 border-b">{{ staff.role }}</td>
                    <td class="py-2 px-4 border-b">{{ staff.permission }}</td>
                    <td class="py-2 px-4 border-b">
                        <button @click="editStaff(staff.id)"
                            class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                        <button @click="deleteStaff(staff.id)"
                            class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Add/Edit Staff Modal -->
        <transition name="modal">
            <div v-if="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50"
                @click="showModal = false">
                <div class="bg-white px-8 py-6 shadow-lg w-full max-w-xl h-fit flex flex-col justify-center items-center rounded-lg"
                    @click.stop>
                    <h2 class="text-xl font-semibold mb-4">{{ newStaff.value.id ? 'Edit Staff' : 'Add New Staff' }}</h2>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Nama</label>
                        <input v-model="newStaff.name" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Posisi</label>
                        <input v-model="newStaff.position" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Jadwal</label>
                        <input v-model="newStaff.schedule" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Role</label>
                        <input v-model="newStaff.role" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block mb-2">Permission</label>
                        <input v-model="newStaff.permission" class="p-2 border border-gray-300 rounded w-full" />
                    </div>
                    <div class="flex justify-end w-full mt-4">
                        <button @click="showModal = false"
                            class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button @click="newStaff.value.id ? updateStaff() : addStaff()"
                            class="bg-blue-500 text-white px-4 py-2 rounded">{{ newStaff.value.id ? 'Update' : 'Add'
                            }}</button>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
