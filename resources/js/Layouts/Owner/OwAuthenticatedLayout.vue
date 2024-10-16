<script setup>
import { ref, computed } from "vue";
import { Link } from "@inertiajs/vue3";
import SideNavLink from "@/Components/SideNavLink.vue";
import {
    LayoutDashboard,
    Calendar,
    Users,
    Map,
    UserCheck,
    DollarSign,
    Megaphone,
    BarChart2,
    User,
    ChevronDown,
    ChevronUp,
    PieChart,
    CreditCard,
    FileText,
    BarChart,
    Settings,
    Mail,
    Tag,
    Share2,
    Search,
    Star // Import the Star icon
} from 'lucide-vue-next';
import 'animate.css'; // Import Animate.css

const showingSideNav = ref(false);
const showFinancialDropdown = ref(false);
const showMarketingDropdown = ref(false);
const showFieldDropdown = ref(false);

// Computed property to check if any financial management route is active
const isFinancialRouteActive = computed(() => {
    return ['owner.fm.revenue', 'owner.fm.budgeting', 'owner.fm.expenses', 'owner.fm.invoices', 'owner.fm.payments', 'owner.fm.reports', 'owner.fm.settings'].some(routeName => route().current(routeName));
});

// Set the dropdown to be open if any financial route is active
if (isFinancialRouteActive.value) {
    showFinancialDropdown.value = true;
}
</script>

<style>
.glass {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}
</style>

<template>
    <!-- Header -->

    <!-- Side Nav -->
    <aside :class="{
        'translate-x-0': showingSideNav,
        '-translate-x-[110%]': !showingSideNav,
    }"
        class="glass m-4 h-[96vh] w-64 pl-3 pr-4 py-6 transition-transform duration-300 lg:translate-x-0 lg:block overflow-hidden fixed left-0 top-0 z-10 shadow-md shadow-gray-500/25 antialiased rounded-lg">
        <!-- {{-- Header Side Bar --}} -->
        <div class="text-indigo-950 mb-6 text-2xl font-semibold">
            Project Logo
        </div>

        <!-- {{-- Side Nav Link --}} -->
        <nav class="h-full overflow-y-auto pr-4 -mr-4 relative pb-32">
            <ul class="space-y-1">
                <!-- Dashboard -->
                <SideNavLink :href="route('owner.dashboard')" :active="route().current('owner.dashboard')">
                    <span class="flex items-center">
                        <LayoutDashboard :size="18" class="mr-2"
                            :stroke-width="route().current('owner.dashboard') ? 2 : 1" />
                        Dashboard
                    </span>
                </SideNavLink>

                <!-- Booking Management -->
                <SideNavLink :href="route('owner.bookingMgmt')" :active="route().current('owner.bookingMgmt')">
                    <span class="flex items-center">
                        <Calendar :size="18" class="mr-2"
                            :stroke-width="route().current('owner.bookingMgmt') ? 2 : 1" />
                        Booking Management
                    </span>
                </SideNavLink>

                <!-- Customer Management -->
                <SideNavLink :href="route('owner.customerMgmt')" :active="route().current('owner.customerMgmt')">
                    <span class="flex items-center">
                        <Users :size="18" class="mr-2" :stroke-width="route().current('owner.customerMgmt') ? 2 : 1" />
                        Customer Management
                    </span>
                </SideNavLink>

                <!-- Field Management Dropdown -->
                <li class="py-1 px-2 rounded-md text-sm">
                    <button @click="showFieldDropdown = !showFieldDropdown" class="flex items-center w-full">
                        <span class="flex items-center">
                            <Map :size="18" class="mr-2" :stroke-width="route().current('owner.field-management.filed-list') ? 2 : 1" />
                            Field Management
                        </span>
                        <span class="ml-auto">
                            <ChevronDown v-if="!showFieldDropdown" :size="18" />
                            <ChevronUp v-if="showFieldDropdown" :size="18" />
                        </span>
                    </button>
                    <ul v-if="showFieldDropdown" class="pl-4 mt-2 space-y-1 animate__animated animate__fadeIn">
                        <!-- Field List -->
                        <SideNavLink :href="route('owner.field-management.field-list')" :active="route().current('owner.field-management.field-list')">
                            <span class="flex items-center">
                                <Map :size="18" class="mr-2" :stroke-width="route().current('owner.field-management.field-list') ? 2 : 1" />
                                Field List
                            </span>
                        </SideNavLink>
                        <!-- Field List -->
                        <SideNavLink :href="route('owner.field-management.field-list')" :active="route().current('owner.field-management.field-list')">
                            <span class="flex items-center">
                                <Map :size="18" class="mr-2" :stroke-width="route().current('owner.field-management.field-list') ? 2 : 1" />
                                Add Field
                            </span>
                        </SideNavLink>
                    </ul>
                </li>

                <!-- Venue Management -->
                <SideNavLink :href="route('owner.venue.add-venue')" :active="route().current('owner.venue.add-venue')">
                    <span class="flex items-center">
                        <Map :size="18" class="mr-2" :stroke-width="route().current('owner.venue.add-venue') ? 2 : 1" />
                        Add Venue
                    </span>
                </SideNavLink>

                <!-- Staff Management -->
                <SideNavLink :href="route('owner.staffMgmt')" :active="route().current('owner.staffMgmt')">
                    <span class="flex items-center">
                        <UserCheck :size="18" class="mr-2" :stroke-width="route().current('owner.staffMgmt') ? 2 : 1" />
                        Staff Management
                    </span>
                </SideNavLink>

                <!-- Financial Management Dropdown -->
                <li class="py-1 px-2 rounded-md text-sm">
                    <button @click="showFinancialDropdown = !showFinancialDropdown" class="flex items-center w-full">
                        <span class="flex items-center">
                            <DollarSign :size="18" class="mr-2"
                                :stroke-width="route().current('owner.fm.revenue') ? 2 : 1" />
                            Financial Management
                        </span>
                        <span class="ml-auto">
                            <ChevronDown v-if="!showFinancialDropdown" :size="18" />
                            <ChevronUp v-if="showFinancialDropdown" :size="18" />
                        </span>
                    </button>
                    <ul v-if="showFinancialDropdown" class="pl-4 mt-2 space-y-1 animate__animated animate__fadeIn">
                        <SideNavLink :href="route('owner.fm.revenue')" :active="route().current('owner.fm.revenue')">
                            <span class="flex items-center">
                                <DollarSign :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.revenue') ? 2 : 1" />
                                Revenue Overview
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.fm.budgeting')"
                            :active="route().current('owner.fm.budgeting')">
                            <span class="flex items-center">
                                <PieChart :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.budgeting') ? 2 : 1" />
                                Budgeting Planning
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.fm.expenses')" :active="route().current('owner.fm.expenses')">
                            <span class="flex items-center">
                                <CreditCard :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.expenses') ? 2 : 1" />
                                Expenses
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.fm.invoices')" :active="route().current('owner.fm.invoices')">
                            <span class="flex items-center">
                                <FileText :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.invoices') ? 2 : 1" />
                                Booking Invoices
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.fm.payments')" :active="route().current('owner.fm.payments')">
                            <span class="flex items-center">
                                <CreditCard :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.payments') ? 2 : 1" />
                                Payments Management
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.fm.reports')" :active="route().current('owner.fm.reports')">
                            <span class="flex items-center">
                                <BarChart :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.reports') ? 2 : 1" />
                                Financial Reports
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.fm.settings')" :active="route().current('owner.fm.settings')">
                            <span class="flex items-center">
                                <Settings :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.fm.settings') ? 2 : 1" />
                                Financial Settings
                            </span>
                        </SideNavLink>
                    </ul>
                </li>

                <!-- Marketing Tools Dropdown -->
                <li class="py-1 px-2 rounded-md text-sm">
                    <button @click="showMarketingDropdown = !showMarketingDropdown" class="flex items-center w-full">
                        <span class="flex items-center">
                            <Megaphone :size="18" class="mr-2"
                                :stroke-width="route().current('owner.marketingTools') ? 1 : 0.5" />
                            Marketing Tools
                        </span>
                        <span class="ml-auto">
                            <ChevronDown v-if="!showMarketingDropdown" :size="18" />
                            <ChevronUp v-if="showMarketingDropdown" :size="18" />
                        </span>
                    </button>
                    <ul v-if="showMarketingDropdown" class="pl-4 mt-2 space-y-1 animate__animated animate__fadeIn">
                        <SideNavLink :href="route('owner.marketingTools.analytics')"
                            :active="route().current('owner.marketingTools.analytics')">
                            <span class="flex items-center">
                                <BarChart2 :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.analytics') ? 2 : 1" />
                                Analytics
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.campaignManagement')"
                            :active="route().current('owner.marketingTools.campaignManagement')">
                            <span class="flex items-center">
                                <Megaphone :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.campaignManagement') ? 2 : 1" />
                                Campaign Management
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.customerFeedback')"
                            :active="route().current('owner.marketingTools.customerFeedback')">
                            <span class="flex items-center">
                                <User :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.customerFeedback') ? 2 : 1" />
                                Customer Feedback
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.promotions')"
                            :active="route().current('owner.marketingTools.promotions')">
                            <span class="flex items-center">
                                <Tag :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.promotions') ? 2 : 1" />
                                Promotions
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.refferalProgram')"
                            :active="route().current('owner.marketingTools.refferalProgram')">
                            <span class="flex items-center">
                                <Users :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.refferalProgram') ? 2 : 1" />
                                Referral Program
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.socialMedia')"
                            :active="route().current('owner.marketingTools.socialMedia')">
                            <span class="flex items-center">
                                <Share2 :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.socialMedia') ? 2 : 1" />
                                Social Media
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.seoTools')"
                            :active="route().current('owner.marketingTools.seoTools')">
                            <span class="flex items-center">
                                <Search :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.seoTools') ? 2 : 1" />
                                SEO Tools
                            </span>
                        </SideNavLink>
                        <SideNavLink :href="route('owner.marketingTools.settings')"
                            :active="route().current('owner.marketingTools.settings')">
                            <span class="flex items-center">
                                <Settings :size="18" class="mr-2"
                                    :stroke-width="route().current('owner.marketingTools.settings') ? 2 : 1" />
                                Marketing Settings
                            </span>
                        </SideNavLink>
                    </ul>
                </li>

                <!-- Reporting Tools -->
                <SideNavLink :href="route('owner.reportingTools')" :active="route().current('owner.reportingTools')">
                    <span class="flex items-center">
                        <BarChart2 :size="18" class="mr-2"
                            :stroke-width="route().current('owner.reportingTools') ? 2 : 1" />
                        Reporting Tools
                    </span>
                </SideNavLink>

                <!-- User Management -->
                <SideNavLink :href="route('owner.userMgmt')" :active="route().current('owner.userMgmt')">
                    <span class="flex items-center">
                        <User :size="18" class="mr-2" :stroke-width="route().current('owner.userMgmt') ? 2 : 1" />
                        User Management
                    </span>
                </SideNavLink>
            </ul>
        </nav>
    </aside>

    <!-- Page Content -->
    <main class="bg-slate-100 min-h-screen h-full transition-transform duration-300 lg:pl-64 antialiased">

        <div class="py-12">
            <div class="container mx-auto sm:px-6 lg:px-8">
                <slot />
            </div>
        </div>

    </main>
</template>
