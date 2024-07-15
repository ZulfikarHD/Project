<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import ApexChart from 'vue3-apexcharts';

const campaigns = ref([
    // Sample data for campaigns
    { id: 1, name: 'Campaign 1', performance: 75, budget: 1000, schedule: '2023-10-01' },
    { id: 2, name: 'Campaign 2', performance: 50, budget: 2000, schedule: '2023-11-01' },
]);

const newCampaign = ref({
    name: '',
    budget: 0,
    schedule: '',
});

const createCampaign = () => {
    campaigns.value.push({ ...newCampaign.value, id: campaigns.value.length + 1, performance: 0 });
    newCampaign.value = { name: '', budget: 0, schedule: '' };
};

const chartOptions = ref({
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
        categories: campaigns.value.map(campaign => campaign.name),
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
    series: [
        {
            name: 'Performance',
            data: campaigns.value.map(campaign => campaign.performance),
        },
    ],
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col gap-4">
            <Card>
                <h2 class="text-xl mb-4">View All Campaigns</h2>
                <ul class="list-none p-0">
                    <li v-for="campaign in campaigns" :key="campaign.id" class="py-2 border-b border-gray-300">
                        {{ campaign.name }} - Performance: {{ campaign.performance }}% - Budget: ${{ campaign.budget }} - Schedule: {{ campaign.schedule }}
                    </li>
                </ul>
            </Card>

            <Card>
                <h2 class="text-xl mb-4">Create New Campaign</h2>
                <form @submit.prevent="createCampaign">
                    <div class="mb-4">
                        <label for="name" class="block mb-2">Campaign Name:</label>
                        <input v-model="newCampaign.name" id="name" type="text" required class="w-full p-2 border border-gray-300 rounded" />
                    </div>
                    <div class="mb-4">
                        <label for="budget" class="block mb-2">Budget:</label>
                        <input v-model="newCampaign.budget" id="budget" type="number" required class="w-full p-2 border border-gray-300 rounded" />
                    </div>
                    <div class="mb-4">
                        <label for="schedule" class="block mb-2">Schedule:</label>
                        <input v-model="newCampaign.schedule" id="schedule" type="date" required class="w-full p-2 border border-gray-300 rounded" />
                    </div>
                    <button type="submit" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-700">Create Campaign</button>
                </form>
            </Card>

            <Card>
                <h2 class="text-xl mb-4">Campaign Performance</h2>
                <ApexChart type="bar" :options="chartOptions" :series="chartOptions.series" />
            </Card>

            <Card>
                <h2 class="text-xl mb-4">Campaign Schedule</h2>
                <ul class="list-none p-0">
                    <li v-for="campaign in campaigns" :key="campaign.id" class="py-2 border-b border-gray-300">
                        {{ campaign.name }} - Schedule: {{ campaign.schedule }}
                    </li>
                </ul>
            </Card>

            <Card>
                <h2 class="text-xl mb-4">Campaign Budget</h2>
                <ul class="list-none p-0">
                    <li v-for="campaign in campaigns" :key="campaign.id" class="py-2 border-b border-gray-300">
                        {{ campaign.name }} - Budget: ${{ campaign.budget }}
                    </li>
                </ul>
            </Card>
        </div>
    </AuthenticatedLayout>
</template>
