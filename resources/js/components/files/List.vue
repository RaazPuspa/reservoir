<template>
    <div class="px-4 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="focus:outline-none text-2xl font-bold leading-normal text-gray-800">
                Files
            </p>

            <router-link
                :to="{ name: 'files.create' }"
                class="bg-gray-700 text-gray-100 mt-0 inline-flex items-start justify-start px-4 py-2 rounded">
                <p class="font-medium leading-none flex gap-x-2 items-center">
                    <svg width="24"
                         height="24"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.25"
                         stroke="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Add File
                </p>
            </router-link>
        </div>

        <div class="bg-white py-8">
            <table class="w-full">
                <thead>
                <tr class="focus:outline-none h-16 border border-gray-100 rounded">
                    <td class="px-4 text-base font-medium text-gray-700">Title</td>
                    <td class="px-4 text-base font-medium text-gray-700">File Name</td>
                    <td class="px-4 text-base font-medium text-gray-700">File Size</td>
                    <td class="px-4 text-base font-medium text-gray-700">Timestamp</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                <tr v-if="!files || !files.length">
                    <td colspan="5"
                        class="h-64 text-center bg-gray-100 font-mono font-semibold text-gray-700">
                        Storage is void. Add new file to list.
                    </td>
                </tr>

                <tr :key="file.uuid" v-for="file in files" class="h-16 border border-gray-100 rounded">
                    <td class="px-4 text-base leading-none text-gray-700">
                        {{ file.title }}
                    </td>

                    <td class="px-4 text-base leading-none text-gray-700">
                        {{ file.name }}
                    </td>

                    <td class="px-4 text-base leading-none text-gray-700">
                        {{ file.size }}
                    </td>

                    <td class="px-4 text-base leading-none text-gray-700">
                        {{ file.created_at }}
                    </td>

                    <td class="px-4">
                        <div class="flex gap-x-3 justify-end items-center">
                            <router-link
                                :to="{ name: 'files.edit', params: { uuid: file.uuid } }"
                                class="text-sm text-white p-2 bg-gray-500 rounded hover:bg-gray-700 focus:outline-none">
                                <svg width="24"
                                     height="24"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="1.25"
                                     stroke="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"/>
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"/>
                                </svg>
                            </router-link>

                            <confirm @confirmed="deleteFile(file)">
                                <template #trigger>
                                    <button class="text-sm text-white p-2 bg-red-500 rounded hover:bg-red-700 focus:outline-none">
                                        <svg width="24"
                                             height="24"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.25"
                                             stroke="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <line x1="4" y1="7" x2="20" y2="7"/>
                                            <line x1="10" y1="11" x2="10" y2="17"/>
                                            <line x1="14" y1="11" x2="14" y2="17"/>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                        </svg>
                                    </button>
                                </template>

                                <template #default>
                                    <div class="text-lg text-gray-900 whitespace-wrap">
                                        {{ `Are you sure to delete file with title: ${file.title}?` }}
                                    </div>
                                </template>
                            </confirm>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <pagination route="files"
                        @paginate="fetchFiles"
                        :pagination="pagination"
                        v-if="files && files.length"></pagination>
        </div>
    </div>
</template>

<script>
import Confirm from '../Confirm.vue';
import Pagination from '../Pagination.vue';

export default {
    name: 'List',
    components: {Confirm, Pagination},

    data() {
        return {
            files: [],
            pagination: {},
        };
    },

    created() {
        this.fetchFiles()
    },

    methods: {
        async fetchFiles(url = null) {
            const {data: {data, ...pagination}} = await window.axios.get(url || '/api/files')
            this.pagination = pagination
            this.files = data
        },

        deleteFile(file) {
            window.axios
                .delete(`/api/files/${file.uuid}`)
                .then(() => this.fetchFiles())
        },
    },
}
</script>
