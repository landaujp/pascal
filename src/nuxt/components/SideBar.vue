<template>
    <div class="card">
        <div class="card-header">
            チャットルーム一覧
        </div>
        <div class="list-group list-group-flush">
            <nuxt-link :to="room" class="list-group-item" v-for="(room, index) in rooms" :key="index">{{ room }}</nuxt-link>
            <button class="btn btn-primary" v-show="showSaveRoom" @click="saveRoom(room_name)">登録</button>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'room_name'
    ],
    data () {
        return {
            rooms: process.browser && localStorage.getItem('rooms') ? JSON.parse(localStorage.getItem('rooms')) : [],
        }
    },
    computed: {
        showSaveRoom: function () {
            return this.room_name && this.rooms.indexOf(this.room_name) == -1;
        }
    },
    methods: {
        saveRoom: function () {
            this.rooms.push(this.room_name)
            localStorage.setItem('rooms', JSON.stringify([...new Set(this.rooms)]))
        }
    }
}
</script>
