<script setup>
import OwFmOverview from '@/Pages/Owner/OwFinancialManagement/OwFinancialOverview.vue'

import Card from '@/Components/Card.vue';
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col gap-4">
            <OwFmOverview />
        </div>
    </AuthenticatedLayout>
</template>
