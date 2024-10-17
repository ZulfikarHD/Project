<script setup>
import OwnerAuthenticatedLayout from "@/Layouts/Owner/OwAuthenticatedLayout.vue";
import FormCard from "@/Components/Card/FormCard.vue";
import { ref, defineEmits, defineProps, watch } from "vue";
import Swal from "sweetalert2"; // SweetAlert for alerts

// Props for passing data from the parent
const props = defineProps({
    modelValue: Array, // Array for fields data passed from parent
    sportList: Array,
});

// Define emits for two-way data binding and step navigation
const emit = defineEmits(["update:modelValue"]);

// Sports list (static or dynamically loaded)
const sportsList = ref(props.sportList);
// Bind fields data from parent
const fields = ref([]);

// Watch for changes in fields and emit the updated fields to parent
watch(fields, (newFields) => {
    emit("update:modelValue", newFields);
}, { deep: true });

// Add a new field/court
const addField = () => {
    fields.value.push({
        name: "",
        sports: [],
        image: null,
        imageUrl: "",
        equipment: [],
    });
};

// Remove a field/court
const removeField = (index) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won’t be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, remove it!",
    }).then((result) => {
        if (result.isConfirmed) {
            fields.value.splice(index, 1);
            Swal.fire("Removed!", "The field/court has been removed.", "success");
        }
    });
};

// Add equipment to a field
const addEquipment = (index) => {
    fields.value[index].equipment.push({
        name: "",
        quantity: 1,
    });
};

// Handle image upload for each field
const handleFieldImageUpload = (e, index) => {
    const file = e.target.files[0];
    if (file) {
        fields.value[index].image = file;
        fields.value[index].imageUrl = URL.createObjectURL(file); // Create a preview URL
    }
};

</script>
<template>
    <OwnerAuthenticatedLayout>
        <div class="w-full max-w-5xl bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">
                Facility Information
            </h2>

            <!-- Add Fields/Courts Section -->
            <div v-for="(field, index) in fields" :key="index" class="mb-8 p-6 border rounded-lg shadow-md bg-white">
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">
                    Field/Court {{ index + 1 }}
                </h3>

                <!-- Field Name -->
                <div class="mb-6">
                    <label
                        :for="'field-name-' + index"
                        class="block text-sm font-medium text-gray-700"
                    >Field/Court Name</label>
                    <input
                        v-model="field.name"
                        :id="'field-name-' + index"
                        type="text"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                        placeholder="Enter field/court name"
                    />
                </div>

                <!-- Sports Type (Checkboxes for better mobile experience) -->
                <div class="mb-6">
                    <label
                        :for="'field-sports-' + index"
                        class="block text-sm font-medium text-gray-700"
                    >Sports Type</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div v-for="sport in sportsList" :key="sport.sport_id" class="flex items-center">
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
                            >{{ sport.name }}</label>
                        </div>
                    </div>
                </div>

                <!-- Field Image Upload -->
                <div class="mb-6">
                    <label
                        :for="'field-image-' + index"
                        class="block text-sm font-medium text-gray-700"
                    >Field Image</label>
                    <input
                        type="file"
                        :id="'field-image-' + index"
                        @change="handleFieldImageUpload($event, index)"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-green-50 file:text-green-500 hover:file:bg-green-100"
                    />
                    <div v-if="field.imageUrl" class="mt-2">
                        <img
                            :src="field.imageUrl"
                            alt="Field Image"
                            class="w-full h-40 object-cover rounded-md shadow-md"
                        />
                    </div>
                </div>

                <!-- Equipment for the Field -->
                <div class="mb-6">
                    <label
                        :for="'field-equipment-' + index"
                        class="block text-sm font-medium text-gray-700"
                    >Equipment</label>
                    <div
                        v-for="(equipment, eqIndex) in field.equipment"
                        :key="eqIndex"
                        class="flex flex-col md:flex-row items-center mb-4"
                    >
                        <input
                            v-model="equipment.name"
                            type="text"
                            placeholder="Equipment name"
                            class="mr-2 mb-2 md:mb-0 md:w-2/3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                        />
                        <input
                            v-model="equipment.quantity"
                            type="number"
                            min="1"
                            placeholder="Quantity"
                            class="w-full md:w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 p-2"
                        />
                    </div>
                    <button
                        type="button"
                        @click="addEquipment(index)"
                        class="text-green-500 hover:text-green-600 text-sm font-medium"
                    >
                        + Add Equipment
                    </button>
                </div>

                <!-- Remove Field Button -->
                <button
                    type="button"
                    @click="removeField(index)"
                    class="w-full py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200"
                >
                    Remove Field/Court
                </button>
            </div>

            <!-- Add New Field/Court Button -->
            <div class="flex justify-end">
                <button
                    type="button"
                    @click="addField"
                    class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200"
                >
                    + Add New Field/Court
                </button>
            </div>
        </div>
    </OwnerAuthenticatedLayout>
</template>
