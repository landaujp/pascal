<template>
    <div class="container">
        <div class="row">
            <div class="side-bar col-md-3">
                <side-bar :room_name="room_name"></side-bar>
            </div>
            <div class="main col-md-9">
                <div v-if="user_name">
                    <div class="main-comments card" ref="comments">
                        <div class="main-comments-info">
                            <h2>{{room_name}}</h2>
                        </div>
                        <div class="main-comments-list list-group list-group-flush">
                            <div class="list-group-item" v-for="comment in comments" :key="comment.id">
                                <span class="font-weight-bold">{{ comment.user_name }}</span><span class="ml-4">{{ comment.created_at | moment }}</span><br>
                                {{ comment.comment }}
                            </div>
                        </div>
                    </div>
                    <div class="main-form">
                        <div class="form-inline">
                            <input type="text" class="form-control" v-model="new_comment" size="119">
                            <button class="btn btn-primary" @click="send">送信</button>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="form-inline">
                        <input type="text" class="form-control" v-model="form_user_name">
                        <button class="btn btn-primary" @click="sayName(form_user_name)">名前を入力</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.form-control{
    width:100%;
}
</style>

<script>

import SideBar from '~/components/SideBar.vue'
import io      from 'socket.io-client'
import moment  from 'moment'

export default {
    components: {
        SideBar
    },
    data () {
        return {
            new_comment: '',
            user_name: process.browser ? localStorage.getItem('user_name') : '',
            form_user_name: '',
        }
    },
    beforeMount() {
        const socket = io.connect()
        const e = this
        socket.on("chat1", function(message) {
            e.comments.push(JSON.parse(message))
            this.scrollToBottom()
        })
    },
    mounted() {
        this.scrollToBottom()
    },
    async asyncData({app, params}){
        const url = process.browser ? 'http://local.pascal.com' : 'http://nginx'
        const res = await app.$axios.$get(`${url}/api/comment/${params.room}`)
        return {room_name: params.room, comments: res['data']};
    },
    methods: {
        sayName: function (user_name) {
            localStorage.setItem('user_name', user_name)
            this.user_name = user_name
        },
        send: function (event) {
            if (this.new_comment != "") {
                this.$axios.post('http://local.pascal.com/api/comment', {
                    room_name: this.room_name,
                    user_name: localStorage.getItem('user_name'),
                    comment: this.new_comment
                }).then(res => {
                    this.new_comment = ""
                }).catch(e => {
                    console.error(e)
                })
            }
        },
        scrollToBottom() {
            this.$nextTick(() => {
                if (this.user_name) {
                    this.$refs.comments.scrollTop = this.$refs.comments.scrollHeight
                }
            })
        }
    },
    filters: {
        moment: function (date) {
            return moment(date).format('M/D HH:mm');
        }
    }
}
</script>
