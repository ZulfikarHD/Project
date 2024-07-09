<script setup>
import { ref } from 'vue';
import VueApexCharts from 'vue3-apexcharts';
import Card from '@/Components/Card.vue';

const utilizationRateOpt = {
    chart: {
        type: 'line',
        height: 350,
    },
    series: [{
        name: 'Utilization Rate',
        data: [70, 75, 80, 85, 90, 95, 100]
    }],
    xaxis: {
        categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'],
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val + "%";
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

const revenueGeneratedOpt = {
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
        data: [500, 700, 800, 600, 900, 1000, 1100]
    }],
    xaxis: {
        categories: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return "$" + val;
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

const bookingTrendsOpt = {
    chart: {
        type: 'line',
        height: 350,
    },
    series: [{
        name: 'Bookings',
        data: [10, 15, 20, 25, 30, 35, 40]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
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
    colors: ['#FF69B4'],
    grid: {
        show: false
    },
    legend: {
        show: false
    },
};
</script>

<template>
    <div class="flex flex-wrap gap-4 flex-auto lg:px-0">
        <!-- Utilization Rate -->
        <Card class="flex-auto">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Utilization Rate</h4>
                <VueApexCharts type="line" height="350" :options="utilizationRateOpt"
                    :series="utilizationRateOpt.series" />
            </div>
        </Card>

        <!-- Revenue Generated -->
        <Card class="flex-auto">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Revenue Generated</h4>
                <VueApexCharts type="bar" height="350" :options="revenueGeneratedOpt"
                    :series="revenueGeneratedOpt.series" />
            </div>
        </Card>

        <!-- Booking Trends -->
        <Card class="flex-auto w-full">
            <div class="p-4">
                <h4 class="text-slate-800 font-semibold text-lg leading-5">Booking Trends</h4>
                <VueApexCharts type="line" height="350" :options="bookingTrendsOpt"
                    :series="bookingTrendsOpt.series" />
            </div>
        </Card>
    </div>
</template>
