/*
Algus uus:
DROP TABLE books_have_authors;
DROP TABLE books;
DROP TABLE genres;
DROP TABLE authors;
DROP TABLE health_conditions;
DROP USER 'eksam'@'localhost';
DROP DATABASE mihkel;
*/
CREATE DATABASE mihkel DEFAULT CHARACTER SET utf8;
USE mihkel;

CREATE TABLE genres(
id INT(11) NOT NULL AUTO_INCREMENT,
genre VARCHAR(20) NOT NULL,
PRIMARY KEY (id),
INDEX `index_genre` (`genre` ASC)
)ENGINE=InnoDB;

CREATE TABLE health_conditions(
id INT(11) NOT NULL AUTO_INCREMENT,
health_condition VARCHAR(20) NOT NULL,
PRIMARY KEY (id),
INDEX `index_health_condition` (`health_condition` ASC)
)ENGINE=InnoDB;

CREATE TABLE authors(
id INT(11) NOT NULL AUTO_INCREMENT,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(40) NOT NULL,
born DATE NULL,
died DATE NULL,
id_health INT(11) NULL,
PRIMARY KEY (id),
INDEX `fk_authors_health_conditions1_idx` (`id_health` ASC),
INDEX `index_dirst_name` (`first_name` ASC),
INDEX `index_last_name` (`last_name` ASC),
INDEX `index_born` (`born` ASC),
INDEX `index_died` (`died` ASC),
FOREIGN KEY(id_health)REFERENCES health_conditions(id)
)ENGINE=InnoDB;

CREATE TABLE books(
id INT(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(60) NOT NULL,
id_genre INT(11) NOT NULL,
description VARCHAR(65400) NULL,
PRIMARY KEY (id),
INDEX `fk_books_genres1_idx` (`id_genre` ASC),
INDEX `index_title` (`title` ASC),
FOREIGN KEY (id_genre) REFERENCES genres(id)
)ENGINE=InnoDB;

CREATE TABLE books_have_authors(
id INT(11) NOT NULL AUTO_INCREMENT,
id_book INT(11) NOT NULL,
id_author INT(11) NOT NULL,
PRIMARY KEY(id),
INDEX `fk_books_have_authors_books1_idx` (`id_book` ASC),
INDEX `fk_books_have_authors_authors1_idx` (`id_author` ASC),
FOREIGN KEY (id_book) REFERENCES books(id),
FOREIGN KEY (id_author) REFERENCES authors(id)
)ENGINE=InnoDB;

INSERT INTO genres (id, genre) VALUES
(null, 'health'),
(null, 'drama'),
(null, 'fantasy'),
(null, 'horror'),
(null, 'romance'),
(null, 'comedy'),
(null, 'poetry'),
(null, 'mythology'),
(null, 'thriller');

INSERT INTO health_conditions (id, health_condition) VALUES
(null, 'great'),
(null, 'average'),
(null, 'bad'),
(null, 'zombie');

INSERT INTO authors (id, first_name, last_name, born, died, id_health) VALUES
(NULL,'elus','piin','1943-11-23','1999-09-19',3),
(NULL,'simon','wood','1964-04-24',NULL,1),
(NULL,'robert','dugoni','1988-07-12',NULL,1),
(NULL,'toni','morrison','1955-11-01',NULL,1),
(NULL,'michael','chabon','1943-08-15',NULL,2),
(NULL,'kurt','vonnegut','1993-02-16',NULL,2),
(NULL,'ray','bradbury','1977-01-30',NULL,2),
(NULL,'doris','goodwin','1985-12-11',NULL,2);

INSERT INTO books (id, title, id_genre, description) VALUES
(NULL,'clean food',1,'collected knowladge from indians'),
(NULL,'the one that got away',9,NULL),
(NULL,'we all fall down',9,'Hayden Duke just landed a coveted contract gig with Marin Design Engineering, largely thanks to his old friend, Shane Fallon. Shane had drifted away in recent years, only to resurface with a dream job for Hayden. The gig seems like a cinch until Hayden discovers that a key designer on the top-secret project has just committed suicide by walking straight into the ocean.'),
(NULL,'my sisters grave',4,NULL),
(NULL,'beloved',5,NULL),
(NULL,'adventures of kavalier',3,NULL),
(NULL,'slaughterhouse-five',7,'Slaughterhouse-Five, an American classic, is one of the world’s great antiwar books. Centering on the infamous firebombing of Dresden, Billy Pilgrim’s odyssey through time reflects the mythic journey of our own fractured lives as we search for meaning in what we fear most.'),
(NULL,'fahrenheit 451',7,NULL),
(NULL,'team of rivals',9,'Acclaimed historian Doris Kearns Goodwin illuminates Lincolns political genius in this highly original work, as the one-term congressman and prairie lawyer rises from obscurity to prevail over three gifted rivals of national reputation to become president.');

INSERT INTO books_have_authors (id, id_book, id_author) VALUES
(NULL,1,1),
(NULL,2,2),
(NULL,3,2),
(NULL,4,3),
(NULL,5,4),
(NULL,6,5),
(NULL,7,6),
(NULL,8,7),
(NULL,9,8),
(NULL,9,7);
#--------------------------#
#----CREATE USER-----------#
#----GRANT PRIVILEGES------#
#--------------------------#
#CREATE USER 'eksam'@'localhost' IDENTIFIED BY 'a';
GRANT ALL PRIVILEGES ON mihkel.* TO 'eksam'@'localhost' WITH GRANT OPTION;
#--------------#
#----UPDATE----#
#--------------#
UPDATE authors SET last_name="abielus" WHERE last_name="piin" LIMIT 1;
#----------------#
#----DISTINCT----#
#----------------#
SELECT DISTINCT id_book FROM books_have_authors;
SELECT authors.first_name, authors.last_name, health_conditions.health_condition FROM authors JOIN health_conditions on authors.id_health=health_conditions.id;
SELECT authors.first_name, authors.last_name, health_conditions.health_condition FROM authors LEFT JOIN health_conditions on authors.id_health=health_conditions.id;
#----------------#
#----BROUP BY----#
#----HAVING------#
#----ORDER BY----#
#----------------#
SELECT id_health, count(*) FROM authors GROUP BY (id_health);
SELECT id_health, count(*) FROM authors GROUP BY (id_health) HAVING count(*) < 4;
SELECT id_health, count(*) FROM authors GROUP BY (id_health) HAVING count(*) < 4 ORDER BY COUNT(*) ASC;
#---------------------------#
#----UNION------------------#
#----COMPARISON OPERATOR----#
#---------------------------#
SELECT health_conditions.health_condition FROM health_conditions WHERE id <= 1 
UNION
SELECT health_conditions.health_condition FROM health_conditions WHERE id >= 4;
#-------------------#
#----IS NOT NULL----#
#-------------------#
SELECT authors.first_name, authors.last_name FROM authors WHERE died IS NOT NULL;
#---------------#
#----BETWEEN----#
#---------------#
SELECT books.title FROM books WHERE id BETWEEN 3 AND 6;
#--------------#
#----LIKE------#
#--------------#
SELECT authors.first_name, authors.last_name, authors.born FROM authors WHERE born LIKE '__8_-%';
#--------------#
#----LIMIT-----#
#--------------#
SELECT genres.genre FROM genres LIMIT 2, 3;
#--------------#
#--Statistics--#
#--------------#
SELECT MIN(authors.born) AS 'Oldest' FROM authors;
SELECT MAX(authors.born) AS 'Youngest' FROM authors;
SELECT AVG(authors.id_health) AS 'AVG healt' FROM authors;
#--------------#
#----DELETE----#
#--------------#
DELETE FROM books_have_authors WHERE id = 10;
#----------------#
#----ROLLBACK----#
#----------------#
START TRANSACTION;
DELETE FROM books_have_authors;
ROLLBACK;
