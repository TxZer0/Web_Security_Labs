const express = require('express')
const morgan = require('morgan')
const bodyParser = require('body-parser')
const cookieParser = require('cookie-parser')
const app = express()
const route = require('./routes')
const path = require('path')
require('dotenv').config()



app.set('view engine', 'ejs')
app.set('views', path.join(__dirname, 'views'))

app.use(cookieParser())
app.use(morgan('dev'))
app.use(express.json())
app.use(bodyParser.urlencoded({extended: true}))
app.use('/upload', express.static(path.join(__dirname, 'upload')))
///////////////////////////////////////////////////////////////////////////////////////////////////
app.use((req, res, next) => {                                                                    //
    res.setHeader("Content-Security-Policy", "script-src 'self' *.google.com")                  //
    next()                                                                                      //
})                                                                                              //
///////////////////////////////////////////////////////////////////////////////////////////////////
app.use('/', route)



app.use((error, req, res, next) => {
    const statusCode = error.status || 500
    return res.status(statusCode).json({
        code: statusCode,
        message: error.message || 'INTERNAL_SERVER_ERROR'
    })
})


const PORT = 9003
const server = app.listen(PORT, () => {
    console.log(`+ Server is listening on port ${PORT}`)
})

process.on('SIGINT', () => {
    server.close(() => {
        console.log('+ Server closed')
    })
})

module.exports = app