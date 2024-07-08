<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';

import OwBookingList from '@/Pages/Owner/OwBookingManagementPart/OwBookingList.vue';
import OwFormCreateBooking from '@/Pages/Owner/OwBookingManagementPart/OwFormCreateBooking.vue';
import OwBookingHistory from '@/Pages/Owner/OwBookingManagementPart/OwBookingHistory.vue';
import OwReportsAnalytics from '@/Pages/Owner/OwBookingManagementPart/OwReportsAnalytics.vue';

import CalendarView from '@/Components/CalendarView.vue';
import Card from '@/Components/Card.vue';
import VueApexCharts from 'vue3-apexcharts';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-wrap gap-4 px-4 lg:px-0">
            <div class="flex flex-col gap-4">
                <!-- Calendar -->
                <Card class="w-full lg:w-[48rem]">
                    <div class="p-4">
                        <div class="w-full h-auto overflow-hidden">
                            <CalendarView class="w-full h-auto" />
                        </div>
                    </div>
                </Card>

                <!-- Booking List -->
                <Card    class="w-full lg:w-[48rem] h-full">
                    <div class="p-4">
                        <div class="w-full h-auto overflow-hidden">
                            <OwBookingList class="w-full h-auto" />
                        </div>
                    </div>
                </Card>
            </div>

            <div class="flex flex-col gap-4 flex-auto">

                <!-- Form Create Booking -->
                <Card class="w-full flex-auto">
                    <div class="p-4">
                        <div class="w-full h-auto overflow-hidden">
                            <OwFormCreateBooking class="w-full h-auto" />
                        </div>
                    </div>
                </Card>

                <!-- Booking History -->
                <Card class="w-full flex-auto">
                    <div class="p-4">
                        <div class="w-full h-auto overflow-hidden">
                            <OwBookingHistory class="w-full h-auto" />
                        </div>
                    </div>
                </Card>
            </div>

            <!-- Reports And Analytics -->
            <div class="w-full h-auto overflow-hidden">
                <OwReportsAnalytics class="w-full h-auto" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

