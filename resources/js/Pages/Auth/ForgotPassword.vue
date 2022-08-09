<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import { ArrowLeftIcon } from '@heroicons/vue/solid'

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout title="Forgot Password">
        <div class="max-w-7xl mx-auto mt-28 mb-28 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md mx-auto shadow-2xl shadow-blue-500/50">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="flex justify-center items-center">
                            <ArrowLeftIcon class="h-5 w-5 text-gray-500"/>
                            <p class="ml-2 text-center text-sm text-gray-600">
                                <Link :href="route('login')" class="font-medium text-gray-600 hover:text-gray-500">
                                    Back to log in
                                </Link>
                            </p>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>
                        <h2 class="mt-6 text-start text-3xl font-extrabold text-gray-900">Forgot your password?</h2>
                        <p class="mt-4 text-start text-gray-600">
                            No problem. Just type in your email and we will send you a link to reset your password!
                        </p>
                        <form class="space-y-6 mt-6" @submit.prevent="submit">
                            <div>
                                <JetLabel for="email" value="Email Address" />
                                <JetInput
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required
                                    autofocus
                                />
                                <JetInputError :message="form.errors.email" />
                            </div>
                            <div>
                                <JetButton class="w-full flex items-center justify-center bg-gradient-to-r from-sky-400 to-blue-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:from-sky-700 hover:to-blue-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Recover password
                                </JetButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
