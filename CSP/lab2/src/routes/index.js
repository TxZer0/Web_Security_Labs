const express = require('express')
const crypto = require('node:crypto')
const { route } = require('../app')
const multer = require('multer')
const path = require('path')

const router = express.Router()

router.get('/', function (req, res, next) {
    res.cookie('lab2', crypto.randomBytes(64).toString('hex'), { 
        maxAge: 24 * 60 * 60 * 1000, 
        httpOnly: false,            
        secure: false             
    })
    
    res.render('index')
})


router.get("/product", async(req, res) => {
    const key = req.query.search
    res.send(`Search key: <h2>${key}</h2>`)
})

module.exports = router
