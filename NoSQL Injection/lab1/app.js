const express = require("express");
const bodyParser = require("body-parser");
const userModel = require("./model/user.model");
const app = express();
const bcrypt = require('bcrypt')

app.use(express.json())
app.use(bodyParser.urlencoded({ extended: true }));


require('./dbs/init.db')

app.get("/", (req, res) => {
    res.send(`
        <div>
        <form method="POST" action="/login">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <button type="submit">Login</button>
        </form>
        </div>
    `);
});

app.post('/login', async(req, res) => {    
    return await handleLogin(req, res)
});

const handleLogin = async(req, res) => {
  try {
      const {username, password} = req.body
      const findUser = await findByUsername(username, password); 
      if (!findUser) {
          return res.status(401).send("Sai username hoặc mật khẩu");
      }
      if(findUser.username === 'admin123'){
          return res.status(200).send("<h2>Flag: {LAB-NoSQL-001}</h2>");
      }
      return res.status(200).json(`Welcome ${findUser.username}`);
  } catch (error) {
      console.error("Login error:", error.message);
      return res.status(500).send("Đã xảy ra lỗi trong quá trình xử lý");
  }
}
  
const findByUsername = async(username, password) => {
  return await userModel.findOne({
    username, password
  }).lean()
}

app.use((error, req, res, next) => {
  const statusCode = error.status || 500
  return res.status(statusCode).json({
      code: statusCode,
      message: error.message || "INTERNAL_SERVER_ERROR"
  })
})

app.listen(3000, () => console.log("Lab 1 running on http://localhost:8041"));
