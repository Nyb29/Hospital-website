const http = require('http')

const port = 8082
const server = http.createServer(function(req, res) {
})

server.listen(port, function(error) {


    if (error) {

    console.log('ciao',error)
    }
        
            else {
        console.log('ciaone' + port)
            }
        
    })



