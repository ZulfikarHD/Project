<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import { ref } from 'vue';
import VueApexCharts from 'vue3-apexcharts';

const websiteTraffic = ref({
    series: [{
        name: 'Visitors',
        data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
    }],
    chartOptions: {
        chart: {
            type: 'line'
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        }
    }
});

const conversionRates = ref({
    series: [{
        name: 'Conversion Rate',
        data: [10, 15, 14, 18, 20, 25, 30, 35, 40]
    }],
    chartOptions: {
        chart: {
            type: 'bar'
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        }
    }
});

const customerDemographics = ref({
    series: [44, 55, 41, 17, 15],
    chartOptions: {
        chart: {
            type: 'pie'
        },
        labels: ['18-24', '25-34', '35-44', '45-54', '55+']
    }
});

const campaignROI = ref({
    series: [{
        name: 'ROI',
        data: [5, 10, 15, 20, 25, 30, 35, 40, 45]
    }],
    chartOptions: {
        chart: {
            type: 'line'
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        }
    }
});

const exportData = (format) => {
    // Logic to export data in the specified format
    console.log(`Exporting data in ${format} format`);
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Marketing Tools Analytics</h1>

            <Card class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Website Traffic</h2>
                <p>Insights on website visitors.</p>
                <VueApexCharts type="line" :options="websiteTraffic.chartOptions" :series="websiteTraffic.series" />
            </Card>

            <Card class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Conversion Rates</h2>
                <p>Data on conversion rates from various campaigns.</p>
                <VueApexCharts type="bar" :options="conversionRates.chartOptions" :series="conversionRates.series" />
            </Card>

            <Card class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Customer Demographics</h2>
                <p>Information on customer demographics.</p>
                <VueApexCharts type="pie" :options="customerDemographics.chartOptions" :series="customerDemographics.series" />
            </Card>

            <Card class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Campaign ROI</h2>
                <p>Return on investment for marketing campaigns.</p>
                <VueApexCharts type="line" :options="campaignROI.chartOptions" :series="campaignROI.series" />
            </Card>

            <div class="mt-4">
                <h2 class="text-xl font-semibold mb-2">Export Analytics Data</h2>
                <button @click="exportData('csv')" class="btn btn-primary mr-2">Export as CSV</button>
                <button @click="exportData('pdf')" class="btn btn-secondary">Export as PDF</button>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Metric</th>
                            <th class="px-4 py-2">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Website Traffic</td>
                            <td class="border px-4 py-2">125 Visitors</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Conversion Rates</td>
                            <td class="border px-4 py-2">40%</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Customer Demographics</td>
                            <td class="border px-4 py-2">18-24: 44%, 25-34: 55%</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Campaign ROI</td>
                            <td class="border px-4 py-2">45%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.container {
    max-width: 1200px;
}
.btn {
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    font-weight: bold;
}
.btn-primary {
    background-color: #3490dc;
    color: white;
}
.btn-secondary {
    background-color: #6c757d;
    color: white;
}
.table-auto {
    width: 100%;
    border-collapse: collapse;
}
.table-auto th, .table-auto td {
    border: 1px solid #ddd;
    padding: 8px;
}
.table-auto th {
    background-color: #f2f2f2;
    text-align: left;
}
</style>
