const multer = require('multer')
const path = require('path')

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'upload/') 
    },
    filename: (req, file, cb) => {
        const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1E9)
        cb(null, file.fieldname + '-' + uniqueSuffix + path.extname(file.originalname)) 
    }
})

const upload = multer({
    storage: storage,
    limits: { fileSize: 10 * 1024 * 1024 }, 
    fileFilter: (req, file, cb) => {
    console.log('MIME type:', file.mimetype)
    console.log('Extension:', path.extname(file.originalname).toLowerCase())
    const fileTypes = /txt/
    const extname = fileTypes.test(path.extname(file.originalname).toLowerCase())
        if (extname ) {
        cb(null, true)
        } else {
        cb(new Error('Invalid file! Only text files are allowed.'))
        }
    }
})

module.exports = {
    upload
}