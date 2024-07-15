<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import VueApexCharts from 'vue3-apexcharts';
import { ref } from 'vue';

const feedbackData = ref([
    { id: 1, customer: 'John Doe', feedback: 'Great service!', date: '2023-10-01' },
    { id: 2, customer: 'Jane Smith', feedback: 'Could be better.', date: '2023-10-02' },
    // ... more feedback data
]);

const feedbackAnalyticsOpt = {
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
            return val + "%";
        },
        style: {
            colors: ['#334155']
        },
        offsetY: -20,
    },
    xaxis: {
        categories: ['Positive', 'Neutral', 'Negative'],
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return val + "%";
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
        name: 'Feedback',
        data: [70, 20, 10] // Example data
    }]
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-wrap justify-center lg:justify-start gap-4">
            <!-- View Feedback -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <h4 class="text-slate-700 font-medium text-lg leading-5">Customer Feedback</h4>
                    <ul>
                        <li v-for="feedback in feedbackData" :key="feedback.id" class="mb-2">
                            <p class="text-slate-500"><strong>{{ feedback.customer }}:</strong> {{ feedback.feedback }} <span class="text-slate-400 text-sm">({{ feedback.date }})</span></p>
                        </li>
                    </ul>
                </div>
            </Card>

            <!-- Collect Feedback -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <h4 class="text-slate-700 font-medium text-lg leading-5">Collect Feedback</h4>
                    <form>
                        <textarea class="w-full p-2 border rounded" placeholder="Enter your feedback"></textarea>
                        <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded">Submit</button>
                    </form>
                </div>
            </Card>

            <!-- Feedback Analytics -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <h4 class="text-slate-700 font-medium text-lg leading-5">Feedback Analytics</h4>
                    <VueApexCharts type="bar" height="350" :options="feedbackAnalyticsOpt" :series="feedbackAnalyticsOpt.series" />
                </div>
            </Card>

            <!-- Respond to Feedback -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <h4 class="text-slate-700 font-medium text-lg leading-5">Respond to Feedback</h4>
                    <form>
                        <select class="w-full p-2 border rounded mb-2">
                            <option v-for="feedback in feedbackData" :key="feedback.id" :value="feedback.id">{{ feedback.customer }}: {{ feedback.feedback }}</option>
                        </select>
                        <textarea class="w-full p-2 border rounded" placeholder="Enter your response"></textarea>
                        <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded">Send Response</button>
                    </form>
                </div>
            </Card>

            <!-- Export Feedback Data -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <h4 class="text-slate-700 font-medium text-lg leading-5">Export Feedback Data</h4>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Export as CSV</button>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Export as PDF</button>
                </div>
            </Card>
        </div>
    </AuthenticatedLayout>
</template>
