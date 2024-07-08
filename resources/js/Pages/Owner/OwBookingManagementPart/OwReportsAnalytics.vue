<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import VueApexCharts from 'vue3-apexcharts';
import { Head } from '@inertiajs/vue3';

const bookingTrendsCtOpt = {
    chart: {
        type: 'line',
        height: '100%',
        width: '100%',
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    height: 300
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    height: 250
                }
            }
        }]
    },
    series: [{
        name: 'Bookings',
        data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + " bookings";
        },
        style: {
            colors: ['#334155']
        },
        offsetY: -20,
    },
    colors: ['#1E90FF'],
    grid: {
        show: false
    },
    legend: {
        show: false
    },
};

const utilizationReportsCtOpt = {
    chart: {
        type: 'bar',
        height: '100%',
        width: '100%',
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    height: 300
                }
            }
        }, {
            breakpoint: 480,
            options: {
                chart: {
                    height: 250
                }
            }
        }]
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            distributed: true,
            borderRadius: 10,
            borderRadiusApplication: 'end',
            dataLabels: {
                position: 'top'
            }
        },
    },
    series: [{
        name: 'Field Usage',
        data: [10, 20, 30, 40, 50, 60, 70, 80, 90]
    }],
    xaxis: {
        categories: ['Field 1', 'Field 2', 'Field 3', 'Field 4', 'Field 5', 'Field 6', 'Field 7', 'Field 8', 'Field 9'],
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + "%";
        },
        style: {
            colors: ['#333']
        },
        offsetY: -20,
    },
    colors: ['#22c55e'],
    grid: {
        show: false
    },
    legend: {
        show: false
    },
};

const revenueReportsCtOpt = {
    chart: {
        type: 'bar',
        height: 350,
    },
    plotOptions: {
        bar: {
            columnWidth: '50%',
            distributed: true,
            borderRadius: 10,
            borderRadiusApplication: 'end',
            dataLabels: {
                position: 'top'
            }
        },
    },
    series: [{
        name: 'Revenue',
        data: [28, 10, 45, 38, 15, 30, 35, 30, 8]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + "k";
        },
        style: {
            colors: ['#334155']
        },
        offsetY: -20,
    },
    colors: ['#22c55e'],
    grid: {
        show: false
    },
    legend: {
        show: false
    },
};

const demographicsCtOpt = {
    chart: {
        type: 'pie',
        height: 350,
    },
    series: [60, 40],
    labels: ['Male', 'Female'],
    colors: ['#1E90FF', '#FF69B4'],
    legend: {
        position: 'bottom'
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val.toFixed(1) + "%";
        },
    },
};
</script>

<template>
    <div class="flex flex-wrap gap-4 flex-auto lg:px-0">
        <!-- Booking Trends -->
        <Card class="flex-auto">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Booking Trends</h4>
                <VueApexCharts type="line" height="350" :options="bookingTrendsCtOpt"
                    :series="bookingTrendsCtOpt.series" />
            </div>
        </Card>

        <!-- Utilization Reports -->
        <Card class="flex-auto">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Utilization Reports</h4>
                <VueApexCharts type="bar" height="350" :options="utilizationReportsCtOpt"
                    :series="utilizationReportsCtOpt.series" />
            </div>
        </Card>

        <!-- Revenue Reports -->
        <Card class="flex-auto w-full">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Revenue Reports</h4>
                <VueApexCharts type="bar" height="350" :options="revenueReportsCtOpt"
                    :series="revenueReportsCtOpt.series" />
            </div>
        </Card>

        <!-- Customer Insights: Top Customers -->
        <Card class="flex-auto">
            <!-- Title -->
            <div class="flex flex-col space-y-2 flex-wrap mb-4 mt-2 mx-2">
                <h4 class="text-slate-800 font-medium text-lg leading-5">
                    Pelanggan Setia
                </h4>
                <p class="text-slate-500 leading-4">
                    Ringkasan Pelanggan Tahunan
                </p>
            </div>

            <!-- List Pelanggan -->
            <div class="flex flex-col space-y-4 mx-2 mt-4">
                <template v-for="index in 10" :key="index">
                    <div class="flex justify-between gap-4 items-center">

                        <div class="flex items-center gap-2">
                            <!-- Foto User -->
                            <div class="p-5 bg-indigo-300 rounded-full">

                            </div>

                            <!-- Username -->
                            <div class="flex flex-col">
                                <p class="text-sm font-medium text-slate-700 leading-5">John Doe {{ index }}</p>

                                <div class="flex justify-end items-center gap-1">
                                    <p class="text-sm text-slate-400 leading-5">{{ 200 - index }}</p>
                                    <ReceiptText :size="10" class="text-emerald-500" />
                                </div>
                            </div>
                        </div>

                        <!-- Pendapatan Dari User Tersebut -->
                        <div>
                            <p class="font-semibold text-green-600">Rp. {{ ((201 - index) * 125000).toLocaleString() }}</p>
                        </div>
                    </div>
                </template>
            </div>
        </Card>

        <!-- Customer Insights: Demographics -->
        <Card class="flex-auto">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Customer Demographics</h4>
                <VueApexCharts type="pie" height="350" :options="demographicsCtOpt"
                    :series="demographicsCtOpt.series" />
            </div>
        </Card>
    </div>
</template>
