<template>
    <div>
        <div class="flex items-center" @click.prevent="confirming = true">
            <slot name="trigger"></slot>
        </div>

        <div class="fixed inset-0 z-40 overflow-auto flex items-start justify-center" v-show="confirming">
            <div class="absolute inset-0 h-full opacity-75 bg-black"/>

            <div class="relative bg-white rounded-lg w-[32rem] mx-auto mt-12">
                <div class="p-4 shadow text-lg text-gray-900 font-bold leading-none">
                    Confirm action
                </div>

                <div class="px-4 pt-4 pb-8">
                    <slot/>
                </div>

                <div class="p-4 bg-gray-100 font-medium leading-none gap-x-4 flex justify-end">
                    <button @click.prevent="confirming = false"
                            class="inline-flex items-start justify-start px-4 py-2 border border-gray-700 rounded hover:bg-gray-700 text-gray-700 hover:text-white disabled:text-gray-300 disabled:cursor-not-allowed">
                        Cancel
                    </button>

                    <button @click.prevent="$emit('confirmed');confirming = false;"
                            class="bg-gray-700 text-gray-100 mt-0 inline-flex items-start justify-start px-4 py-2 rounded">
                        Proceed
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Confirm',
    props: {
        confirming: {type: Boolean, required: false},
    },
}
</script>
