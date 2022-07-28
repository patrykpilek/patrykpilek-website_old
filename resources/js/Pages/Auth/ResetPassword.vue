<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import { ArrowLeftIcon } from '@heroicons/vue/solid'

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
    <HomeLayout title="Forgot Password">
        <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="flex justify-center mt-12">
                    <div class="flex items-center">
                        <ArrowLeftIcon class="h-5 w-5 text-gray-500"/>
                        <p class="ml-2 text-center text-sm text-gray-600">
                            <Link :href="route('login')" class="font-medium text-gray-600 hover:text-gray-500">
                                Back to log in
                            </Link>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white py-8 px-4 border border-gray-300 shadow sm:rounded-lg sm:px-10">

                    <h2 class="mt-6 text-start text-3xl font-extrabold text-gray-900">Reset password</h2>

                    <form class="space-y-6 mt-6" @submit.prevent="submit">
                        <div>
                            <JetLabel for="email" value="Email address" />
                            <JetInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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
                                class="mt-1 block w-full"
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
                                class="mt-1 block w-full"
                                required
                                autocomplete="new-password"
                            />
                        </div>

                        <div>
                            <JetButton class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Reset password
                            </JetButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
