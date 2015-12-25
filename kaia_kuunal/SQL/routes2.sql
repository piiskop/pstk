SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `routes`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routes`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `routes`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routes`.`countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `routes`.`cities_countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routes`.`cities_countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `city_id` INT NOT NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cities_has_countries_countries1_idx` (`country_id` ASC),
  INDEX `fk_cities_has_countries_cities_idx` (`city_id` ASC),
  CONSTRAINT `fk_cities_has_countries_cities`
    FOREIGN KEY (`city_id`)
    REFERENCES `routes`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cities_has_countries_countries1`
    FOREIGN KEY (`country_id`)
    REFERENCES `routes`.`countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `routes`.`locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routes`.`locations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(45) NOT NULL,
  `city_country_id` INT NOT NULL,
  `lat` DECIMAL(6,4) NOT NULL,
  `lng` DECIMAL(6,4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_locations_cities_countries1_idx` (`city_country_id` ASC),
  CONSTRAINT `fk_locations_cities_countries1`
    FOREIGN KEY (`city_country_id`)
    REFERENCES `routes`.`cities_countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `routes`.`routes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routes`.`routes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_id` INT NOT NULL,
  `destination_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_routes_locations1_idx` (`start_id` ASC),
  INDEX `fk_routes_locations2_idx` (`destination_id` ASC),
  CONSTRAINT `fk_routes_locations1`
    FOREIGN KEY (`start_id`)
    REFERENCES `routes`.`locations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_routes_locations2`
    FOREIGN KEY (`destination_id`)
    REFERENCES `routes`.`locations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `routes`.`directions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routes`.`directions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `route_id` INT NOT NULL,
  `action` ENUM('drive','turn') NOT NULL,
  `direction` ENUM('left','right','east','west','north','south') NOT NULL,
  `distance` DECIMAL(8,2) NOT NULL,
  `duration` DECIMAL(8,2) NOT NULL,
  `road` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_directions_routes1_idx` (`route_id` ASC),
  CONSTRAINT `fk_directions_routes1`
    FOREIGN KEY (`route_id`)
    REFERENCES `routes`.`routes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
