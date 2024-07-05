<style>
.glass {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}
</style>

<template>
    <div class="glass overflow-hidden shadow-sm rounded-lg px-4 py-2">
        <slot />
    </div>
</template>
