<template>
    <div class="lg:flex">
        <aside class="w-48 static border-r-2 border-gray-200">
            <div class="h-full scrolling-touch">
                <nav class="pb-20 font-normal text-base">
                    <ul class="list-unstyled fw-normal divide-y divide-gray-200">
                        <li>
                            <router-link
                                :to="{ name: 'files'}"
                                class="px-6 py-4 text-xl transition-colors duration-200 block text-gray-500 hover:text-gray-100 hover:bg-gray-500">
                                Files
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                :to="{ name: 'links'}"
                                class="px-6 py-4 text-xl transition-colors duration-200 block text-gray-500 hover:text-gray-100 hover:bg-gray-500">
                                Links
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                :to="{ name: 'snippets'}"
                                class="px-6 py-4 text-xl transition-colors duration-200 block text-gray-500 hover:text-gray-100 hover:bg-gray-500">
                                Snippets
                            </router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <main class="flex-auto max-h-full overflow-visible" style="height: calc(100vh - 89px)">
            <div class="flex w-full px-4">
                <router-view/>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: 'Reservoir'
}
</script>

<style scoped>
.router-link-active {
    @apply bg-gray-700 text-gray-100;
}
</style>
