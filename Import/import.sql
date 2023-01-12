DROP DATABASE IF EXISTS s168308_project;
CREATE DATABASE s168308_project;

USE s168308_project;

CREATE TABLE users (
userID int AUTO_INCREMENT PRIMARY KEY,
username varchar(255),
wachtwoord varchar(255),
isAdmin bit,
emailAddress varchar(255)
);

CREATE TABLE tickets (
ticketType varchar(255),
ticketName varchar(255),
Location varchar(255),
price int,
duration int,
description longtext
);

CREATE TABLE orders (
orderID int AUTO_INCREMENT PRIMARY KEY,
orderedBy varchar(255)
);

CREATE TABLE orderItems (
orderItemID int AUTO_INCREMENT PRIMARY KEY,
orderID int,
FOREIGN KEY (orderID) REFERENCES orders(orderID)
);

INSERT INTO users (username, wachtwoord, isAdmin, emailAddress)
VALUES ("Henk", "HenkIsDeBeste", 0, "henk@gmail.com");

INSERT INTO users (username, wachtwoord, isAdmin, emailAddress)
VALUES ("Hugo", "HugoDeAdmin", 1, "hugo.admin@gmail.com");
