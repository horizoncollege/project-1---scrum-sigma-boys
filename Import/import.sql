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
id int PRIMARY KEY AUTO_INCREMENT,
ticketType varchar(255),
ticketName varchar(255),
Location varchar(255),
price int,
duration int,
description longtext,
datum date,
poster varchar(255)
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

INSERT INTO tickets (ticketType, ticketName, price, Location, duration, description, datum, poster)
VALUES 
('FILM', 'Minions: the rise of Gru', 15, 'VUE ALKMAAR', '88 minuten', 'Deze zomer gaat ’s werelds grootste animatiefranchise terug naar het begin. We zien hoe de grootste superschurk ter wereld zijn iconische Minions ontmoet en met hen de meest verschrikkelijke crew uit de filmgeschiedenis vormt. Samen nemen ze het op tegen een team van de meest onverschrokken criminelen in Minions: The Rise of Gru. Lang voordat hij een superschurk wordt, is Gru (de voor een Oscar® genomineerde Steve Carell) een 12-jarig jongetje in een buitenwijk in 1970 die vanuit zijn kelder plannen smeedt om de wereld te veroveren. Maar dat gaat nog niet zo goed. Als de Minions, onder wie Kevin, Stuart, Bob en Otto (een nieuwe Minion met een beugel die het heel graag goed wil doen), op Gru’s pad komen bundelen de onwaarschijnlijke vrienden hun krachten. Samen bouwen ze hun eerste schurkenhol, ontwerpen ze hun eerste wapens en bereiden ze hun eerste missies voor. Als de beruchte groep superschurken de Vicious 6 hun leider lozen - de legendarische vechtsporter Wild Knuckles - gaat Gru, hun grootste fan, solliciteren om lid te worden. De Vicious 6 is helaas niet onder de indruk van de kleine wannabe. Maar ze worden woest als Gru ze te slim af is en dan wordt hij ineens de aartsvijand van het criminele topteam. Als Gru op de vlucht slaat, proberen de Minions kungfu te leren om hem te redden. Gru zelf komt tot de ontdekking dat zelfs slechteriken weleens hulp nodig hebben van vrienden', '2023-06-23', 'MinionsPoster.jpg'),
('EVENT', 'COMIC CON', 50, 'UTRECHT', '2 DAGEN', 'Op 24 & 25 juni 2023 organiseren wij de eerste Heroes Dutch Comic Con Summer Edition! Altijd al wereldberoemde acteurs en Comic Artists willen ontmoeten of ben je fan van series, films, esports of cosplay? Heroes Dutch Comic Con heeft het allemaal, én meer! Bereid je voor op een geweldig weekend vol vermaak, bijzondere ontmoetingen, deel jouw passies met andere of maak nieuwe vrienden!','2023-08-19', 'comicConPoster.jpg'),
('MUSICAL',  'Soldaat van Oranje',  37,'De TheaterHangaar, Katwijk', '154 minuten', 'Verdoening van je geld, je kan dit maar beter gewoon niet kopen','2023-04-03','soldaatPoster.jpg'),
('CONCERT', 'Snoop dogg', 69, 'Ziggo Dome, Amsterdam', '5 uur', 'Een Concert gegeven door de one and only Snoop Dogg','2023-05-27','snoopDoggPoster.jpg');

CREATE TABLE contact (
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(20) NOT NULL,
    email VARCHAR(64) NOT NULL,
    bericht VARCHAR(10000) NOT NULL
);

