<script>
export default {
    props: [
    'room'
    ],
    data() {
        return {
            message: ''
        }
    },
    methods: {
        sendMessage() {
            if(! this.message) return

            axios.post(route('messages.store', this.room.id), {
                content: this.message
            })
            .then(response => {
                if(response.status == 201) {
                    this.message = ''
                    this.$emit('messageSent')
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<template>
    <div class="flex space-x-2 mt-6">
        <input
        class="w-5/6 input input-ghost focus:outline-none focus:ring-0"
        type="text"
        v-model="message"
        placeholder="Type here"
        @keyup.enter="sendMessage()"
        />

        <button
        class="w-1/6 btn btn-ghost btn-block"
        @click="sendMessage()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
        </svg>

    </button>
</div>
</template>