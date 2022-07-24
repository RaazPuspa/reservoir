<template>
    <div class="px-2 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="focus:outline-none text-2xl font-bold leading-normal text-gray-800">
                Edit File
            </p>
        </div>

        <div class="bg-white py-4">
            <Schema withFile
                    method="post"
                    :url="url"
                    :payload="file"
                    @success="$router.push({ name: 'files' })"></Schema>
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
            file: {},
        }
    },

    created() {
        this.fetchFile()
    },

    computed: {
        url() {
            return `/api/files/${this.uuid}`;
        },
    },

    watch: {
        uuid() {
            this.fetchFile()
        },
    },

    methods: {
        async fetchFile() {
            const {data} = await window.axios.get(`/api/files/${this.uuid}`)
            this.file = data || {}
        },
    },
}
</script>
