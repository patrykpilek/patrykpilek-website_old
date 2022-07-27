<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import JetBanner from '@/Jetstream/Banner.vue';
import Header from '@/Layouts/Partials/Header.vue';
import Footer from '@/Layouts/Partials/Footer.vue';

defineProps({
    title: String,
});

</script>

<template>

    <div>
        <Head :title="title" />

        <JetBanner />

        <div class="bg-white">
            <Header />

            <main>
                <slot />
            </main>

            <Footer />
        </div>

    </div>

</template>
