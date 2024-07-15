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
    },
    series: [
        {
            name: 'Performance',
            data: campaigns.value.map(campaign => campaign.performance),
        },
    ],
    xaxis: {
        categories: campaigns.value.map(campaign => campaign.name),
    },
});
</script>

<template>
    <AuthenticatedLayout>
        <Card>
            <h2>View All Campaigns</h2>
            <ul>
                <li v-for="campaign in campaigns" :key="campaign.id">
                    {{ campaign.name }} - Performance: {{ campaign.performance }}% - Budget: ${{ campaign.budget }} - Schedule: {{ campaign.schedule }}
                </li>
            </ul>
        </Card>

        <Card>
            <h2>Create New Campaign</h2>
            <form @submit.prevent="createCampaign">
                <div>
                    <label for="name">Campaign Name:</label>
                    <input v-model="newCampaign.name" id="name" type="text" required />
                </div>
                <div>
                    <label for="budget">Budget:</label>
                    <input v-model="newCampaign.budget" id="budget" type="number" required />
                </div>
                <div>
                    <label for="schedule">Schedule:</label>
                    <input v-model="newCampaign.schedule" id="schedule" type="date" required />
                </div>
                <button type="submit">Create Campaign</button>
            </form>
        </Card>

        <Card>
            <h2>Campaign Performance</h2>
            <ApexChart type="bar" :options="chartOptions" :series="chartOptions.series" />
        </Card>

        <Card>
            <h2>Campaign Schedule</h2>
            <ul>
                <li v-for="campaign in campaigns" :key="campaign.id">
                    {{ campaign.name }} - Schedule: {{ campaign.schedule }}
                </li>
            </ul>
        </Card>

        <Card>
            <h2>Campaign Budget</h2>
            <ul>
                <li v-for="campaign in campaigns" :key="campaign.id">
                    {{ campaign.name }} - Budget: ${{ campaign.budget }}
                </li>
            </ul>
        </Card>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Add your styles here, referencing @Pages for styling */
</style>
