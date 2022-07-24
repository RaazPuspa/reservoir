<template>
    <form @submit.prevent="submit" class="grid grid-cols-1 gap-6">
        <div class="flex justify-start items-start">
            <div class="mt-2 w-1/4 font-medium text-gray-500">Title</div>

            <div class="flex-grow">
                <input required
                       type="text"
                       :disabled="processing"
                       v-model="request.title"
                       placeholder="File title"
                       class="px-4 py-2 w-full border border-gray-200 leading-normal rounded text-gray-800 text-lg disabled:cursor-not-allowed"/>

                <em v-if="errors.title" v-text="errors.title" class="text-red-500 mt-1 text-sm w-full"/>
            </div>
        </div>

        <div class="flex justify-start items-start">
            <div class="mt-2 w-1/4 font-medium text-gray-500">Attachment</div>

            <div class="flex-grow">
                <input required
                       type="file"
                       placeholder="File"
                       :disabled="processing"
                       accept="application/pdf"
                       @input="request.attachment = $event.target.files[0]"
                       class="w-full border border-gray-200 leading-normal rounded text-gray-800 text-lg file:cursor-pointer disabled:file:cursor-not-allowed file:mr-4 file:text-md file:p-2 file:border-0 file:bg-indigo-50 file:text-gray-700 hover:file:bg-gray-100"/>

                <em v-if="errors.attachment" v-text="errors.attachment" class="text-red-500 mt-1 text-sm w-full"/>
            </div>
        </div>

        <div class="flex justify-start items-start">
            <div class="mt-2 w-1/4 font-medium text-gray-500">&nbsp;</div>

            <div class=" gap-x-6 flex">
                <button type="submit"
                        :disabled="processing"
                        class="bg-gray-700 text-gray-100 mt-0 inline-flex items-start justify-start px-4 py-2 rounded disabled:bg-gray-500 disabled:cursor-not-allowed">
                    <p class="font-medium leading-none flex gap-x-2 items-center">
                        <svg width="24"
                             height="24"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.25"
                             stroke="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"/>
                            <circle cx="12" cy="14" r="2"/>
                            <polyline points="14 4 14 8 8 8 8 4"/>
                        </svg>
                        Submit
                    </p>
                </button>

                <router-link
                    :disabled="processing"
                    :to="{ name: 'files' }"
                    class="inline-flex items-start justify-start px-4 py-2 border border-gray-700 rounded hover:bg-gray-700 text-gray-700 hover:text-white disabled:text-gray-300 disabled:cursor-not-allowed">
                    <p class="font-medium leading-none flex gap-x-2 items-center">
                        <svg width="24"
                             height="24"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke-width="1.25"
                             stroke="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                        Cancel
                    </p>
                </router-link>
            </div>
        </div>
    </form>
</template>

<script>
import form from '../../mixins/form';

export default {
    name: 'Form',
    mixins: [form],
}
</script>
