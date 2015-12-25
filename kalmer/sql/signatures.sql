SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `signatures` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `signatures` ;

-- -----------------------------------------------------
-- Table `signatures`.`Bank`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `signatures`.`Bank` (
  `idBank` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameOfBank` TEXT NOT NULL,
  `swift` CHAR(8) NOT NULL,
  PRIMARY KEY (`idBank`),
  UNIQUE INDEX `swift_UNIQUE` (`swift` ASC))
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `signatures`.`Teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `signatures`.`Teacher` (
  `idTeacher` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` TEXT NULL,
  `lastName` TEXT NULL,
  `title` TEXT NULL,
  `address` TEXT NULL,
  PRIMARY KEY (`idTeacher`))
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `signatures`.`BankAccount`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `signatures`.`BankAccount` (
  `idBankAccount` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Teacher_idTeacher` INT(11) UNSIGNED NOT NULL,
  `Bank_idBank` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idBankAccount`),
  INDEX `BankAccount_FKIndex1` (`Bank_idBank` ASC),
  INDEX `BankAccount_FKIndex2` (`Teacher_idTeacher` ASC),
  CONSTRAINT `fk_e9f042bc-a8f1-11e4-be68-e02a82a1ad19`
    FOREIGN KEY (`Bank_idBank`)
    REFERENCES `signatures`.`Bank` (`idBank`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_e9f05590-a8f1-11e4-be68-e02a82a1ad19`
    FOREIGN KEY (`Teacher_idTeacher`)
    REFERENCES `signatures`.`Teacher` (`idTeacher`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `signatures`.`PhoneNumber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `signatures`.`PhoneNumber` (
  `idPhoneNumber` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Teacher_idTeacher` INT(11) UNSIGNED NOT NULL,
  `typeOfPhoneNumber` TEXT NOT NULL,
  `phoneNumber` TEXT NOT NULL,
  PRIMARY KEY (`idPhoneNumber`),
  INDEX `PhoneNumber_FKIndex1` (`Teacher_idTeacher` ASC),
  CONSTRAINT `fk_e9f065a8-a8f1-11e4-be68-e02a82a1ad19`
    FOREIGN KEY (`Teacher_idTeacher`)
    REFERENCES `signatures`.`Teacher` (`idTeacher`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;


-- -----------------------------------------------------
-- Table `signatures`.`BankAccountOrder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `signatures`.`BankAccountOrder` (
  `idBankAccountOrder` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `BankAccount_idBankAccount` INT(11) UNSIGNED NOT NULL,
  `orderOfBankAccount` INT(11) UNSIGNED NULL,
  PRIMARY KEY (`idBankAccountOrder`),
  INDEX `BankAccountOrder_FKIndex1` (`BankAccount_idBankAccount` ASC),
  CONSTRAINT `fk_e9f07552-a8f1-11e4-be68-e02a82a1ad19`
    FOREIGN KEY (`BankAccount_idBankAccount`)
    REFERENCES `signatures`.`BankAccount` (`idBankAccount`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
