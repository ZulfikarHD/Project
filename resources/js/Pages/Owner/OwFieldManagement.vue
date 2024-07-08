<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import OwFieldList from '@/Pages/Owner/OwFieldManagementPart/OwFieldList.vue';
import CalendarView from '@/Components/CalendarView.vue';
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import VueApexCharts from 'vue3-apexcharts';
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex gap-4">

            <!-- Calendar View -->
            <Card class="flex-auto">
                <CalendarView />
            </Card>

            <!-- View Sports Venue -->
            <Card class="flex-auto">
                <OwFieldList />
            </Card>

        </div>
    </AuthenticatedLayout>
</template>
