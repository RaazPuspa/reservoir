<template>
    <div class="px-2 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="focus:outline-none text-2xl font-bold leading-normal text-gray-800">
                Edit Snippet
            </p>
        </div>

        <div class="bg-white py-4">
            <Schema method="put"
                    :url="url"
                    :payload="snippet"
                    @success="$router.push({ name: 'snippets' })"></Schema>
        </div>
    </div>
</template>

<script>
import Schema from './Schema.vue';

export default {
    name: 'Edit',
    components: {Schema},
    props: {
        uuid: {type: String, required: true},
    },

    data() {
        return {
            snippet: {},
        }
    },

    created() {
        this.fetchSnippet()
    },

    computed: {
        url() {
            return `/api/snippets/${this.uuid}`;
        },
    },

    watch: {
        uuid() {
            this.fetchSnippet()
        },
    },

    methods: {
        async fetchSnippet() {
            const {data} = await window.axios.get(`/api/snippets/${this.uuid}`)
            this.snippet = data ? {...data, in_new_tab: data.in_new_tab ? '1' : '0'} : {}
        },
    },
}
</script>
