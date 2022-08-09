<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
});
</script>

:class="[item.current
? 'group border-l-4 px-3 py-2 flex items-center text-sm font-medium bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700'
: 'group border-l-4 px-3 py-2 flex items-center text-sm font-medium border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900',

'group border-l-4 px-3 py-2 flex items-center text-sm font-medium']"


? 'flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-teal-500 group-hover:text-teal-500' : 'flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500'
<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
