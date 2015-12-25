SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`movies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `movie` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`actors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`actors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `actor` VARCHAR(45) NOT NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`movie_actors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`movie_actors` (
  `movies_id` INT NOT NULL,
  `actors_id` INT NOT NULL,
  INDEX `fk_movies_has_actors_actors1_idx` (`actors_id` ASC),
  INDEX `fk_movies_has_actors_movies_idx` (`movies_id` ASC),
  CONSTRAINT `fk_movies_has_actors_movies`
    FOREIGN KEY (`movies_id`)
    REFERENCES `mydb`.`movies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movies_has_actors_actors1`
    FOREIGN KEY (`actors_id`)
    REFERENCES `mydb`.`actors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`movies`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`movies` (`id`, `movie`) VALUES (1, 'Arrow');
INSERT INTO `mydb`.`movies` (`id`, `movie`) VALUES (2, 'The Flash');
INSERT INTO `mydb`.`movies` (`id`, `movie`) VALUES (3, 'Gotham');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`actors`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (1, 'Stephen Amell');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (2, 'Katie Cassidy');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (3, 'DAvid Ramsey');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (4, 'Willa Holland');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (5, 'Paul Blackthorne');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (6, 'Emily Bett Rickards');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (7, 'Colton Haynes');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (8, 'Susanna Thompson');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (9, 'John Barrowman');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (10, 'Grant Gustin');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (11, 'Candice Patton');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (12, 'Danielle Panabaker');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (13, 'Rick Cosnett');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (14, 'Tom Cavanagh');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (15, 'Carlos Valdes');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (16, 'Jess L. Martin');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (17, 'Patrick Sabongui');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (18, 'Jon Wesley Ship');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (19, 'Ben McKenzie');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (20, 'Zabrina Guevara');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (21, 'Robin Lord Taylor');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (22, 'Erin Richards');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (23, 'Carmen Bicondova');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (24, 'Cory Michael Smith');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (25, 'Victoria Cartagena');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (26, 'Andrew Stewart-Jones');
INSERT INTO `mydb`.`actors` (`id`, `actor`) VALUES (27, 'Jada Pinkett Smith');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`movie_actors`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 1);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 2);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 3);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 4);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 5);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 6);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 7);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 8);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (1, 9);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 10);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 11);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 12);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 13);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 14);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 15);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 16);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 17);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (2, 18);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 19);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 20);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 21);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 22);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 23);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 24);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 25);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 26);
INSERT INTO `mydb`.`movie_actors` (`movies_id`, `actors_id`) VALUES (3, 27);

COMMIT;

