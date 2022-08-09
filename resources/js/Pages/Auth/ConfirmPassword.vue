<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <GuestLayout title="Email Verification">
        <div class="max-w-7xl mx-auto mt-28 mb-28 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto shadow-2xl shadow-blue-500/50">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="mb-4 text-sm text-gray-600">
                            This is a secure area of the application. Please confirm your password before continuing.
                        </div>
                        <form class="space-y-6 mt-6" @submit.prevent="submit">
                            <div>
                                <JetLabel for="password" value="Password" />
                                <JetInput
                                    id="password"
                                    ref="passwordInput"
                                    v-model="form.password"
                                    type="password"
                                    class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required
                                    autocomplete="current-password"
                                    autofocus
                                />
                                <JetInputError class="mt-1" :message="form.errors.password" />
                            </div>
                            <div class="flex justify-end mt-4">
                                <JetButton class="ml-4 flex items-center justify-center bg-gradient-to-r from-sky-400 to-blue-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:from-sky-700 hover:to-blue-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Confirm
                                </JetButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
