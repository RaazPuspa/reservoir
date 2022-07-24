<template>
    <div class="mt-4 w-full flex items-center justify-between">
        <div class="text-gray-500">
            Showing {{ pagination.from }} to {{ pagination.to }} of {{ pagination.total }} results
        </div>

        <ul class="flex items-center border border-gray-100 rounded-md divide-x divide-gray-100">
            <li v-if="requiresFirst" class="px-4 py-2 text-gray-700">
                <router-link
                    :to="{ name: route, 'query': { page: 1 }}"
                    @click.prevent="$emit('paginate', `${pagination.path}?page=1`)">
                    First
                </router-link>
            </li>

            <li class="px-4 py-2 text-gray-700">
                <router-link
                    v-if="pagination.current_page > 1"
                    :to="{ name: route, 'query': { page: pagination.current_page - 1 }}"
                    @click.prevent="$emit('paginate', `${pagination.path}?page=${pagination.current_page - 1}`)">
                    Previous
                </router-link>

                <a v-else href="javascript:" class="text-gray-400 cursor-not-allowed">Previous</a>
            </li>

            <li
                v-for="page in pages"
                class="px-4 py-2 text-gray-700"
                :class="{'bg-gray-700 text-gray-100 font-semibold rounded': page === pagination.current_page}">
                <router-link
                    :to="{ name: route, 'query': { page: page }}"
                    @click.prevent="$emit('paginate', `${pagination.path}?page=${page}`)">
                    {{ page }}
                </router-link>
            </li>

            <li class="px-4 py-2 text-gray-700">
                <router-link
                    v-if="pagination.current_page < pagination.last_page"
                    :to="{ name: route, 'query': { page: pagination.current_page + 1 }}"
                    @click.prevent="$emit('paginate', `${pagination.path}?page=${pagination.current_page + 1}`)">
                    Next
                </router-link>

                <a v-else href="javascript:" class="text-gray-400 cursor-not-allowed">Next</a>
            </li>

            <li v-if="requiresLast" class="px-4 py-2 text-gray-700">
                <router-link
                    :to="{ name: route, 'query': { page: pagination.last_page }}"
                    @click.prevent="$emit('paginate', `${pagination.path}?page=${pagination.last_page}`)">
                    Last
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        route: {type: String, required: true},
        pagination: {type: Object, required: true},
        offset: {type: Number, required: false, default: 3},
    },

    computed: {
        pages() {
            return window._.range(
                Math.max(1, this.pagination.current_page - this.offset),
                1 + Math.min(this.pagination.current_page + this.offset, this.pagination.last_page),
            );
        },

        requiresFirst() {
            return !window._.includes(this.pages, 1);
        },

        requiresLast() {
            return !window._.includes(this.pages, this.pagination.last_page);
        },
    },
}
</script>
