<script setup>
import { computed } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import { ArrowLeftIcon } from '@heroicons/vue/solid'

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <HomeLayout title="Email Verification">
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
                <div class="bg-white py-8 px-4 border border-gray-300 shadow sm:rounded-lg sm:px-6">

                    <div class="mb-4 text-sm text-gray-600">
                        Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </div>

                    <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
                        A new verification link has been sent to the email address you provided in your profile settings.
                    </div>

                    <form class="space-y-6 mt-6" @submit.prevent="submit">

                        <div class="mt-4 flex items-center justify-between">
                            <JetButton class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:from-purple-700 hover:to-indigo-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Resend Verification Email
                            </JetButton>

                            <div>
                                <Link :href="route('profile.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Edit Profile</Link>

                                <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">Log Out</Link>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
