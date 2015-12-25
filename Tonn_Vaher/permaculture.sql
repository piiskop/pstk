-- -----------------------------------------------------
-- Schema plant
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `plant` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `plant` ;
-- -----------------------------------------------------
-- Table `plant`.`plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plant`.`plant` (
  `idPlant` INT(11) UNSIGNED NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `indoor` TINYINT(1) NULL,
  `edible` TINYINT(1) NULL,
  PRIMARY KEY (`idPlant`),
  INDEX `name` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plant`.`plantingTimes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plant`.`plantingTimes` (
  `idPlantingTime` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plantingTime` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPlantingTime`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plant`.`climates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plant`.`climates` (
  `idClimate` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `climate` VARCHAR(45) NULL,
  PRIMARY KEY (`idClimate`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plant`.`plantClimates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plant`.`plantClimates` (
  `plant_idplant` INT(11) UNSIGNED NOT NULL,
  `climates_idClimate` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`plant_idplant`, `climates_idClimate`),
  INDEX `fk_plant_has_climates_climates1_idx` (`climates_idClimate` ASC),
  INDEX `fk_plant_has_climates_plant1_idx` (`plant_idplant` ASC),
  CONSTRAINT `fk_plant_has_climates_plant1`
    FOREIGN KEY (`plant_idplant`)
    REFERENCES `plant`.`plant` (`idPlant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plant_has_climates_climates1`
    FOREIGN KEY (`climates_idClimate`)
    REFERENCES `plant`.`climates` (`idClimate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plant`.`plantPlantingTimes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plant`.`plantPlantingTimes` (
  `plant_idPlant` INT(11) UNSIGNED NOT NULL,
  `plantingTimes_idPlantingTime` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`plant_idPlant`, `plantingTimes_idPlantingTime`),
  INDEX `fk_plant_has_plantingTimes_plantingTimes1_idx` (`plantingTimes_idPlantingTime` ASC),
  INDEX `fk_plant_has_plantingTimes_plant1_idx` (`plant_idPlant` ASC),
  CONSTRAINT `fk_plant_has_plantingTimes_plant1`
    FOREIGN KEY (`plant_idPlant`)
    REFERENCES `plant`.`plant` (`idPlant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plant_has_plantingTimes_plantingTimes1`
    FOREIGN KEY (`plantingTimes_idPlantingTime`)
    REFERENCES `plant`.`plantingTimes` (`idPlantingTime`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Example data
-- -----------------------------------------------------

INSERT INTO plant VALUES (1,"Lemon", true, true),
	(2,"Carrot", true, true),
	(3,"Currant", false, true),
	(4,"Rose", true, false),
	(5,"Oak",NULL, NULL),
	(6,"currant",false,true);
INSERT INTO plantingTimes VALUES (1,"year-round"),
	(2,"april"),
	(3,"september"),
	(4,"march"),
	(5,"spring");
INSERT INTO plantPlantingTimes VALUES (1,1),
	(2,2),
	(3,3),
	(4,4),
	(5,5),
	(6,3);
INSERT INTO climates VALUES (1,"warm"),(2,"cold");
INSERT INTO plantClimates VALUES (1,1),
	(2,1),
	(3,2),
	(4,2),
	(5,2),
	(6,2);
	