<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <HomeLayout title="Log In">
        <div class="relative">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="min-h-full flex">
                    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                        <div class="mx-auto mt-12 w-full max-w-sm lg:w-96">
                            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                {{ status }}
                            </div>

                            <div>
                                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                            </div>

                            <div class="mt-8">
                                <div>
                                    <div class="mt-6 relative">
                                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                            <div class="w-full border-t border-gray-300" />
                                        </div>
                                        <div class="relative flex justify-center text-sm">
                                            <span class="px-2 bg-white text-gray-500">Welcome back</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <form @submit.prevent="submit" class="space-y-6">
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
                                            <JetInputError :message="form.errors.email" />
                                        </div>

                                        <div class="space-y-1">

                                            <JetLabel for="password" value="Password" />
                                            <JetInput
                                                id="password"
                                                v-model="form.password"
                                                type="password"
                                                class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                required
                                                autocomplete="current-password"
                                            />
                                            <JetInputError :message="form.errors.password" />
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <JetCheckbox v-model:checked="form.remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                                            </div>

                                            <div class="text-sm">
                                                <Link :href="route('password.request')" class="font-medium text-blue-600 hover:text-blue-500">Forgot your password?</Link>
                                            </div>
                                        </div>

                                        <div>
                                            <JetButton class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Log in
                                            </JetButton>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block relative w-0 flex-1">
                        <img class="absolute inset-0 h-auto w-auto object-cover" :src="'./storage/images/signin.jpg'" alt="sign in" />
                    </div>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
