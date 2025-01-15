const express = require('express')
const crypto = require('node:crypto')
const { route } = require('../app')
const {upload} = require('../utils')

const router = express.Router()

router.get('/', function (req, res, next) {
    res.cookie('user', crypto.randomBytes(64).toString('hex'), { 
        maxAge: 24 * 60 * 60 * 1000, 
        httpOnly: false,            
        secure: false             
    })
    
    res.render('index')
})

router.get('/upload', (req, res) => {
    res.render('upload')
})

router.post('/upload', upload.single('file'), (req, res) => {
    try {
        console.log('File uploaded:', req.file) 
        res.send(`
            <p>Upload successful! <a href="/upload/${req.file.filename}">${req.file.filename}</a></p>
        `)
    } catch (err) {
        console.error('Error:', err.message) 
        res.status(500).json({ error: err.message })
    }
})



router.get('/search', (req, res) => {
    res.render('search')
})

router.get("/product", async(req, res) => {
    const key = req.query.search
    res.send(`Search key: <h2>${key}</h2>`)
})

module.exports = router
