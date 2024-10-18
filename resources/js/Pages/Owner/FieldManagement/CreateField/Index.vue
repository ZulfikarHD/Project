<script setup>
import OwnerAuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import FormCard from "@/Components/Card/FormCard.vue";
import { ref, defineEmits, defineProps, watch } from "vue";
import Swal from "sweetalert2"; // SweetAlert untuk alert

// Props untuk mengirim data dari parent
const props = defineProps({
    modelValue: Array, // Array untuk data lapangan yang dikirim dari parent
    sportList: Array,
    listVenue: Object,
});

// Definisikan emits untuk binding data dua arah dan navigasi langkah
const emit = defineEmits(["update:modelValue"]);

// Daftar olahraga (statis atau dimuat secara dinamis)
const sportsList = ref(props.sportList);
// Mengikat data lapangan dari parent
const fields = ref([]);
const venue = ref();
// Pantau perubahan pada lapangan dan kirim lapangan yang diperbarui ke parent
watch(
    fields,
    (newFields) => {
        emit("update:modelValue", newFields);
    },
    { deep: true }
);

// Tambah lapangan/arena baru
const addField = () => {
    fields.value.push({
        name: "",
        sports: [],
        image: null,
        imageUrl: "",
        equipment: [],
    });
};

// Hapus lapangan/arena
const removeField = (index) => {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda tidak akan dapat mengembalikannya!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            fields.value.splice(index, 1);
            Swal.fire("Dihapus!", "Lapangan/arena telah dihapus.", "success");
        }
    });
};

// Tambah peralatan ke lapangan
const addEquipment = (index) => {
    fields.value[index].equipment.push({
        name: "",
        quantity: 1,
    });
};

// Tangani unggahan gambar untuk setiap lapangan
const handleFieldImageUpload = (e, index) => {
    const file = e.target.files[0];
    if (file) {
        fields.value[index].image = file;
        fields.value[index].imageUrl = URL.createObjectURL(file); // Buat URL pratinjau
    }
};
</script>
<template>
    <OwnerAuthenticatedLayout>
        <div class="w-full max-w-5xl bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">
                Tambah Lapangan
            </h2>

            <!-- Nama Lapangan -->
            <div class="mb-6">
                <label
                    for="venue"
                    class="block text-sm font-medium text-gray-700"
                    >Venue</label
                >
                <select
                    v-model="venue"
                    id="venue"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                >
                <option v-for="venue in props.listVenue" value="{{ venue.id }}">{{ venue.name }}</option>
            </select>
            </div>

            <!-- Tambah Bagian Lapangan/Arena -->
            <div
                v-for="(field, index) in fields"
                :key="index"
                class="mb-8 p-6 border rounded-lg shadow-md bg-white"
            >
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">
                    Lapangan/Arena {{ index + 1 }}
                </h3>

                <!-- Nama Lapangan -->
                <div class="mb-6">
                    <label
                        :for="'field-name-' + index"
                        class="block text-sm font-medium text-gray-700"
                        >Nama Lapangan/Arena</label
                    >
                    <input
                        v-model="field.name"
                        :id="'field-name-' + index"
                        type="text"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                        placeholder="Masukkan nama lapangan/arena"
                    />
                </div>

                <!-- Jenis Olahraga (Checkbox untuk pengalaman mobile yang lebih baik) -->
                <div class="mb-6">
                    <label
                        :for="'field-sports-' + index"
                        class="block text-sm font-medium text-gray-700"
                        >Jenis Olahraga</label
                    >
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div
                            v-for="sport in sportsList"
                            :key="sport.sport_id"
                            class="flex items-center"
                        >
                            <input
                                type="checkbox"
                                :id="'sport-' + sport.sport_id + '-' + index"
                                :value="sport.sport_id"
                                v-model="field.sports"
                                class="mr-2"
                            />
                            <label
                                :for="'sport-' + sport.sport_id + '-' + index"
                                class="text-sm text-gray-700"
                                >{{ sport.name }}</label
                            >
                        </div>
                    </div>
                </div>

                <!-- Unggah Gambar Lapangan -->
                <div class="mb-6">
                    <label
                        :for="'field-image-' + index"
                        class="block text-sm font-medium text-gray-700"
                        >Gambar Lapangan</label
                    >
                    <input
                        type="file"
                        :id="'field-image-' + index"
                        @change="handleFieldImageUpload($event, index)"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-green-50 file:text-green-500 hover:file:bg-green-100"
                    />
                    <div v-if="field.imageUrl" class="mt-2">
                        <img
                            :src="field.imageUrl"
                            alt="Gambar Lapangan"
                            class="w-full h-40 object-cover rounded-md shadow-md"
                        />
                    </div>
                </div>

                <!-- Peralatan untuk Lapangan -->
                <div class="mb-6">
                    <label
                        :for="'field-equipment-' + index"
                        class="block text-sm font-medium text-gray-700"
                        >Peralatan</label
                    >
                    <div
                        v-for="(equipment, eqIndex) in field.equipment"
                        :key="eqIndex"
                        class="flex flex-col md:flex-row items-center mb-4"
                    >
                        <input
                            v-model="equipment.name"
                            type="text"
                            placeholder="Nama peralatan"
                            class="mr-2 mb-2 md:mb-0 md:w-2/3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                        />
                        <input
                            v-model="equipment.quantity"
                            type="number"
                            min="1"
                            placeholder="Jumlah"
                            class="w-full md:w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                        />
                    </div>
                    <button
                        type="button"
                        @click="addEquipment(index)"
                        class="text-green-500 hover:text-green-600 text-sm font-medium"
                    >
                        + Tambah Peralatan
                    </button>
                </div>

                <!-- Hapus Tombol Lapangan -->
                <button
                    type="button"
                    @click="removeField(index)"
                    class="w-full py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200"
                >
                    Hapus Lapangan/Arena
                </button>
            </div>

            <!-- Tambah Tombol Lapangan/Arena Baru -->
            <div class="flex justify-end">
                <button
                    type="button"
                    @click="addField"
                    class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200"
                >
                    + Tambah Lapangan/Arena Baru
                </button>
            </div>
        </div>
    </OwnerAuthenticatedLayout>
</template>
