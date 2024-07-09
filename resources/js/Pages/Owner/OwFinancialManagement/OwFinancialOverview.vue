<script setup>
import { ref, computed } from 'vue';
import Card from '@/Components/Card.vue';
import { Banknote, CalendarCheck, CreditCard, DollarSign, } from 'lucide-vue-next';

const totalPendapatan = ref(100000); // Contoh nilai
const totalPengeluaran = ref(50000); // Contoh nilai
const reservasiTertunggak = ref([
    { id: 1, klien: 'Klien A', jumlah: 2000, tanggalJatuhTempo: '2023-05-10' },
    { id: 2, klien: 'Klien B', jumlah: 1500, tanggalJatuhTempo: '2023-05-15' },
]);
const pembayaranMendatang = ref([
    { id: 1, penerima: 'Pemasok A', jumlah: 3000, tanggalJatuhTempo: '2023-05-20' },
    { id: 2, penerima: 'Pemasok B', jumlah: 2500, tanggalJatuhTempo: '2023-05-25' },
]);
const ringkasanAnggaran = ref({
    dialokasikan: 120000,
    dibelanjakan: 50000,
    tersisa: 70000,
});

const labaBersih = computed(() => totalPendapatan.value - totalPengeluaran.value);
</script>

<template>
    <!-- baris pertama -->
    <div class="flex gap-4 flex-wrap justify-between mb-4">
        <!-- Total Pendapatan -->
        <Card class="flex-auto flex max-w-[48%] md:max-w-full">
            <div class="flex gap-4 h-full items-center py-2 px-1">
                <span class="bg-green-100 p-2 rounded-md w-fit h-fit">
                    <DollarSign :size="30" class="text-green-600" />
                </span>

                <div class="flex flex-col flex-wrap pt-1">
                    <h3 class="text-slate-800 font-bold text-lg leading-5">
                        Rp.25.500.000
                    </h3>
                    <h5 class="text-slate-600 leading-5">
                        Pendapatan
                    </h5>
                </div>
            </div>
        </Card>

        <!-- Total Pengeluaran -->
        <Card class="flex-auto flex max-w-[48%] md:max-w-full">
            <div class="flex gap-4 h-full items-center  py-2 px-1">
                <span class="bg-red-100 p-2 rounded-md w-fit h-fit">
                    <CreditCard :size="22" class="text-red-600" />
                </span>
                <div class="flex flex-col flex-wrap pt-1">
                    <h3 class="text-slate-800 font-bold text-lg leading-5">
                        Rp.5.000.000
                    </h3>
                    <h5 class="text-slate-600 leading-5">
                        Pengeluaran
                    </h5>
                </div>
            </div>
        </Card>

        <!-- Total Reservasi -->
        <Card class="flex-auto flex max-w-[48%] md:max-w-full">
            <div class="flex gap-4 h-full items-center  py-2 px-1">
                <span class="bg-indigo-100 p-2 rounded-md w-fit h-fit">
                    <CalendarCheck :size="22" class="text-indigo-600" />
                </span>
                <div class="flex flex-col flex-wrap pt-1">
                    <h3 class="text-slate-800 font-bold text-lg leading-5">
                        211
                    </h3>
                    <h5 class="text-slate-600 leading-5">
                        Reservasi
                    </h5>
                </div>
            </div>
        </Card>

        <!-- Laba Bersih -->
        <Card class="flex-auto flex  max-w-[48%] md:max-w-full">
            <div class="flex gap-4 h-full items-center  py-2 px-1">
                <span class="bg-emerald-100 p-2 rounded-md w-fit h-fit">
                    <Banknote :size="22" class="text-emerald-600" />
                </span>
                <div class="flex flex-col flex-wrap pt-1">
                    <h3 class="text-slate-800 font-bold text-lg leading-5">
                        Rp.20.000.000
                    </h3>
                    <h5 class="text-slate-600 leading-5">
                        Laba Bersih
                    </h5>
                </div>
            </div>
        </Card>
    </div>

    <div class="flex gap-4 flex-wrap">
        <div class="mb-8 flex-auto">
            <h2 class="text-xl font-semibold mb-4">Reservasi Tertunggak</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Klien</th>
                        <th class="py-2 px-4 border-b">Jumlah</th>
                        <th class="py-2 px-4 border-b">Tanggal Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="reservasi in reservasiTertunggak" :key="reservasi.id" class="border-t">
                        <td class="py-2 px-4 border-b">{{ reservasi.klien }}</td>
                        <td class="py-2 px-4 border-b">{{ reservasi.jumlah }}</td>
                        <td class="py-2 px-4 border-b">{{ reservasi.tanggalJatuhTempo }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-8 flex-auto">
            <h2 class="text-xl font-semibold mb-4">Pembayaran Mendatang</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Penerima</th>
                        <th class="py-2 px-4 border-b">Jumlah</th>
                        <th class="py-2 px-4 border-b">Tanggal Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="pembayaran in pembayaranMendatang" :key="pembayaran.id" class="border-t">
                        <td class="py-2 px-4 border-b">{{ pembayaran.penerima }}</td>
                        <td class="py-2 px-4 border-b">{{ pembayaran.jumlah }}</td>
                        <td class="py-2 px-4 border-b">{{ pembayaran.tanggalJatuhTempo }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2 class="text-xl font-semibold mb-4">Ringkasan Anggaran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <Card class="p-4">
                <h3 class="text-lg font-semibold mb-2">Dialokasikan</h3>
                <p class="text-2xl">{{ ringkasanAnggaran.dialokasikan }}</p>
            </Card>
            <Card class="p-4">
                <h3 class="text-lg font-semibold mb-2">Dibelanjakan</h3>
                <p class="text-2xl">{{ ringkasanAnggaran.dibelanjakan }}</p>
            </Card>
            <Card class="p-4">
                <h3 class="text-lg font-semibold mb-2">Tersisa</h3>
                <p class="text-2xl">{{ ringkasanAnggaran.tersisa }}</p>
            </Card>
        </div>
    </div>
</template>
