<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <HomeLayout title="Sign Up">
        <div class="relative">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="min-h-full flex">
                    <div class="flex-1 flex flex-col justify-center py-8 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                        <div class="mx-auto w-full max-w-sm lg:w-96">
                            <div>
                                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign Up</h2>
                            </div>

                            <div class="mt-8">
                                <div>
                                    <div class="mt-6 relative">
                                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                            <div class="w-full border-t border-gray-300" />
                                        </div>
                                        <div class="relative flex justify-center text-sm">
                                            <span class="px-2 bg-white text-gray-500">by filling out the form below</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <form @submit.prevent="submit" class="space-y-6">

                                        <div>
                                            <JetLabel for="name" value="Name" />
                                            <JetInput
                                                id="name"
                                                v-model="form.name"
                                                type="text"
                                                class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                required
                                                autofocus
                                                autocomplete="name"
                                            />
                                            <JetInputError :message="form.errors.name" />
                                        </div>

                                        <div class="space-y-1">
                                            <JetLabel for="email" value="Email address" />
                                            <JetInput
                                                id="email"
                                                v-model="form.email"
                                                type="email"
                                                class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                required
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

                                        <div class="space-y-1">
                                            <JetLabel for="password_confirmation" value="Confirm Password" />
                                            <JetInput
                                                id="password_confirmation"
                                                v-model="form.password_confirmation"
                                                type="password"
                                                class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                required
                                                autocomplete="new-password"
                                            />
                                        </div>

                                        <div class="space-y-1">
                                            <JetLabel for="terms">
                                                <div class="flex items-center">
                                                    <JetCheckbox id="terms" v-model:checked="form.terms" name="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />

                                                    <div class="ml-2">
                                                        I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                                                    </div>
                                                </div>
                                            </JetLabel>
                                            <JetInputError :message="form.errors.terms" />
                                        </div>

                                        <div>
                                            <JetButton class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Sing Up
                                            </JetButton>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden mt-6 lg:block relative w-0 flex-1">
                        <img class="absolute inset-0 h-auto w-auto object-cover" :src="'./storage/images/signup.jpg'" alt="sign up" />
                    </div>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
