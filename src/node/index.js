let io         = require('socket.io')(3001)
let subscriber = require('redis').createClient(6379, 'redis')

subscriber.subscribe(['test_1'])
subscriber.on('message', function(channel, message) {
    io.emit('chat1', message)
})
