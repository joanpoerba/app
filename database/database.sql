-- Active: 1650355398407@@127.0.0.1@3306@toko
SHOW DATABASES;
CREATE DATABASE app;
USE app;
CREATE TABLE user(
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL UNIQUE,
);
SHOW TABLES;
ALTER TABLE user
ADD COLUMN description TEXT NULL,
ADD COLUMN photoProfile VARCHAR(255) NULL;
DESC user;
DROP TABLE otp;
INSERT INTO user(username, password) VALUE('joan', '121206');
SELECT * FROM user;
UPDATE otp SET usersOtp = 'joan', otp = '665566';
INSERT INTO otp(usersOtp, otp) VALUE('joan', '000000');
CREATE TABLE otp(
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usersOtp VARCHAR(30) NOT NULL UNIQUE,
  otp VARCHAR(6) NOT NULL,
  CONSTRAINT fk_usersOtp FOREIGN KEY (usersOtp) REFERENCES user(username) ON UPDATE CASCADE ON DELETE CASCADE
);
TRUNCATE TABLE user;
ALTER TABLE otp DROP CONSTRAINT fk_usersOtp;
ALTER TABLE otp ADD CONSTRAINT fk_usersOtp FOREIGN KEY (usersOtp) REFERENCES user(username) ON UPDATE CASCADE ON DELETE CASCADE;
DROP TABLE otp;
ALTER TABLE otp MODIFY otp VARCHAR(6) NULL DEFAULT "000000";