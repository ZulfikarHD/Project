<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import { Head } from '@inertiajs/vue3';
import VueApexCharts from 'vue3-apexcharts';
import {
    CalendarCheck,
    DollarSign,
    NotebookPen,
    BarChart2,
    Link,
    EllipsisVertical,
} from 'lucide-vue-next';

const chartOptions = {
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
    colors: ['#22c55e'],
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
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return val + "k";
            },
        },
    },
    grid: {
        show: false
    },
    legend: {
        show: false
    },
    series: [{
        name: 'Revenue',
        data: [28, 10, 45, 38, 15, 30, 35, 30, 8]
    }]
};
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Section 1 -->
        <div class="flex flex-wrap justify-center lg:justify-start gap-4">

            <!-- Reservasi -->
            <Card class="flex-grow lg:flex-grow-0">
                <div class="flex flex-col m-2 space-y-4">
                    <!-- Card Text -->
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-blue-100 p-2 rounded-lg w-fit h-fit">
                            <CalendarCheck class="text-blue-500">

                            </CalendarCheck>
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Reservasi
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Satu Minggu Terakhir
                            </p>
                        </div>
                    </div>

                    <!-- Chart -->
                    <chart>Ini Chart</chart>

                    <!-- Total Reservasi -->
                    <div class="flex flex-wrap justify-between gap-4 items-center">
                        <h3 class="text-xl font-medium text-slate-800">
                            1.415 <span class="text-sm text-slate-500 font-normal">Reservasi</span>
                        </h3>

                        <span
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm font-medium h-fit">+24,5%</span>
                    </div>

                </div>
            </Card>

            <!-- Pendapatan -->
            <Card class="flex-grow lg:flex-grow-0">
                <div class="flex flex-col m-2 space-y-4">
                    <!-- Card Text -->
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-green-100 p-2 rounded-lg w-fit h-fit">
                            <DollarSign class="text-green-500">

                            </DollarSign>
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Pendapatan
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Satu Minggu Terakhir
                            </p>
                        </div>
                    </div>

                    <!-- Chart -->
                    <chart>Ini Chart</chart>

                    <!-- Total Pendapatan -->
                    <div class="flex flex-wrap justify-between gap-4 items-center">
                        <h3 class="text-xl font-medium text-slate-800">
                            RP. 5.621.000
                        </h3>

                        <span
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm font-medium h-fit">+22,5%</span>
                    </div>

                </div>
            </Card>

            <!-- Average Booking Value -->
            <Card class="flex-grow lg:flex-grow-0">
                <div class="flex flex-col m-2 space-y-4">
                    <!-- Card Text -->
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-indigo-100 p-2 rounded-lg w-fit h-fit">
                            <BarChart2 class="text-indigo-500">

                            </BarChart2>
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5 w-[15ch]">
                                Pendapatan Rata<sup>2</sup> Reservasi
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Satu Minggu Terakhir
                            </p>
                        </div>
                    </div>

                    <!-- Total Reservasi -->
                    <div class="flex flex-wrap gap-4 pt-4">
                        <h3 class="text-xl font-medium text-slate-800">
                            RP. 5.621.000
                        </h3>

                        <span
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm font-medium h-fit w-fit">+22,5%</span>
                    </div>

                </div>
            </Card>

            <!-- Utilization Rate -->
            <Card>

            </Card>

            <!-- Revenue Growth -->
            <Card class="flex-grow">
                <div class="flex gap-4">

                    <!-- Title -->
                    <div class="flex flex-col m-2 space-y-4">
                        <!-- Card Text -->
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5 w-[15ch]">
                                Pertumbuhan Pendapatan
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Laporan Mingguan
                            </p>
                        </div>

                        <!-- Total Reservasi -->
                        <div class="flex flex-col gap-4 pt-4">
                            <h3 class="text-xl font-medium text-slate-800">
                                RP. 5.621.000
                            </h3>

                            <span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm font-medium h-fit w-fit">+22,5%</span>
                        </div>
                    </div>

                    <!-- Chart -->
                    <!-- <VueApexCharts type="bar" height="350" :options="chartOptions" :series="chartOptions.series"></VueApexCharts> -->
                </div>
            </Card>

            <!-- Customer Aquisition Cost -->
            <!-- <Card>

            </Card> -->

            <!-- Booking Trends Graoh -->
            <!-- <Card>

            </Card> -->

        </div>

        <!-- Section 2 -->
        <div class="flex gap-4 flex-wrap mt-4">
            <!-- Report Pendapatan -->
            <Card class="flex-grow">
                <div class="flex flex-col gap-4 m-2">

                    <div class="flex justify-between">
                        <!-- Title -->
                        <div class="flex gap-4">
                            <!-- Card Text -->
                            <div class="flex flex-col space-y-2 flex-wrap">
                                <h4 class="text-slate-800 font-semibold text-lg leading-5 w-[15ch]">
                                    Report Pendaptan
                                </h4>
                                <p class="text-slate-500 leading-4">
                                    Ringkasan Pendapatan Tahunan
                                </p>
                            </div>
                        </div>

                        <!-- Button Filter -->
                        <button>
                            <EllipsisVertical :size="20" class="text-slate-500" />
                        </button>
                    </div>

                    <!-- Button Group -->
                    <div class="flex gap-4 mt-6">

                        <!-- Report Reservasi -->
                        <button
                            class="px-6 py-4 border-slate-200 text-slate-500 focus:text-green-600 hover:text-green-600 border rounded-lg hover:border-green-500 transition duration-150 ease-in-out">
                            <div class="flex flex-col items-center">
                                <span class="p-3 bg-slate-100 rounded-lg">
                                    <CalendarCheck />
                                </span>
                                <span class="mt-1">
                                    Reservasi
                                </span>
                            </div>
                        </button>

                        <!-- Report Pendapatan -->
                        <button
                            class="px-6 py-4 border-slate-200 text-slate-500 focus:text-green-600 hover:text-green-600 border rounded-lg hover:border-green-500 transition duration-150 ease-in-out">
                            <div class="flex flex-col items-center">
                                <span class="p-3 bg-slate-100 rounded-lg">
                                    <BarChart2 />
                                </span>
                                <span class="mt-1">
                                    Pendapatan
                                </span>
                            </div>
                        </button>

                        <!-- Report Laba Bersih -->
                        <button
                            class="px-6 py-4 border-slate-200 text-slate-500 focus:text-green-600 hover:text-green-600 border rounded-lg hover:border-green-500 transition duration-150 ease-in-out">
                            <div class="flex flex-col items-center">
                                <span class="p-3 bg-slate-100 rounded-lg">
                                    <DollarSign />
                                </span>
                                <span class="mt-1">
                                    Laba Bersih
                                </span>
                            </div>
                        </button>
                    </div>

                    <!-- Chart -->
                    <VueApexCharts type="bar" height="350" :options="chartOptions" :series="chartOptions.series">
                    </VueApexCharts>

                </div>
            </Card>

            <div class="flex flex-col gap-4">

                <!-- Analisis Reservasi -->
                <Card>
                    <div class="flex flex-col m-2 space-y-4">

                        <div class="flex items-baseline gap-4">
                            <!-- Card Text -->
                            <div class="flex flex-col space-y-2 flex-wrap">
                                <h4 class="text-slate-500 font-light text-lg leading-5 w-[15ch]">
                                    Tinjauan Reservasi
                                </h4>
                                <h3 class="text-xl font-medium text-slate-800">
                                    RP. 5.621.000
                                </h3>
                            </div>

                            <!--  -->
                            <span class="text-green-600 px-3 py-1 rounded-md font-medium h-fit w-fit">+22,5%</span>
                        </div>

                        <!-- Overview -->
                        <div class="flex justify-between gap-4 pt-6">

                            <!-- Total Reservasi -->
                            <div class="flex flex-col justify-start items-start">
                                <div class="flex gap-2">
                                    <span
                                        class="bg-sky-100 text-sky-600 px-1 py-1 rounded-md text-sm font-medium h-fit w-fit">
                                        <NotebookPen :size="14" />
                                    </span>
                                    <p class="text-slate-500 text-sm font-light">Reservasi</p>
                                </div>

                                <h5 class="text-slate-800 font-medium mt-2 text-lg">60,2%</h5>

                                <span class="text-slate-400 font-light text-sm ml-0.5">6,112</span>
                            </div>

                            <!-- VS -->
                            <div class="flex flex-col">
                                <span class="text-slate-300 text-center">|</span>
                                <span class="text-slate-300">vs</span>
                                <span class="text-slate-300 text-center">|</span>
                            </div>


                            <!-- Visitor -->
                            <div class="flex flex-col items-end">
                                <div class="flex gap-2">
                                    <p class="text-slate-500 text-sm font-light">Pengunjung</p>
                                    <span
                                        class="bg-violet-100 text-violet-600 px-1 py-1 rounded-md text-sm font-medium h-fit w-fit">
                                        <Link :size="14" />
                                    </span>
                                </div>

                                <h5 class="text-slate-800 font-medium mt-2 text-lg">25,4%</h5>

                                <span class="text-slate-400 font-light text-sm">12,574</span>
                            </div>
                        </div>

                        <!-- Progress -->
                        <div class="flex">
                            <span class="rounded-l-full brightness-110 bg-sky-500 py-1.5" style="width: 60.2%;"></span>
                            <span class="rounded-r-full brightness-110 bg-violet-500 py-1.5"
                                style="width: 39.8%;"></span>
                        </div>
                    </div>
                </Card>

                <!-- Field Utilization Rate -->
                <Card>

                    <!-- Title -->
                    <div class="flex items-baseline gap-4">
                        <!-- Card Text -->
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-500 font-light text-lg leading-5 w-[15ch]">
                                Tingkat Penggunaan
                            </h4>
                            <h3 class="text-xl font-medium text-slate-800">
                                RP. 5.621.000
                            </h3>
                        </div>

                        <!--  -->
                        <span class="text-green-600 px-3 py-1 rounded-md font-medium h-fit w-fit">+22,5%</span>
                    </div>
                </Card>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
