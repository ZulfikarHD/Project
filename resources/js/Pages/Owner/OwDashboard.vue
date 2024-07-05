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
    ReceiptText,
} from 'lucide-vue-next';

const reservasiCtOpt = {
    chart: {
        type: 'bar',
        height: 50,
        stacked: true,
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            columnWidth: '30%',
            borderRadius: 3,
        },
    },
    dataLabels: {
        enabled: false,
    },
    grid: {
        show: false
    },
    legend: {
        show: false
    },
    series: [{
        name: 'pers',
        data: [72, 90, 55, 62, 85, 70, 65, 70, 92],
        color: '#22c55e',
    }, {
        name: 'Reservasi',
        data: [28, 10, 45, 38, 15, 30, 35, 30, 8],
        color: '#cbd5e1',
    },],
    xaxis: {
        labels: {
            show: false
        }
    },
    yaxis: {
        show: false
    },
}

const reportPendapatanCtOpt = {
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


const tingkatPenggunaCtOpt = {
    series: [67],
    chart: {
        height: 350,
        type: 'radialBar',
        offsetY: -10
    },
    plotOptions: {
        radialBar: {
            startAngle: -135,
            endAngle: 135,
            dataLabels: {
                name: {
                    fontSize: '16px',
                    color: '#9ca3af',
                    offsetY: 110
                },
                value: {
                    offsetY: -5,
                    fontSize: '22px',
                    color: undefined,
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            }
        }
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            shadeIntensity: 0.15,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 65, 91]
        },
    },
    stroke: {
        dashArray: 4
    },
    colors: ['#22c55e'],
    labels: ['Lapangan Sehat 1'],
};

const genderDemographicCtOpt = {
    chart: {
        type: 'pie',
        height: 350,
    },
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

const genderDemographicSeries = [75, 25]; // Example data

const ageRangeDemographicCtOpt = {
    chart: {
        type: 'bar',
        height: 350,
    },
    plotOptions: {
        bar: {
            horizontal: true,
            dataLabels: {
                position: 'top',
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + "%";
        },
        style: {
            colors: ['#333'],
        },
    },
    xaxis: {
        categories: ['0-18', '19-25', '26-35', '36-45', '46-60', '60+'],
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return val + "%";
            },
        },
    },
    series: [{
        name: 'Age Range',
        data: [10, 20, 30, 25, 10, 5], // Example data
    }],
    colors: ['#1E90FF'],
};
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Section 1 -->
        <!--
            Line 1 for LG Break Point
         -->
        <div class="flex flex-wrap justify-center lg:justify-start gap-4">

            <!-- Reservasi -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
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
                    <div class="w-full items-center flex justify-center">
                        <VueApexCharts type="bar" width="200" height="100" :options="reservasiCtOpt"
                            :series="reservasiCtOpt.series" />
                    </div>

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
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
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
                    <div class="w-full items-center flex justify-center">
                        <VueApexCharts type="bar" width="200" height="100" :options="reservasiCtOpt"
                            :series="reservasiCtOpt.series" />
                    </div>

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
            <Card class="flex-auto">
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
                    <!-- <VueApexCharts type="bar" height="350" :options="reportPendapatanCtOpt" :series="reportPendapatanCtOpt.series"></VueApexCharts> -->
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
        <!--
            Line 2 for LG Break Point
         -->
        <div class="flex flex-wrap lg:flex-nowrap gap-4 mt-4">
            <!-- Report Pendapatan -->
            <Card class="flex-grow max-w-full lg:max-w-6xl">
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
                    <VueApexCharts type="bar" height="350" :options="reportPendapatanCtOpt"
                        :series="reportPendapatanCtOpt.series">
                    </VueApexCharts>

                </div>
            </Card>

            <div class="flex flex-row lg:flex-col flex-wrap gap-4 w-full lg:w-fit ">

                <!-- Analisis Reservasi -->
                <Card class="flex-grow">
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
                <Card class="flex-grow">

                    <!-- Title -->
                    <div class="flex flex-col items-center justify-center">
                        <!-- Card Text -->
                        <div class="flex flex-col space-y-2 flex-wrap items-center pt-4">
                            <h4 class="text-slate-700 font-medium text-lg leading-5 w-[15ch]">
                                Tingkat Penggunaan
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Satu Bulan Terakhir
                            </p>
                        </div>

                        <!--  -->
                        <div>
                            <VueApexCharts type="radialBar" height="300" :options="tingkatPenggunaCtOpt"
                                :series="[55.6]">
                            </VueApexCharts>
                        </div>

                        <span
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm font-medium h-fit -mt-4 mb-2">+24,5%</span>
                    </div>
                </Card>
            </div>
        </div>

        <!-- Section 3 -->
        <!--
            Customer Insight Section
         -->
        <div class="flex flex-wrap lg:flex-nowrap gap-4 mt-4">

            <!-- Top Customer -->
            <Card class="flex flex-col flex-auto max-w-xl">
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
                                <p class="font-semibold text-green-600">Rp. {{ (201 - index) * 125000 }}</p>
                            </div>
                        </div>
                    </template>
                </div>
            </Card>

            <!-- Customer Demographic -->
            <div class="flex flex-col gap-4">

                <Card class="flex flex-col flex-auto max-w-xl items-center">
                    <!-- Title -->
                    <div class="flex flex-col space-y-2 flex-wrap mb-4 mt-2 mx-2 items-center">
                        <h4 class="text-slate-800 font-medium text-lg leading-5">
                            Demografi Gender
                        </h4>
                        <p class="text-slate-500 leading-4 text-sm">
                            Persentase Gender Pelanggan
                        </p>
                    </div>

                    <!-- Chart -->
                    <VueApexCharts type="pie" height="200" :options="genderDemographicCtOpt"
                        :series="genderDemographicSeries" />
                </Card>

                <Card class="flex flex-col flex-auto max-w-xl items-center">
                    <!-- Title -->
                    <div class="flex flex-col space-y-2 flex-wrap mb-4 mt-2 mx-2 items-center">
                        <h4 class="text-slate-800 font-medium text-lg leading-5">
                            Demografi Usia
                        </h4>
                        <p class="text-slate-500 leading-4">
                            Persentase Usia Pelanggan
                        </p>
                    </div>

                    <!-- Chart -->
                    <VueApexCharts type="bar" height="200" :options="ageRangeDemographicCtOpt"
                        :series="ageRangeDemographicCtOpt.series" />
                </Card>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
