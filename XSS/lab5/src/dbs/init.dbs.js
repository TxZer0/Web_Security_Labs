'use strict'

const mongoose = require('mongoose')
const mongoURI = `mongodb://mongodb:27017/xss`

class Database{
    constructor(){
        this.connect()
    }

    connect(type = 'Mongodb'){
        if(true){
            mongoose.set('debug', true)
        }

        mongoose.connect(mongoURI)
        .then(async() => {
            console.log(`+ Successfully connected to ${type}`)
        })
        .catch((error) => {
            console.log(`+ Error connecting to ${type}:`, error)
        })
    }

    static getInstance(){
        if(!Database.instance){
            Database.instance = new Database()
        }
        return Database.instance
    }
}

const instance = Database.getInstance()
module.exports = instance