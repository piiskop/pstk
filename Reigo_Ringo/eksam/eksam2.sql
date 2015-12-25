

CREATE DATABASE cinema CHARACTER SET utf8 COLLATE utf8_general_ci;

USE cinema;

CREATE TABLE movie (
	idmovie INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(60) NOT NULL,
	INDEX movie_name (name)
)ENGINE = InnoDB;

CREATE TABLE actor (
	idactor INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(60) NOT NULL,
	INDEX actor_name (name)
)ENGINE = InnoDB;

CREATE TABLE movie_has_actor (
	movie_idmovie INT UNSIGNED NOT NULL,
	actor_idactor INT UNSIGNED NOT NULL,
	CONSTRAINT fk_movie_has_actor_movie_idx
		FOREIGN KEY (movie_idmovie)
		REFERENCES movie (idmovie)
		ON DELETE RESTRICT
		ON UPDATE CASCADE,
	CONSTRAINT fk_movie_has_actor_actor_idx
		FOREIGN KEY (actor_idactor)
		REFERENCES actor (idactor)
		ON DELETE RESTRICT
		ON UPDATE CASCADE	
)ENGINE = InnoDB;

INSERT INTO movie (idmovie, name) VALUES (1, 'Arrow'), (2, 'The Flash'), (3, 'Gotham');

INSERT INTO actor (idactor, name) VALUES 
(1, 'Stephen Amell'), 
(2, 'Katie Cassidy'), 
(3, 'David Ramsey'),
(4, 'Willa Holland'), 
(5, 'Paul Blackthorne'), 
(6, 'Emily Bett Rickards'),
(7, 'Colton Haynes'), 
(8, 'Susanna Thompson'), 
(9, 'John Barrowman'),
(10, 'Grant Gustin'), 
(11, 'Candice Patton'), 
(12, 'Danielle Panabaker'),
(13, 'Rick Cosnett'), 
(14, 'Tom Cavanagh'), 
(15, 'Carlos Valdes'),
(16, 'Jesse L. Martin'), 
(17, 'Patrick Sabongui'), 
(18, 'John Wesley Shipp'),
(19, 'Ben McKenzie'), 
(20, 'Zabryna Guevara'), 
(21, 'Robin Lord Taylor'),
(22, 'Erin Richards'), 
(23, 'Camren Bicondova'), 
(24, 'Cory Michael Smith'),
(25, 'Victoria Cartagena'), 
(26, 'Andrew Stewart-Jones'), 
(27, 'Jada Pinkett Smith');

INSERT INTO movie_has_actor (movie_idmovie, actor_idactor) VALUES 
(1, 1), 
(1, 2), 
(1, 3),
(1, 4), 
(1, 5), 
(1, 6),
(1, 7), 
(1, 8), 
(1, 9),
(2, 10), 
(2, 11), 
(2, 12),
(2, 13), 
(2, 14), 
(2, 15),
(2, 16), 
(2, 17), 
(2, 18),
(3, 19), 
(3, 20), 
(3, 21),
(3, 22), 
(3, 23), 
(3, 24),
(3, 25), 
(3, 26), 
(3, 27);

/*
CREATE DATABASE candy_all_around;

DROP DATABASE candy_all_around;
*/
GRANT ALL PRIVILEGES ON cinema.* TO 'databases'@'localhost';

REVOKE ALL PRIVILEGES ON cinema.* FROM 'databases'@'localhost';

DROP TABLE movie_has_actor;

/* deleteing all actors from table actor*/
DELETE FROM actor;
