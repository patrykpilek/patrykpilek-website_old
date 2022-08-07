<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import { MenuIcon, XIcon } from '@heroicons/vue/outline'

</script>

<template>
    <header>
        <Popover class="relative bg-white">
            <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <Link :href="route('HomePage')">
                        <span class="sr-only">Logo</span>
                        <img class="h-8 w-auto sm:h-10" :src="'../storage/images/logo.png'" alt="logo" />
                    </Link>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <span class="sr-only">Open menu</span>
                        <MenuIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                <PopoverGroup as="nav" class="hidden md:flex space-x-10">
                    <Link :href="route('HomePage')" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</Link>
                    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900"> Blog </a>
                    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900"> Contact </a>
                </PopoverGroup>


                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                    <Link v-if="$page.props.user" :href="route('dashboard')" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Log In</Link>
                        <Link :href="route('register')" class="ml-8 whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">Sign Up</Link>
                    </template>
                </div>
            </div>

            <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
                <PopoverPanel focus class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                        <div class="pt-5 pb-6 px-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto" :src="'../storage/images/logo.png'" alt="logo" />
                                </div>
                                <div class="-mr-2">
                                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                        <span class="sr-only">Close menu</span>
                                        <XIcon class="h-6 w-6" aria-hidden="true" />
                                    </PopoverButton>
                                </div>
                            </div>
                        </div>
                        <div class="py-6 px-5">
                            <div class="grid grid-cols-2 gap-4">
                                <Link :href="route('HomePage')" class="text-base font-medium text-gray-900 hover:text-gray-700">Home</Link>
                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700"> Blog </a>
                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700"> Contact </a>
                            </div>
                            <div class="mt-6">
                                <Link :href="route('login')" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">Log In</Link>
                                <p class="mt-6 text-center text-base font-medium text-gray-500">
                                    Don't have an account?
                                    <Link :href="route('register')" class="text-gray-900">Sign Up</Link>
                                </p>
                            </div>
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover>
    </header>
</template>
