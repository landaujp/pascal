<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Socket.io</h1>
<script src="/socket.io/socket.io.js"></script>

<script type="text/javascript">
// $(function () {
//     let socket = io.connect('http://local.pascal.com/socket.io')
//     socket.on("chat1", function(message) {
//         console.log(message)
//     })
// })

    // var socket = io('http://local.pascal.com/socket.io');
    // socket.on('connect', function () {
    //     socket.on('chat1', function(msg){
    //         console.log(msg)
    //     });
    // });

    var socket = io.connect();
        socket.on('chat1', function (data) {
            console.log(data);
        });
</script>
</body>
</html>