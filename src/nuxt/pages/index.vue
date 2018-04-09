<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        チャットルーム一覧
                    </div>
                    <div class="list-group list-group-flush">
                        <nuxt-link :to="room.name" class="list-group-item" v-for="room in rooms" :key="room.id">{{ room.name }}</nuxt-link>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-header">
                    チャットルーム作成
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" v-show="errors.length">
                        <ul>
                            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                        </ul>
                    </div>
                    <div class="form-inline">
                        <input type="text" class="form-control" v-model="room_name">
                        <button class="btn btn-primary" @click="createRoom">作成</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            room_name: '',
            errors: []
        }
    },
    async asyncData ({app}) {
        const url = process.browser ? 'http://local.pascal.com' : 'http://nginx'
        const res = await app.$axios.$get(`${url}/api/room`)
        return {rooms: res['data']}
    },
    methods: {
        createRoom: function (event) {
            if (this.room_name != "") {
                this.$axios.post('http://local.pascal.com/api/room', {
                    name: this.room_name
                }).then(res => {
                    this.errors = []
                    this.$router.replace({ path: this.room_name })
                }).catch(error => {
                    this.errors = error.response.data['error']['detail']['name']
                })
            }
        }
    }
}
</script>
