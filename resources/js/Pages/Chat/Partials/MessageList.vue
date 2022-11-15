<script>
import MessageBubble from '@/Pages/Chat/Partials/MessageBubble.vue';

export default {
    components: {
        MessageBubble
    },
    props: [
        'user',
        'currentRoom',
        'messages'
    ],
}
</script>

<template>
    <div class="grid-rows-2">
        <ul v-if="currentRoom" class="space-y-1 overflow-auto h-96" id="messageList">
            <MessageBubble v-for="message in messages" :key="message.id" :message="message" :user="user"/>
        </ul>

        <p v-else class="text-center align-text-bottom">
            Start Messaging
        </p>
    </div>


</template>