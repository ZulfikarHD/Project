<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import CalendarView from '@/Components/CalendarView.vue';
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import VueApexCharts from 'vue3-apexcharts';
</script>

<template>
    <AuthenticatedLayout>
        <CalendarView />
    </AuthenticatedLayout>
</template>
