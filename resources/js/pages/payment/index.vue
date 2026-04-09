<template>
    <div class="flex flex-col items-center justify-center p-20 space-y-10">
        <h1 class="text-2xl font-bold bg-green-900 text-amber-100 p-4 rounded">
            Choose Payment Gateway
        </h1>
        <div class="flex gap-4">
            <Link
                v-for="gateway in gateways"
                :key="gateway.id"
                :href="`/payments/create/${gateway.id}`"
                :class="`rounded-xl border-2 p-4 font-bold ${
                    gateway.color === 'blue' 
                        ? 'border-blue-400 bg-blue-100 text-blue-700' 
                        : 'border-orange-400 bg-orange-100 text-orange-700'
                }`"
            >
                {{ gateway.name }}
            </Link>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    gateways: Array<{ id: string; name: string; color: string }>;
}>();
</script>