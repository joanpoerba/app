-- Active: 1650355398407@@127.0.0.1@3306@toko
SHOW DATABASES;
CREATE DATABASE app;
USE app;
CREATE TABLE user(
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL UNIQUE,
);
ALTER TABLE user
ADD COLUMN description TEXT NULL,
ADD COLUMN photoProfile VARCHAR(255) NULL;
DESC user;
INSERT INTO user(username, password) VALUE('joan', '121206');
SELECT * FROM user;
TRUNCATE TABLE user;