export default {
    props: {
        url: {type: String, required: true},
        method: {type: String, required: true},
        payload: {type: Object, required: false, default: {}},
        withFile: {type: Boolean, required: false, default: false},
    },

    data() {
        return {
            errors: {},
            request: {},
            processing: false,
        }
    },

    created() {
        this.request = this.payload;
    },

    watch: {
        payload() {
            this.request = this.payload;
        },
    },

    methods: {
        getConfig() {
            return {
                headers: {
                    'Content-Type': this.withFile ? 'multipart/form-data' : 'application/json',
                },
            };
        },

        onError(payload) {
            this.processing = false

            if (payload && payload.data) {
                for (const attribute in payload.data.errors) {
                    this.errors[attribute] = payload.data.errors[attribute].shift()
                }
            }

            this.$emit('error', payload)
        },

        onSuccess(data) {
            this.processing = false
            this.$emit('success', data)
        },

        prepareBody() {
            if (this.withFile) {
                const formData = new FormData();

                for (const attribute in this.request) {
                    formData.append(attribute, this.request[attribute]);
                }

                return formData;
            }

            switch (this.method) {
                case 'put':
                case 'post':
                case 'patch':
                    return this.request

                default:
                    return {
                        params: this.request
                    }
            }
        },

        submit() {
            if (this.processing) {
                return
            }

            this.errors = {}
            this.processing = true

            const method = this.withFile ? 'post' : this.method
            window.axios[method](this.url, this.prepareBody(), this.getConfig())
                .then(response => this.onSuccess(response.data))
                .catch(error => this.onError(error.response))
        },
    },
}
