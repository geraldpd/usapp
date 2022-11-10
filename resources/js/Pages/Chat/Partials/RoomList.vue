<script>
export default {
    props: [
        'rooms',
        'currentRoom'
    ],
    data() {
        return {
            selected: ''
        }
    },
    methods: {
        changeRoom(room) {
            this.$emit('changeRoom', room)
        }
    },
    created() {
        this.selected = this.currentRoom
    }
}
</script>

<template>
    <div class="basis-2/12 overflow-auto">
        <ul class="menu bg-base-100 ">
            <li v-for="room in rooms" :key="room.id">
                <a @click="changeRoom(room)">{{ room.name }}</a>
            </li>
        </ul>
    </div>
</template>