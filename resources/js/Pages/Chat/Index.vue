<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import RoomList from '@/Pages/Chat/Partials/RoomList.vue';
import MessageList from '@/Pages/Chat/Partials/MessageList.vue';
import MessageForm from '@/Pages/Chat/Partials/MessageForm.vue';
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { nextTick } from 'vue'

export default {
    components: {
        AppLayout,
        RoomList,
        MessageForm,
        MessageList,
    },
    data() {
        return {
            rooms: [],
            currentRoom: [],
            messages: [],
        }
    },
    methods: {
        getRooms() {
            axios.get(route('rooms.index'))
            .then(response => {
                this.rooms = response.data.data
                this.setRoom(this.rooms[1])
            })
            .catch(error => {
                console.log(error)
            })
        },
        getMessages() {
            axios.get(route('messages.index', this.currentRoom.id))
            .then(response => {
                this.messages = response.data.data
                this.scrollDown()
            })
            .catch(error => {
                console.log(error)
            })
        },
        setRoom(room) {
            this.currentRoom = room
            this.getMessages()
        },
        async scrollDown() {
            await nextTick()
            let messagesList = this.$el.querySelector('#messageList')
            messagesList.scrollTop = messagesList.scrollHeight
        }
    },
    mounted() {
        this.getRooms()
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user)
        return { user }
    },
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-scroll sm:rounded-lg">

                    <div class="flex flex-row">

                        <RoomList :rooms="rooms" @changeRoom="setRoom" />

                        <div class="basis-10/12 p-3">

                            <div class="grid">

                                <MessageList :messages="messages" :user="user" />

                                <MessageForm :room="currentRoom" @messageSent="getMessages" />

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
