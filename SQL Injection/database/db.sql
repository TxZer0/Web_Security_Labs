-- Tạo database và chọn database
CREATE DATABASE sql_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sql_db;

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

-- Tạo bảng users_v2
CREATE TABLE IF NOT EXISTS users_v2 (
  id INT(10) NOT NULL AUTO_INCREMENT,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

-- Thêm dữ liệu vào users_v2 với MD5
INSERT INTO users_v2 (id, username, password) VALUES (1, 'laithanh', MD5('uiauiauia'));
INSERT INTO users_v2 (id, username, password) VALUES (2, 'someone', MD5('12345678'));
INSERT INTO users_v2 (id, username, password) VALUES (3, 'admin', MD5('administrator123@'));

-- Tạo bảng posts
CREATE TABLE IF NOT EXISTS posts (
  id INT(10) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- Thêm dữ liệu vào posts
INSERT INTO posts (id, title, content) VALUES (1, 'Title 1', 'Hello World');
INSERT INTO posts (id, title, content) VALUES (2, 'Title 2', 'I love PHP');
INSERT INTO posts (id, title, content) VALUES (3, 'Title 3', 'Something is wrong');

-- Tạo bảng flag
CREATE TABLE IF NOT EXISTS flag (
  id INT(10) NOT NULL AUTO_INCREMENT,
  content TEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- Thêm dữ liệu vào flag
INSERT INTO flag (id, content) VALUES (1, 'Flag: {LAB_SQL_008}');

-- Cấp quyền cho người dùng db_user
GRANT SELECT, INSERT, UPDATE ON sql_db.* TO 'db_user'@'%';

-- Áp dụng các thay đổi về quyền
FLUSH PRIVILEGES;
