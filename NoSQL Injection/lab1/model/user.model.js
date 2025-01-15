'use strict'

const { Schema, model } = require("mongoose")

const DOCUMENT_NAME = 'User'
const COLLECTION_NAME = 'Users'

const userSchema = new Schema({
    username: {type: String, required: true},
    email: {type: String, required: true},
    password: {type: String, required: true},
    location: {type: String, default: ''},
    phoneNumber: {type: String, default: ''}
},{
    collection: COLLECTION_NAME,
    timestamps: true
})

module.exports = model(DOCUMENT_NAME, userSchema)