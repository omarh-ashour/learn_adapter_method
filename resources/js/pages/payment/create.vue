<template>
    <div
        class="h-[2000px] min-w-screen flex-col items-center justify-center space-y-20 p-20"
    >
        <div>
            <div
                class="mb-10 flex justify-center rounded bg-green-900 p-3 px-20 text-xl text-amber-100"
            >
                Proceeding with:
                <span class="ml-2 font-bold capitalize">{{
                    selectedGateway
                }}</span>
            </div>
            <div class="flex flex-col items-center justify-center">
                <form
                    @submit.prevent="submitPayment"
                    class="flex flex-col items-center space-y-4"
                >
                    <input
                        v-model="form.amount"
                        type="number"
                        placeholder="Amount ($)"
                        class="rounded border p-2"
                        required
                    />
                    <button
                        type="submit"
                        class="rounded-xl border-2 border-green-500 bg-green-200 p-3 font-bold text-green-800"
                    >
                        Confirm {{ selectedGateway }} Payment
                    </button>
                    <!-- Make sure we can always go back -->
                    <Link href="/payments" class="mt-4 text-blue-500 underline"
                        >Cancel</Link
                    >
                </form>
            </div>
        </div>

        <!-- Feedback from session -->
        <div
            v-if="status"
            class="m-5 mt-20 w-fit border-2 border-green-400 bg-green-50 p-3 font-bold text-green-900"
        >
            Success: Paid 💰 using
            <span class="text-blue-500 uppercase">{{ status }}</span>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    selectedGateway: string;
    status?: string;
}>();

const form = useForm({
    amount: '',
});

const submitPayment = () => {
    // Basic dynamic switch to the appropriate endpoint.
    form.post(`/payments/pay/${props.selectedGateway}`, {
        preserveScroll: true,
    });
};
</script>
