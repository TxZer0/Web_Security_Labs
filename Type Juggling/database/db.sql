-- Tạo database và chọn database
CREATE DATABASE type_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE type_db;

-- Tạo bảng users_v1
CREATE TABLE IF NOT EXISTS users_v1 (
  id INT(10) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

-- Thêm dữ liệu vào users_v1
INSERT INTO users_v1 (id, username, password) VALUES (1, 'laithanh', 'uiauiauia');
INSERT INTO users_v1 (id, username, password) VALUES (2, 'someone', '12345678');
INSERT INTO users_v1 (id, username, password) VALUES (3, 'admin', 'administrator123@');

-- Cấp quyền cho người dùng db_user
GRANT SELECT, INSERT, UPDATE ON type_db.* TO 'db_user'@'%';

-- Áp dụng các thay đổi về quyền
FLUSH PRIVILEGES;