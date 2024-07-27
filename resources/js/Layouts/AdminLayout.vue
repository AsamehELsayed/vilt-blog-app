<template>
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 px-4 py-5 text-white">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold">Flowbite</h1>
                <button class="text-white hover:text-gray-400 focus:text-gray-400 focus:outline-none" @click="toggleSidebar">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <ul class="mt-6">
                <li>
                    <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                        <span class="w-4 h-4 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18" />
                            </svg>
                        </span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                        <span class="w-4 h-4 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75" />
                            </svg>
                        </span>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                        <span class="w-4 h-4 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        Customers
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main content -->
        <div class="flex-1">
            <div class="p-4">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
const toggleSidebar = () => {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('-translate-x-full');
    sidebar.classList.toggle('translate-x-0');
}
</script>

<style scoped>
.sidebar {
    transition: transform 0.3s ease-in-out;
}
</style>
