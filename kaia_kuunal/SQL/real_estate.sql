SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `real_estate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `real_estate` ;

-- -----------------------------------------------------
-- Table `real_estate`.`agents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`agents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `real_estate`.`counties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`counties` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `real_estate`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(45) NOT NULL,
  `county_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cities_counties1_idx` (`county_id` ASC),
  CONSTRAINT `fk_cities_counties1`
    FOREIGN KEY (`county_id`)
    REFERENCES `real_estate`.`counties` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `real_estate`.`objects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`objects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `street` VARCHAR(50) NOT NULL,
  `citiy_id` INT NOT NULL,
  `total_area_m2` DECIMAL(10,2) NULL,
  `room_area_m2` DECIMAL(4,2) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  `description` TEXT NULL,
  `bedrooms` TINYINT NULL,
  `bathrooms` TINYINT NULL,
  `stories` TINYINT NULL,
  `story` TINYINT NULL,
  `has_yard` TINYINT(1) NOT NULL,
  `has_balcony` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_objects_cities_idx` (`citiy_id` ASC),
  CONSTRAINT `fk_objects_cities`
    FOREIGN KEY (`citiy_id`)
    REFERENCES `real_estate`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `real_estate`.`agents_objects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`agents_objects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `agent_id` INT NOT NULL,
  `object_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agents_has_objects_objects1_idx` (`object_id` ASC),
  INDEX `fk_agents_has_objects_agents1_idx` (`agent_id` ASC),
  CONSTRAINT `fk_agents_has_objects_agents1`
    FOREIGN KEY (`agent_id`)
    REFERENCES `real_estate`.`agents` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agents_has_objects_objects1`
    FOREIGN KEY (`object_id`)
    REFERENCES `real_estate`.`objects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `real_estate`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `real_estate`.`objects_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `real_estate`.`objects_categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `object_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_objects_has_object_categories_object_categories1_idx` (`category_id` ASC),
  INDEX `fk_objects_has_object_categories_objects1_idx` (`object_id` ASC),
  CONSTRAINT `fk_objects_has_object_categories_objects1`
    FOREIGN KEY (`object_id`)
    REFERENCES `real_estate`.`objects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_objects_has_object_categories_object_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `real_estate`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
