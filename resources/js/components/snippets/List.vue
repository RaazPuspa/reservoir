<template>
    <div class="px-2 py-1 w-full">
        <div class="pb-4 border-b-2 border-gray-200 flex items-center justify-between">
            <p class="focus:outline-none text-2xl font-bold leading-normal text-gray-800">
                HTML Snippets
            </p>

            <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-0 inline-flex items-start justify-start px-4 py-2 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                <p class="text-sm font-medium leading-none text-white flex gap-x-2 items-center">
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
                    Add Snippet
                </p>
            </button>
        </div>

        <div class="mt-4 h-64 bg-gray-100 font-mono font-semibold text-gray-700 flex items-center justify-center">
            Now you can add HTML snippets along with description. Click on Add Snippet button.
        </div>

        <div class="bg-white py-4">
            <div class="focus:outline-none w-4/12 p-4 shadow rounded border border-gray-200">
                <div class="flex items-center border-b border-gray-200 pb-4">
                    <div class="flex items-center justify-between w-full">
                        <div class="w-full text-lg font-medium leading-5 text-gray-800">
                            Snippet title
                        </div>

                        <div class="flex items-center justify-end gap-x-3">
                            <svg width="28"
                                 height="28"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.25"
                                 stroke="currentColor"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="cursor-pointer focus:outline-none text-gray-500 hover:text-gray-800 focus:text-gray-800">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"/>
                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"/>
                            </svg>

                            <svg width="28"
                                 height="28"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.25"
                                 stroke="currentColor"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="cursor-pointer focus:outline-none text-red-500 hover:text-red-800 focus:text-red-800">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="4" y1="7" x2="20" y2="7"/>
                                <line x1="10" y1="11" x2="10" y2="17"/>
                                <line x1="14" y1="11" x2="14" y2="17"/>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <p class="focus:outline-none text-sm leading-5 py-2 text-gray-600">
                    A group of people interested in dogecoin, the currency and a bit of side for the meme and dof
                    that we all know and love. These cases are perfectly simple and easy to distinguish.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'List'
}
</script>
