<script>
import MessageBubble from '@/Pages/Chat/Partials/MessageBubble.vue';

export default {
    components: {
        MessageBubble
    },
    props: [
    'user',
    'messages'
    ],
}
</script>

<template>
    <div class="grid-rows-2">
        <ul class="space-y-1 overflow-auto h-96" id="messageList">
            <MessageBubble v-for="message in messages" :key="message.id" :message="message" :user="user"/>
        </ul>
    </div>
</template>