-- MySQL Script generated by MySQL Workbench
-- 04/18/15 14:38:43
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`klass`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`klass` (
  `idklass` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Klass` VARCHAR(45) NULL,
  PRIMARY KEY (`idklass`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`õpilane`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`õpilane` (
  `idõpilane` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Eesnimi` VARCHAR(45) NOT NULL,
  `Perekonnanimi` VARCHAR(45) NOT NULL,
  `klass_idklass` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idõpilane`, `klass_idklass`),
  INDEX `fk_õpilane_klass1_idx` (`klass_idklass` ASC),
  CONSTRAINT `fk_õpilane_klass1`
    FOREIGN KEY (`klass_idklass`)
    REFERENCES `mydb`.`klass` (`idklass`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`õpetaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`õpetaja` (
  `idõpetaja` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nimi` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idõpetaja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`valikaine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`valikaine` (
  `idvalikaine` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `valikaine_nimi` VARCHAR(45) NOT NULL,
  `õpetaja_idõpetaja` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idvalikaine`, `õpetaja_idõpetaja`),
  INDEX `fk_valikaine_õpetaja1_idx` (`õpetaja_idõpetaja` ASC),
  CONSTRAINT `fk_valikaine_õpetaja1`
    FOREIGN KEY (`õpetaja_idõpetaja`)
    REFERENCES `mydb`.`õpetaja` (`idõpetaja`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`õpilane_has_valikaine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`õpilane_has_valikaine` (
  `õpilane_idõpilane` INT UNSIGNED NOT NULL,
  `valikaine_idvalikaine` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`õpilane_idõpilane`, `valikaine_idvalikaine`),
  INDEX `fk_õpilane_has_valikaine_valikaine1_idx` (`valikaine_idvalikaine` ASC),
  INDEX `fk_õpilane_has_valikaine_õpilane1_idx` (`õpilane_idõpilane` ASC),
  CONSTRAINT `fk_õpilane_has_valikaine_õpilane1`
    FOREIGN KEY (`õpilane_idõpilane`)
    REFERENCES `mydb`.`õpilane` (`idõpilane`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_õpilane_has_valikaine_valikaine1`
    FOREIGN KEY (`valikaine_idvalikaine`)
    REFERENCES `mydb`.`valikaine` (`idvalikaine`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
