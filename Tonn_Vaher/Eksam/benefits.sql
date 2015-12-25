
-- -----------------------------------------------------
-- Schema benefits
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `benefits` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `benefits` ;

-- -----------------------------------------------------
-- Create new user
-- -----------------------------------------------------
-- CREATE USER tnn@localhost;

-- -----------------------------------------------------
-- Privileges on new user
-- -----------------------------------------------------
-- GRANT ALL PRIVILEGES ON benefits.* TO tnn@localhost;

-- -----------------------------------------------------
-- Table `benefits`.`Plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `benefits`.`Plant` (
  `idPlant` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPlant`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `benefits`.`Medical`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `benefits`.`Medical` (
  `idMedical` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `benefit` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idMedical`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `benefits`.`Culinary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `benefits`.`Culinary` (
  `idCulinary` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `benefit` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idCulinary`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `benefits`.`Plant_has_Culinary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `benefits`.`Plant_has_Culinary` (
  `Plant_idPlant` INT UNSIGNED NOT NULL,
  `Culinary_idCulinary` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Plant_idPlant`, `Culinary_idCulinary`),
  INDEX `fk_Plant_has_Culinary_Culinary1_idx` (`Culinary_idCulinary` ASC),
  INDEX `fk_Plant_has_Culinary_Plant1_idx` (`Plant_idPlant` ASC),
  CONSTRAINT `fk_Plant_has_Culinary_Plant1`
    FOREIGN KEY (`Plant_idPlant`)
    REFERENCES `benefits`.`Plant` (`idPlant`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Plant_has_Culinary_Culinary1`
    FOREIGN KEY (`Culinary_idCulinary`)
    REFERENCES `benefits`.`Culinary` (`idCulinary`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `benefits`.`Plant_has_Medical`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `benefits`.`Plant_has_Medical` (
  `Plant_idPlant` INT UNSIGNED NOT NULL,
  `Medical_idMedical` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Plant_idPlant`, `Medical_idMedical`),
  INDEX `fk_Plant_has_Medical_Medical1_idx` (`Medical_idMedical` ASC),
  INDEX `fk_Plant_has_Medical_Plant1_idx` (`Plant_idPlant` ASC),
  CONSTRAINT `fk_Plant_has_Medical_Plant1`
    FOREIGN KEY (`Plant_idPlant`)
    REFERENCES `benefits`.`Plant` (`idPlant`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Plant_has_Medical_Medical1`
    FOREIGN KEY (`Medical_idMedical`)
    REFERENCES `benefits`.`Medical` (`idMedical`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Sample data
-- -----------------------------------------------------

BEGIN;

INSERT INTO `benefits`.`Plant`(name) VALUES ("Lemon Balm"),
  ("Bay Laurel"),
  ("Tarragon"),
  ("Dill");
INSERT INTO `benefits`.`Culinary`(benefit) VALUES ("flavoring"),
  ("soup"),
  ("sauce"),
  ("stew"),
  ("pilaf"),
  ("vinegar"),
  ("pickles");  
INSERT INTO `benefits`.`Medical`(benefit) VALUES ("bloating"),
  ("vomiting"),
  ("headache"),
  ("upset stomach"),
  ("skin stimulant"),
  ("toothache"),
  ("insomnia");

INSERT INTO `benefits`.`Plant_has_Culinary` VALUES (1,1),(1,2),(1,3),(2,1),(2,2),(2,4),(2,5),(3,3),(3,6),(4,7);
INSERT INTO `benefits`.`Plant_has_Medical` VALUES (1,1),(1,2),(1,3),(1,4),(2,4),(3,4),(3,6),(4,4),(4,7);

COMMIT;

-- -----------------------------------------------------
-- SQL querys
-- -----------------------------------------------------


