let https = require('https')
let fs = require('fs')
let options = {
  key: fs.readFileSync('/Applications/MAMP/conf/apache/server.key'),
  cert: fs.readFileSync('/Applications/MAMP/conf/apache/server.crt')
}
let app = https.createServer(options)
let io = require('socket.io').listen(app)
let redis = require('redis')

app.listen(3064)

io.on('connection', function (socket) {
    console.log('Starting')

    let redisClient = redis.createClient()

    redisClient.subscribe('chat')

    redisClient.on('message', function (channel, message) {
        socket.emit(channel, message)
    })

    socket.on('disconnect', function () {
        redisClient.quit()
    })
})