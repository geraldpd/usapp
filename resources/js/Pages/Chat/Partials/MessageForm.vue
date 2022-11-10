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
            Send
        </button>
    </div>
</template>