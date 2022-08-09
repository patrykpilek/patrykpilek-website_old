<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import JetBanner from '@/Jetstream/Banner.vue';
import NavBarGuest from '@/Layouts/Partials/NavBarGuest.vue';
import Header from '@/Layouts/Partials/Header.vue';

defineProps({
    title: String,
});

</script>

<template>
    <div>
        <Head :title="title" />

        <JetBanner />

        <div class="bg-white">
            <NavBarGuest />

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white" aria-labelledby="header-heading">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Main Page-->
            <main aria-labelledby="main-heading">
                <slot />
            </main>

            <!-- Page Footer-->
            <footer v-if="$slots.footer" class="bg-withe" aria-labelledby="footer-heading">
                <slot name="footer" />
            </footer>

        </div>
    </div>
</template>
