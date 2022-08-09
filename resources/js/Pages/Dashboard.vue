<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import Footer from '@/Layouts/Partials/Footer.vue';

</script>

<template>
    <GuestLayout title="Dashboard">
        <template #header>
            <div class="pb-5 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Dashboard</h3>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>

        <template #footer>
            <Footer />
        </template>

    </GuestLayout>
</template>
