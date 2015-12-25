SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `andmebaas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `andmebaas` ;

-- -----------------------------------------------------
-- Table `mydb`.`exhibition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andmebaas`.`exhibition` (
  `id_exhibition` INT NOT NULL,
  `title` VARCHAR(20) NOT NULL,
  `location` VARCHAR(20) NOT NULL,
  `begins` DATE NOT NULL,
  `ends` DATE NOT NULL,
  `description` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id_exhibition`),
  INDEX `exhibition_title` (`title` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andmebaas`.`authors` (
  `id_table1` INT NOT NULL,
  `first_name` VARCHAR(20) NOT NULL,
  `last_name` VARCHAR(20) NOT NULL,
  `education` VARCHAR(100) NULL,
  PRIMARY KEY (`id_table1`),
  UNIQUE INDEX `author_name` (`first_name` ASC, `last_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`curator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andmebaas`.`curator` (
  `id_curator` INT NOT NULL,
  `first_name` VARCHAR(20) NOT NULL,
  `last_name` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_curator`),
  UNIQUE INDEX `curator_name` (`first_name` ASC, `last_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`exhibition_has_authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andmebaas`.`exhibition_has_authors` (
  `exhibition_id_exhibition` INT NOT NULL,
  `authors_id_table1` INT NOT NULL,
  INDEX `fk_exhibition_has_authors_authors1_idx` (`authors_id_table1` ASC),
  INDEX `fk_exhibition_has_authors_exhibition_idx` (`exhibition_id_exhibition` ASC),
  CONSTRAINT `fk_exhibition_has_authors_exhibition`
    FOREIGN KEY (`exhibition_id_exhibition`)
    REFERENCES `andmebaas`.`exhibition` (`id_exhibition`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_exhibition_has_authors_authors1`
    FOREIGN KEY (`authors_id_table1`)
    REFERENCES `andmebaas`.`authors` (`id_table1`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`curator_has_exhibition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andmebaas`.`curator_has_exhibition` (
  `curator_id_curator` INT NOT NULL,
  `exhibition_id_exhibition` INT NOT NULL,
  INDEX `fk_curator_has_exhibition_exhibition1_idx` (`exhibition_id_exhibition` ASC),
  INDEX `fk_curator_has_exhibition_curator1_idx` (`curator_id_curator` ASC),
  CONSTRAINT `fk_curator_has_exhibition_curator1`
    FOREIGN KEY (`curator_id_curator`)
    REFERENCES `andmebaas`.`curator` (`id_curator`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_curator_has_exhibition_exhibition1`
    FOREIGN KEY (`exhibition_id_exhibition`)
    REFERENCES `andmebaas`.`exhibition` (`id_exhibition`)
    ON DELETE NO ACTION
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- INSERTING DATA`
-- -----------------------------------------------------

INSERT INTO exhibition (id_exhibition, title, location, begins, ends, description)
  VALUES (1, 'TÜ KUNSTIDE OSAKONNA GRAAFIKA ERIKURSUSE ÜLIÕPILASTE TÖÖDE NÄITUS',
  'kohvikus Gaudeamus', 
  '2014-10-06', 
  '2014-10-31', 
  'Tartu Ülikooli kunstide osakonna graafika erikursus esitleb üliõpilaste töid. Põhiliselt graafika erikursuse raames on segatud kokku erinevaid tehnikaid, kasutatud isetehtud paberit, trükitud erilisele materjalile, leiutatud materjalitrükki. Kursus lubab eksperimentaalsemat lähenemist nii materjalides, trükitehnilises kui kompositsioonilises lahenduses.'
  );

INSERT INTO authors (id_table1, first_name, last_name, education)
  VALUES 
  (1, 'Agnes','Liping', 'magistriõpe'),
  (2, 'Elo-Mai','Mikkelsaar', 'magistriõpe'),
  (3, 'Maarja','Nõmmik', 'magistriõpe'),
  (4, 'Egle','Remm', 'magistriõpe'),
  (5, 'Helle','Lõhmus', 'bakalaureuseõpe'),
  (6, 'Reigo','Ringo', 'bakalaureuseõpe lõpetanud');

INSERT INTO curator (id_curator, first_name, last_name)
  VALUES 
  (1, 'Kristel','Kink');

INSERT INTO exhibition_has_authors (exhibition_id_exhibition, authors_id_table1)
  VALUES 
  (1, 1),
  (1, 2), 
  (1, 3), 
  (1, 4),
  (1, 5),
  (1, 6);

INSERT INTO curator_has_exhibition (curator_id_curator, exhibition_id_exhibition)
  VALUES 
  (1, 1);
