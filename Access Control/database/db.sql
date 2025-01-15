-- Tạo cơ sở dữ liệu nếu chưa tồn tại và thiết lập mã hóa UTF-8MB4
CREATE DATABASE IF NOT EXISTS blog_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Chọn cơ sở dữ liệu blog_db
USE blog_db;

-- Tạo bảng users với mã hóa utf8mb4
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Thêm dữ liệu mẫu vào bảng users
INSERT INTO users (username, password) VALUES
('admin', 'helloworld'),
('someOne', 'password0'),
('user1', 'password1'),
('user2', 'password2');

-- Tạo bảng posts với khóa ngoại tham chiếu bảng users
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Thêm dữ liệu mẫu vào bảng posts
INSERT INTO posts (title, content, user_id) VALUES
('Tuesday', 'Good morning', 2),
('Monday', 'Hello', 3),
('Thursday', 'Good afternoon', 2),
('Friday', 'I am admin', 1),
('Oneday', 'Hello', 2);

-- Cấp quyền cho người dùng db_user
GRANT SELECT, INSERT, UPDATE ON blog_db.* TO 'db_user'@'%';

-- Áp dụng các thay đổi về quyền
FLUSH PRIVILEGES;
