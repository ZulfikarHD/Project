<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import OwStaffList from '@/Pages/Owner/OwStaffManagement/OwStaffList.vue';
import OwStaffSchedule from '@/Pages/Owner/OwStaffManagement/OwStaffSchedule.vue';
import Card from '@/Components/Card.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col gap-4">
            <!-- Staff Schedule -->
            <div class="flex-auto">
                <OwStaffSchedule />
            </div>

            <!-- Staff List -->
            <OwStaffList />
        </div>
    </AuthenticatedLayout>
</template>
