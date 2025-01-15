const express = require('express')
const router = express.Router()
const Report = require('../models/report.model')
const validator = require('validator')
function isLoggedIn(req, res, next) {
    if (req.session.user) {
      return next();
    }
    res.redirect('/login');
}

router.get('/', (req, res) => {
    res.redirect('/login');
} ) 


router.get('/login', (req, res) => {
    res.render('login', { error: null });
})
  
router.post('/login', (req, res) => {
    const { username, password } = req.body;
    if (username === 'admin' && password === 'admin') {
      req.session.user = username;
      res.redirect('/admin');
    } else {
      res.render('login', { error: 'Something went wrong' });
    }
})
  
  
router.get('/report', (req, res) => {
    res.render('report');
})
  
router.post('/report', async (req, res) => {
    const { email, message } = req.body;

    if (!validator.isEmail(email)) {
        return res.status(400).send("Something went wrong");
    }

    try {
        const newReport = new Report({ email, message });
        await newReport.save();
        res.send("Report has been submitted!");
    } catch (error) {
        console.error("Error while saving the report:", error);
        res.status(500).send("Something went wrong");
    }
});
  

router.get('/admin', isLoggedIn, async (req, res) => {
    const reports = await Report.find();
    res.render('admin', { reports });
})
  
  
router.get('/logout', (req, res) => {
    req.session.destroy();
    res.redirect('/login');
})

module.exports = router
