SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `xml_kaia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `xml_kaia` ;

-- -----------------------------------------------------
-- Table `xml_kaia`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xml_kaia`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `xml_kaia`.`organizations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xml_kaia`.`organizations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `link` VARCHAR(45) NULL,
  `street` VARCHAR(45) NOT NULL,
  `city_id` INT NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_organizations_cities1_idx` (`city_id` ASC),
  CONSTRAINT `fk_organizations_cities1`
    FOREIGN KEY (`city_id`)
    REFERENCES `xml_kaia`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `xml_kaia`.`courts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `xml_kaia`.`courts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `organization_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `capacity` SMALLINT NULL,
  `has_equipment` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_courts_organizations1_idx` (`organization_id` ASC),
  CONSTRAINT `fk_courts_organizations1`
    FOREIGN KEY (`organization_id`)
    REFERENCES `xml_kaia`.`organizations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
