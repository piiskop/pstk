--1. Andmemudeli loomine
--Fail nimega fail.mwb

--2. sql fili sisseimemine andmebaasi
mysql -u andrus -p </home/peeter/Dropbox/STK/Margistus_keeled/pstk/databases/Andrus_Kull/kodutoo/20150306-07_Andrus.sql
--andmebaaside kuvamine
/*
show databases
+--------------------+
| Database           |
+--------------------+
| mydb               |
+--------------------+
16 rows in set (0.00 sec)*/

--3. andmebaasi kustutamine "eny_database_name"
drop database eny_databse_name;

--4. Kasutaja loomine
create user 'databases'@'localhost' identified by 'parool1';
--Query OK, 0 rows affected (0.12 sec)
grant all privileges on databases.*to 'databases'@'localhost';

--5. kasutaja 'databases' kasutaja õiguste kustutamine 'localhost' serveris
revoke all privileges, grant option from 'databases'@'localhost' WITH GRANT OPTION;

--6. loon andmemudelil loodud tabelid
CREATE TABLE IF NOT EXISTS `mydb`.`actors` (`id` INT NOT NULL AUTO_INCREMENT, 
	`actor` VARCHAR(45) NOT NULL, UNIQUE INDEX `id_UNIQUE` (`id` ASC), PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `mydb`.`movies` (`id` INT NOT NULL AUTO_INCREMENT, 
	`movie` VARCHAR(45) NOT NULL, PRIMARY KEY (`id`), UNIQUE INDEX `id_UNIQUE` (`id` ASC))

CREATE TABLE IF NOT EXISTS `mydb`.`movie_actors` (`movies_id` INT NOT NULL, `actors_id` INT NOT NULL,
	INDEX `fk_movies_has_actors_actors1_idx` (`actors_id` ASC),
	INDEX `fk_movies_has_actors_movies_idx` (`movies_id` ASC),
	CONSTRAINT `fk_movies_has_actors_movies` FOREIGN KEY (`movies_id`) 
	REFERENCES `mydb`.`movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT `fk_movies_has_actors_actors1` FOREIGN KEY (`actors_id`)
	REFERENCES `mydb`.`actors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION)

--kuvan tabelid
show tables;
/*
+----------------+
| Tables_in_mydb |
+----------------+
| actors         |
| movie_actors   |
| movies         |
+----------------+*/

select*from actors;
/*
+----+----------------------+
| id | actor                |
+----+----------------------+
|  1 | Stephen Amell        |
|  2 | Katie Cassidy        |
|  3 | DAvid Ramsey         |
|  4 | Willa Holland        |
|  5 | Paul Blackthorne     |
|  6 | Emily Bett Rickards  |
|  7 | Colton Haynes        |
|  8 | Susanna Thompson     |
|  9 | John Barrowman       |
| 10 | Grant Gustin         |
| 11 | Candice Patton       |
| 12 | Danielle Panabaker   |
| 13 | Rick Cosnett         |
| 14 | Tom Cavanagh         |
| 15 | Carlos Valdes        |
| 16 | Jess L. Martin       |
| 17 | Patrick Sabongui     |
| 18 | Jon Wesley Ship      |
| 19 | Ben McKenzie         |
| 20 | Zabrina Guevara      |
| 21 | Robin Lord Taylor    |
| 22 | Erin Richards        |
| 23 | Carmen Bicondova     |
| 24 | Cory Michael Smith   |
| 25 | Victoria Cartagena   |
| 26 | Andrew Stewart-Jones |
| 27 | Jada Pinkett Smith   |
+----+----------------------+*/

select*from movies;
/*
+----+-----------+
| id | movie     |
+----+-----------+
|  1 | Arrow     |
|  2 | The Flash |
|  3 | Gotham    |
+----+-----------+*/

--7. lisan välja honna sisestamiseks kaks kohta peale koma.
desc movies;
/*
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| id    | int(11)     | NO   | PRI | NULL    | auto_increment |
| movie | varchar(45) | NO   |     | NULL    |                |
+-------+-------------+------+-----+---------+----------------+*/

alter table test.movies add column price float(2);

desc movies;
/*
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| id    | int(11)     | NO   | PRI | NULL    | auto_increment |
| movie | varchar(45) | NO   |     | NULL    |                |
| price | float       | YES  |     | NULL    |                |
+-------+-------------+------+-----+---------+----------------+*/

select * from movies;
/*
+----+-----------+-------+
| id | movie     | price |
+----+-----------+-------+
|  1 | Arrow     |  NULL |
|  2 | The Flash |  NULL |
|  3 | Gotham    |  NULL |
+----+-----------+-------+*/

--8. kustutan tabeli movies_has_actor
DROP TABLE  movies_has_actors;

--9. sisestan andmed tabelitesse
INSERT INTO `mydb`.`movies` (`id`, `movie`) VALUES (1, 'Arrow');
INSERT INTO `mydb`.`movies` (`id`, `movie`) VALUES (2, 'The Flash');
INSERT INTO `mydb`.`movies` (`id`, `movie`) VALUES (3, 'Gotham');

INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES 
	(1, 'Stephen Amell'),
	(2, 'Katie Cassidy'),
	(3, 'DAvid Ramsey'),
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
	(16, 'Jess L. Martin'),
	(17, 'Patrick Sabongui'),
	(18, 'Jon Wesley Ship'),
	(19, 'Ben McKenzie'),
	(20, 'Zabrina Guevara'),
	(21, 'Robin Lord Taylor'),
	(22, 'Erin Richards'),
	(23, 'Carmen Bicondova'),
	(24, 'Cory Michael Smith'),
	(25, 'Victoria Cartagena'),
	(26, 'Andrew Stewart-Jones'),
	(27, 'Jada Pinkett Smith');

INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 1);
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
