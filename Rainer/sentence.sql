SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sentence` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sentence` ;


-- -----------------------------------------------------
-- Table `sentence`.`Inimene`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`Inimene` (
  `idInimene` INT NOT NULL,
  `Eesnimi` VARCHAR(45) NOT NULL,
  `Perenimi` VARCHAR(45) NOT NULL,
  `dateOfBirth` DATETIME NULL,
  `Sünnikoht` VARCHAR(45) NULL,
  PRIMARY KEY (`idInimene`))
ENGINE = InnoDB;

Insert into sentence.`Inimene` SET idInimene = 1, Eesnimi = 'Rainer', Perenimi= 'Vakra', `Sünniaeg` = '1981-03-10' , Sünnikoht = 'Tallinn';
-- -----------------------------------------------------
-- Table `sentence`.`Roll`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`Roll` (
  `idRoll` INT NOT NULL,
  `nimetus` VARCHAR(45) NOT NULL,
  `asukoht` VARCHAR(45) NOT NULL,
  `Praegune` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idRoll`))
ENGINE = InnoDB;

Insert into Roll SET idRoll = 1, nimetus = 'linnaosa vanem', asukoht = 'Nõmme', Praegune = False;
Insert into Roll SET idRoll = 2, nimetus = 'riigikogu liige', asukoht = 'Tallinn', Praegune = True;
Insert into Roll SET idRoll = 3, nimetus = 'poliitik', asukoht = 'Tallinn', Praegune = True;

-- --------------------------o---------------------------
-- Table `sentence`.`Roll_has_Inimene`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`Roll_has_Inimene` (
  `Roll_idRoll` INT NOT NULL,
  `Inimene_idInimene` INT NOT NULL,
  PRIMARY KEY (`Roll_idRoll`, `Inimene_idInimene`),
  INDEX `fk_Roll_has_Inimene_Inimene1_idx` (`Inimene_idInimene` ASC),
  INDEX `fk_Roll_has_Inimene_Roll_idx` (`Roll_idRoll` ASC),
  CONSTRAINT `fk_Roll_has_Inimene_Roll`
    FOREIGN KEY (`Roll_idRoll`)
    REFERENCES `sentence`.`Roll` (`idRoll`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Roll_has_Inimene_Inimene1`
    FOREIGN KEY (`Inimene_idInimene`)
    REFERENCES `sentence`.`Inimene` (`idInimene`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
Insert into Roll_has_Inimene set Roll_idRoll=1, Inimene_idInimene = 1;
Insert into Roll_has_Inimene set Roll_idRoll=2, Inimene_idInimene = 1;
Insert into Roll_has_Inimene set Roll_idRollx=3, Inimene_idInimene = 1;
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
