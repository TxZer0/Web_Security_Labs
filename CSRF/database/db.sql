-- Tạo database và chọn database
CREATE DATABASE csrf_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE csrf_db;

-- Tạo bảng users
CREATE TABLE IF NOT EXISTS users (
  id INT(10) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

-- Thêm dữ liệu vào users
INSERT INTO users (id, username, password) VALUES (1, 'laithanh', MD5('uiauiauia'));
INSERT INTO users (id, username, password) VALUES (2, 'someone', MD5('12345678'));
INSERT INTO users (id, username, password) VALUES (3, 'admin', MD5('administrator123@'));


GRANT SELECT, INSERT, UPDATE ON csrf_db.* TO 'db_user'@'%';

-- Áp dụng các thay đổi về quyền
FLUSH PRIVILEGES;
