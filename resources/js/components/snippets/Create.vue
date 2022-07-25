<template>
    <div class="px-2 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="focus:outline-none text-2xl font-bold leading-normal text-gray-800">
                Add Snippet
            </p>
        </div>

        <div class="bg-white py-4">
            <Schema method="post" url="/api/snippets" @success="$router.push({ name: 'snippets' })"></Schema>
        </div>
    </div>
</template>

<script>
import Schema from './Schema.vue';

export default {
    name: 'Create',
    components: { Schema },
}
</script>
