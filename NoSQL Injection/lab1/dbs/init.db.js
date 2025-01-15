'use strict'

const mongoose = require('mongoose')
const mongoURI = `mongodb://mongodb:27017/lab1`
const userModel = require('../model/user.model')
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
            const collectionExists = await mongoose.connection.db.listCollections({ name: 'users' }).hasNext();
            if (collectionExists) {
                await userModel.collection.drop();
            }


            await userModel.insertMany([
                { username: 'admin123', email: 'admin1@gmail.com', password: "root123@" },
                { username: 'guest112', email: 'user123@gmail.com', password: "guest1" },
                { username: 'johnDoe1', email: 'johndoe1@gmail.com', password: 'johnPassword123' }
            ])

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