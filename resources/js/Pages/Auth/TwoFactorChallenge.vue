<script setup>
import { nextTick, ref } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import { ArrowLeftIcon } from '@heroicons/vue/solid'

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = '';
    } else {
        codeInput.value.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <HomeLayout title="Two-factor Confirmation">
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

                    <template v-if="! recovery">
                        Please confirm access to your account by entering the authentication code provided by your authenticator application.
                    </template>

                    <template v-else>
                        Please confirm access to your account by entering one of your emergency recovery codes.
                    </template>

                    <form class="space-y-6 mt-6" @submit.prevent="submit">
                        <div v-if="! recovery">
                            <JetLabel for="code" value="Code" />
                            <JetInput
                                id="code"
                                ref="codeInput"
                                v-model="form.code"
                                type="text"
                                inputmode="numeric"
                                class="mt-1 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                autofocus
                                autocomplete="one-time-code"
                            />
                        </div>

                        <div v-else>
                            <JetLabel for="recovery_code" value="Recovery Code" />
                            <JetInput
                                id="recovery_code"
                                ref="recoveryCodeInput"
                                v-model="form.recovery_code"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="one-time-code"
                            />

                        </div>

                        <JetInputError :message="form.errors.code" />

                        <div class="flex items-center justify-end mt-4">
                            <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                                <template v-if="! recovery">
                                    Use a recovery code
                                </template>

                                <template v-else>
                                    Use an authentication code
                                </template>
                            </button>

                            <JetButton class="ml-4 flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Log in
                            </JetButton>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
