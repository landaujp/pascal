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
                <div class="form-inline">
                    <input type="text" class="form-control" v-model="new_comment" size="90">
                    <button class="btn btn-primary" @click="send">送信</button>
                </div>
                <div class="card">
                    <div class="list-group list-group-flush">
                        <span class="list-group-item" v-for="comment in comments" :key="comment.id">{{ comment.comment }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return { new_comment: '' }
    },
    async asyncData({app, params}){
        const url  = process.browser ? 'http://local.pascal.com' : 'http://nginx'
        const res1 = await app.$axios.$get(`${url}/api/room`)
        const res2 = await app.$axios.$get(`${url}/api/comment/${params.room}`)
        return {rooms: res1['data'], comments: res2['data']};
    },
    methods: {
        send: function (event) {
            if (this.new_comment != "") {
                this.comments.push({comment: this.new_comment})
                this.$axios.post('http://local.pascal.com/api/comment', {
                    comment: this.new_comment
                }).then(res => {
                    this.new_comment = ""
                }).catch(e => {
                    console.error(e)
                })
            }
        }
    }
}
</script>
