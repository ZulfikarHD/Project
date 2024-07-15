<script setup>
import AuthenticatedLayout from '@/Layouts/Owner/OwAuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import { Head } from '@inertiajs/vue3';
import VueApexCharts from 'vue3-apexcharts';
import CalendarView from '@/Components/CalendarView.vue';
import { ref } from 'vue';
import { PlusCircle, List, BarChart2, DollarSign, Calendar } from 'lucide-vue-next';

// Chart options (reuse styles from OwDashboard.vue)
const promotionPerformanceCtOpt = {
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
        categories: ['Promo 1', 'Promo 2', 'Promo 3'],
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
        name: 'Effectiveness',
        data: [70, 50, 90]
    }]
};

// Example data for active promotions
const activePromotions = ref([
    { name: 'Promo 1', budget: 'Rp. 1.000.000', schedule: '01 Jan - 31 Jan' },
    { name: 'Promo 2', budget: 'Rp. 2.000.000', schedule: '01 Feb - 28 Feb' },
    { name: 'Promo 3', budget: 'Rp. 1.500.000', schedule: '01 Mar - 31 Mar' },
]);

// Form data for creating a new promotion
const newPromotion = ref({
    name: '',
    budget: '',
    startDate: '',
    endDate: ''
});

const addPromotion = () => {
    activePromotions.value.push({ ...newPromotion.value });
    newPromotion.value = { name: '', budget: '', startDate: '', endDate: '' };
};
</script>

<template>
    <Head title="Promotions" />

    <AuthenticatedLayout>
        <div class="flex flex-wrap justify-center lg:justify-start gap-4">
            <!-- Create Promotion -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-blue-100 p-2 rounded-lg w-fit h-fit">
                            <PlusCircle class="text-blue-500" />
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Create Promotion
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Design and launch new promotions.
                            </p>
                        </div>
                    </div>
                    <form @submit.prevent="addPromotion" class="mt-4 space-y-4">
                        <div>
                            <label class="block mb-2">Promotion Name</label>
                            <input v-model="newPromotion.name" class="p-2 border border-gray-300 rounded w-full" required />
                        </div>
                        <div>
                            <label class="block mb-2">Budget</label>
                            <input v-model="newPromotion.budget" class="p-2 border border-gray-300 rounded w-full" required />
                        </div>
                        <div>
                            <label class="block mb-2">Start Date</label>
                            <input type="date" v-model="newPromotion.startDate" class="p-2 border border-gray-300 rounded w-full" required />
                        </div>
                        <div>
                            <label class="block mb-2">End Date</label>
                            <input type="date" v-model="newPromotion.endDate" class="p-2 border border-gray-300 rounded w-full" required />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Promotion</button>
                        </div>
                    </form>
                </div>
            </Card>

            <!-- Active Promotions -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-green-100 p-2 rounded-lg w-fit h-fit">
                            <List class="text-green-500" />
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Active Promotions
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                List of currently active promotions.
                            </p>
                        </div>
                    </div>
                    <table class="min-w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Budget</th>
                                <th class="px-4 py-2">Schedule</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="promo in activePromotions" :key="promo.name">
                                <td class="border px-4 py-2">{{ promo.name }}</td>
                                <td class="border px-4 py-2">{{ promo.budget }}</td>
                                <td class="border px-4 py-2">{{ promo.startDate }} - {{ promo.endDate }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>

            <!-- Promotion Performance -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-indigo-100 p-2 rounded-lg w-fit h-fit">
                            <BarChart2 class="text-indigo-500" />
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Promotion Performance
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Analytics on promotion effectiveness.
                            </p>
                        </div>
                    </div>
                    <div class="w-full items-center flex justify-center">
                        <VueApexCharts type="bar" height="350" :options="promotionPerformanceCtOpt"
                            :series="promotionPerformanceCtOpt.series" />
                    </div>
                </div>
            </Card>

            <!-- Promotion Budget -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-yellow-100 p-2 rounded-lg w-fit h-fit">
                            <DollarSign class="text-yellow-500" />
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Promotion Budget
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Allocate and manage budgets for promotions.
                            </p>
                        </div>
                    </div>
                </div>
            </Card>

            <!-- Promotion Schedule -->
            <Card class="flex-auto">
                <div class="flex flex-col m-2">
                    <div class="flex flex-wrap gap-2">
                        <span class="mr-2 bg-purple-100 p-2 rounded-lg w-fit h-fit">
                            <Calendar class="text-purple-500" />
                        </span>
                        <div class="flex flex-col space-y-2 flex-wrap">
                            <h4 class="text-slate-700 font-medium text-lg leading-5">
                                Promotion Schedule
                            </h4>
                            <p class="text-slate-500 leading-4 text-sm">
                                Schedule upcoming promotions.
                            </p>
                        </div>
                    </div>
                    <div class="w-full items-center flex justify-center">
                        <CalendarView />
                    </div>
                </div>
            </Card>
        </div>
    </AuthenticatedLayout>
</template>
