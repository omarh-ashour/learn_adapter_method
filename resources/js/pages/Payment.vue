<template>
    <div
        class="h-[2000px] min-w-screen flex-col items-center justify-center space-y-20"
    >
        <div>
            <div class="mb-10 flex bg-green-900 px-20 p-3 text-amber-100 justify-center">
                Payments Gateway
            </div>
            <div class="flex justify-around">
                <Link
                    :href="pay('paypal')"
                    class="rounded-2xl border-2 border-orange-400 bg-red-500 p-2 font-bold text-blue-500"
                >
                    Pay With Paypal
                </Link>
                <Link
                    :href="pay('stripe')"
                    class="rounded-2xl border-2 border-yellow-400 bg-red-500 p-2 font-bold text-orange-200"
                >
                    Pay With Stripe
                </Link>
            </div>
        </div>
        <div
            v-if="props.status"
            class="m-5 mt-20 w-fit border-2 border-yellow-300 bg-white p-3 text-black"
        >
            Success: Paid using <span class="text-blue-500">{{ status }}</span>
        </div>
    </div>
</template>
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { pay } from '@/actions/App/Payment/Payment';
const props = defineProps({ name: String, status: String });
</script>
