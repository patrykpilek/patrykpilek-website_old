<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout title="Forgot Password">
        <div class="max-w-7xl mx-auto mt-28 mb-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto shadow-2xl shadow-blue-500/50">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h2 class="mt-6 text-start text-3xl font-extrabold text-gray-900">Reset password</h2>
                        <form class="space-y-6 mt-6" @submit.prevent="submit">
                            <div>
                                <JetLabel for="email" value="Email address" />
                                <JetInput
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required
                                    autofocus
                                />
                            </div>
                            <div class="space-y-1">
                                <JetLabel for="password" value="New Password" />
                                <JetInput
                                    id="password"
                                    v-model="form.password"
                                    type="password"
                                    class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required
                                    autocomplete="new-password"
                                />
                                <JetInputError :message="form.errors.password" />
                            </div>
                            <div class="space-y-1">
                                <JetLabel for="password_confirmation" value="Confirm New Password" />
                                <JetInput
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    type="password"
                                    class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>
                            <div>
                                <JetButton class="w-full flex items-center justify-center bg-gradient-to-r from-sky-400 to-blue-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:from-sky-700 hover:to-blue-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Reset password
                                </JetButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
