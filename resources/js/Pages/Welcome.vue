<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" width="765" height="625"
                class="svg-animations " style="background-color: rgb(0, 0, 0);"><svg
                    viewBox="0 0 110.99678039550781 139" width="100" height="100" style="fill: rgb(255, 255, 255);"
                    x="149.24913787841797" y="100"><svg width="111" height="134" viewBox="0 0 111 134"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M94.5435 38.1084L56.93 0.581001C56.5461 0.211273 56.043 0 55.5134 0C54.9838 0 54.4807 0.211273 54.11 0.581001L16.4833 38.1084C-5.50747 60.028 -5.50747 95.7067 16.4833 117.64C26.8366 127.966 40.6852 133.776 55.5399 134C70.3284 133.776 84.1902 127.966 94.5435 117.64C105.148 107.063 110.987 92.9338 110.987 77.8806C110.987 62.8274 105.162 48.6853 94.5435 38.1084ZM14.365 46.5857L53.5275 85.0903V114.325L5.19005 66.6567C6.75231 59.5394 9.81064 52.673 14.365 46.5857ZM53.5275 40.9078L36.422 23.8343L53.5275 6.76074V40.9078ZM57.4993 6.76074L74.671 23.8871L57.4993 41.0134V6.76074ZM57.4993 85.3411C57.539 85.2619 57.5788 85.1695 57.6052 85.0903L96.7147 46.6518C101.19 52.6334 104.274 59.4734 105.837 66.7755L57.4993 114.431V85.3411ZM94.1992 43.5619L57.4993 79.6368V46.5593C57.5523 46.5197 57.6185 46.4933 57.6714 46.4405L77.4777 26.6864L91.7367 40.9078C92.5973 41.7661 93.4181 42.6508 94.1992 43.5619ZM33.6153 26.6336L53.4745 46.4405C53.4878 46.4537 53.5142 46.4669 53.5407 46.4801V79.5311L16.8805 43.4959C17.6484 42.6112 18.4428 41.7397 19.2901 40.9078L33.6153 26.6336ZM4.38244 71.4235L53.5407 119.884V129.537C53.5407 129.682 53.554 129.827 53.5937 129.959C40.5792 129.286 28.4651 123.965 19.3034 114.827C7.44077 103.009 2.47595 86.8729 4.38244 71.4235ZM91.7367 114.84C82.5617 123.991 70.4343 129.312 57.4596 129.973C57.4861 129.827 57.5126 129.695 57.5126 129.537V120.003L106.644 71.5556C106.896 73.6419 107.028 75.7414 107.028 77.8674C107.028 91.8774 101.6 105.003 91.7367 114.84Z" />
                        </g>
                    </svg></svg><text fill="#ffffff" font-family="Verdana" font-size="32px" x="60.75086212158203"
                    y="158.7790771698924">
                    <tspan dy="0" x="60.75086212158203">DMS</tspan>
                </text><text fill="#ffffff" font-family="Arial" font-size="16px" x="100" y="173.31721115112305">
                    <tspan dy="0" x="100"></tspan>
                </text></svg>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
