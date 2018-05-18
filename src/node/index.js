let io         = require('socket.io')(3001)
let subscriber = require('redis').createClient(6379, 'redis')

subscriber.subscribe(['chat'])
subscriber.on('message', function(channel, data) {
    const comment = JSON.parse(data)
    io.emit(comment.room_name, data)
})
