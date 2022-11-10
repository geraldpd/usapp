<script>
export default {
    props: [
    'user',
    'message'
    ],
}
</script>

<template>
    <li v-if="user.id == message.user_id" class="flex justify-end">
        <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-green-400 text-white rounded shadow">
            <span class="block">{{ message.content }}</span> {{ message.id }}
        </div>
    </li>

    <li v-else class="flex justify-start">
        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
            <span class="block">{{ message.content }}</span> {{ message.id }}
        </div>
    </li>
</template>