<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import DekstopNavigation from "@/Layouts/User/DekstopNavigation.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <!-- Navigation -->
        <div class="relative z-10 text-green-50">
            <DekstopNavigation />
        </div>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
    </div>
</template>
