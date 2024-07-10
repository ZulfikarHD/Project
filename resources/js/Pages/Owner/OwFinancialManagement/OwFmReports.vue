<script setup>
import { ref } from 'vue';
import OwAuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import VueApexCharts from 'vue3-apexcharts';

const reportType = ref('monthly');
const customDateRange = ref({ start: '', end: '' });

const generateReport = () => {
    // Implement report generation logic here
    console.log(`Generating ${reportType.value} report`);
};

const monthlyFinancialsSeries = ref([{
    name: 'Revenue',
    data: [28, 10, 45, 38, 15, 30, 35, 30, 8, 20, 25, 40] // Example data
}]);

const quarterlyFinancialsSeries = ref([{
    name: 'Revenue',
    data: [100, 200, 150, 250] // Example data
}]);

const annualFinancialsSeries = ref([{
    name: 'Revenue',
    data: [300, 400, 350, 450, 500] // Example data
}]);

const monthlyFinancialsCtOpt = {
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
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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
    series: monthlyFinancialsSeries.value
};

const quarterlyFinancialsCtOpt = {
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
        categories: ['Q1', 'Q2', 'Q3', 'Q4'],
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
    series: quarterlyFinancialsSeries.value
};

const annualFinancialsCtOpt = {
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
        categories: ['2019', '2020', '2021', '2022', '2023'],
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
    series: annualFinancialsSeries.value
};

const exportData = (format) => {
    // Implement export logic here
    console.log(`Exporting data as ${format}`);
};
</script>

<template>
    <OwAuthenticatedLayout>
        <div class="container mx-auto py-12">
            <h1 class="text-3xl font-bold mb-6">Financial Reports</h1>

            <!-- Generate Report Interface -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Generate Report</h2>
                <form @submit.prevent="generateReport">
                    <div class="mb-4">
                        <label for="reportType" class="block text-sm font-medium text-gray-700">Report Type</label>
                        <select id="reportType" v-model="reportType" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="annual">Annual</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="mb-4" v-if="reportType === 'custom'">
                        <label for="customDateRange" class="block text-sm font-medium text-gray-700">Custom Date Range</label>
                        <input type="date" id="customDateRangeStart" v-model="customDateRange.start" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <input type="date" id="customDateRangeEnd" v-model="customDateRange.end" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700">Generate Report</button>
                </form>
            </div>

            <!-- Monthly Financials -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Monthly Financials</h2>
                <VueApexCharts type="bar" height="350" :options="monthlyFinancialsCtOpt" :series="monthlyFinancialsSeries" />
            </div>

            <!-- Quarterly Financials -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Quarterly Financials</h2>
                <VueApexCharts type="bar" height="350" :options="quarterlyFinancialsCtOpt" :series="quarterlyFinancialsSeries" />
            </div>

            <!-- Annual Financials -->
            <div class="mb-8 bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Annual Financials</h2>
                <VueApexCharts type="bar" height="350" :options="annualFinancialsCtOpt" :series="annualFinancialsSeries" />
            </div>

            <!-- Export Report -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Export Report</h2>
                <div class="flex space-x-2">
                    <button @click="exportData('csv')" class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as CSV</button>
                    <button @click="exportData('excel')" class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as Excel</button>
                    <button @click="exportData('pdf')" class="bg-gray-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700">Export as PDF</button>
                </div>
            </div>
        </div>
    </OwAuthenticatedLayout>
</template>
