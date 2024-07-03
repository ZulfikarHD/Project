<script setup>
import { ref } from "vue";
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
    User
} from 'lucide-vue-next';

const showingSideNav = ref(false);
</script>

<style>
.glass {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}
</style>

<template>
    <!-- Header -->

    <!-- Side Nav -->
    <aside :class="{
        'translate-x-0': showingSideNav,
        '-translate-x-full  ': !showingSideNav,
    }"
        class="glass m-4 h-[96vh] w-64 pl-3 pr-4 py-6 transition-transform duration-300 lg:translate-x-0 lg:block overflow-hidden fixed left-0 top-0 z-10 shadow-md shadow-gray-500/25 antialiased">
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
                        <Calendar :size="18" class="mr-2" />
                        Booking Management
                    </span>
                </SideNavLink>

                <!-- Customer Management -->
                <SideNavLink :href="route('owner.customerMgmt')" :active="route().current('owner.customerMgmt')">
                    <span class="flex items-center">
                        <Users :size="18" class="mr-2" />
                        Customer Management
                    </span>
                </SideNavLink>

                <!-- Field Management -->
                <SideNavLink :href="route('owner.fieldMgmt')" :active="route().current('owner.fieldMgmt')">
                    <span class="flex items-center">
                        <Map :size="18" class="mr-2" />
                        Field Management
                    </span>
                </SideNavLink>

                <!-- Staff Management -->
                <SideNavLink :href="route('owner.staffMgmt')" :active="route().current('owner.staffMgmt')">
                    <span class="flex items-center">
                        <UserCheck :size="18" class="mr-2" />
                        Staff Management
                    </span>
                </SideNavLink>

                <!-- Financial Management -->
                <SideNavLink :href="route('owner.financialMgmt')" :active="route().current('owner.financialMgmt')">
                    <span class="flex items-center">
                        <DollarSign :size="18" class="mr-2" />
                        Financial Management
                    </span>
                </SideNavLink>

                <!-- Marketing Tools -->
                <SideNavLink :href="route('owner.marketingTools')" :active="route().current('owner.marketingTools')">
                    <span class="flex items-center">
                        <Megaphone :size="18" class="mr-2" />
                        Marketing Tools
                    </span>
                </SideNavLink>

                <!-- Reporting Tools -->
                <SideNavLink :href="route('owner.reportingTools')" :active="route().current('owner.reportingTools')">
                    <span class="flex items-center">
                        <BarChart2 :size="18" class="mr-2" />
                        Reporting Tools
                    </span>
                </SideNavLink>

                <!-- User Management -->
                <SideNavLink :href="route('owner.userMgmt')" :active="route().current('owner.userMgmt')">
                    <span class="flex items-center">
                        <Users :size="18" class="mr-2" />
                        User Management
                    </span>
                </SideNavLink>
            </ul>
        </nav>
    </aside>

    <!-- Page Content -->
    <main class="bg-slate-100 min-h-screen h-full transition-transform duration-300 lg:pl-64">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <slot />
            </div>
        </div>

    </main>
</template>
