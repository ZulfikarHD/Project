<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

const showingNavigationDropdown = ref(false);
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
    <aside
        :class="{ block: isOpen, hidden: !isOpen }"
        @click.away="isOpen = false"
        x-data="{subMenu:null}"
        class="glass m-4 h-[96vh] w-64 p-6 transition-all duration-300 lg:block overflow-hidden fixed left-0 top-0 z-10 shadow-md shadow-gray-500/25"
    >
        <!-- {{-- Header Side Bar --}} -->
        <div class="text-indigo-950 mb-6 text-2xl font-semibold">
            Project Logo
        </div>

        <!-- {{-- Side Nav Link --}} -->
        <nav class="h-full overflow-y-auto pr-4 -mr-4 relative pb-32">
            <ul>
                <!-- Dashboard -->
                <NavLink
                    :href="route('owner.dashboard')"
                    :active="route().current('owner.dashboard')"
                >
                    Dashboard
                </NavLink>

                <!-- Booking Management -->
                <NavLink
                    :href="route('owner.bookingMgmt')"
                    :active="route().current('owner.bookingMgmt')"
                >
                    Booking Management
                </NavLink>

                <!-- Customer Management -->
                <NavLink
                    :href="route('owner.customerMgmt')"
                    :active="route().current('owner.customerMgmt')"
                >
                    Customer Management
                </NavLink>

                <!-- Field Management -->
                <NavLink
                    :href="route('owner.fieldMgmt')"
                    :active="route().current('owner.fieldMgmt')"
                >
                    Field Management
                </NavLink>

                <!-- Staff Management -->
                <NavLink
                    :href="route('owner.staffMgmt')"
                    :active="route().current('owner.staffMgmt')"
                >
                    Staff Management
                </NavLink>

                <!-- Financial Management -->
                <NavLink
                    :href="route('owner.financialMgmt')"
                    :active="route().current('owner.financialMgmt')"
                >
                    Financial Management
                </NavLink>

                <!-- Marketing Tools -->
                <NavLink
                    :href="route('owner.marketingTools')"
                    :active="route().current('owner.marketingTools')"
                >
                    Marketing Tools
                </NavLink>

                <!-- Reporting Tools -->
                <NavLink
                    :href="route('owner.reportingTools')"
                    :active="route().current('owner.reportingTools')"
                >
                    Reporting Tools
                </NavLink>

                <!-- User Management -->
                <NavLink
                    :href="route('owner.userMgmt')"
                    :active="route().current('owner.userMgmt')"
                >
                    User Management
                </NavLink>
            </ul>
        </nav>
    </aside>

    <!-- Page Content -->
    <main class="bg-slate-100 min-h-screen h-full">
        <slot />
    </main>
</template>
