<script>
export default {
    props: [
    'rooms',
    'currentRoom'
    ],
    data() {
        return {
            selected: '',
            searchKey: ''
        }
    },
    methods: {
        changeRoom(room) {
            this.$emit('changeRoom', room)
        },
        searchRoom()
        {
            this.$emit('searchRoom', this.searchKey)
        }
    },
    created() {
        this.selected = this.currentRoom
    }
}
</script>

<template>
    <div class="basis-2/12">

        <div class="flex">
            <div class="flex-auto">
                <input class="input input-ghost focus:outline-none focus:ring-0" type="text" v-model="searchKey" @keyup="searchRoom">
            </div>
            <div class="flex-initial pl-3">
                <button class="btn btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </button>
            </div>
        </div>

        <div class=" overflow-scroll h-96">
            <ul class="menu bg-base-100 ">
                <li v-for="room in rooms" :key="room.id">
                    <a @click="changeRoom(room)">{{ room.name }}</a>
                </li>
            </ul>
        </div>
    </div>
</template>