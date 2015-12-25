SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `sports`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sports`.`countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sports`.`teams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sports`.`teams` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_teams_countries_idx` (`country_id` ASC),
  CONSTRAINT `fk_teams_countries`
    FOREIGN KEY (`country_id`)
    REFERENCES `sports`.`countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sports`.`matches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sports`.`matches` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_dt` DATETIME NOT NULL,
  `end_dt` DATETIME NOT NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_matches_countries1_idx` (`country_id` ASC),
  CONSTRAINT `fk_matches_countries1`
    FOREIGN KEY (`country_id`)
    REFERENCES `sports`.`countries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sports`.`matches_teams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sports`.`matches_teams` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `team_id` INT NOT NULL,
  `match_id` INT NOT NULL,
  `score` INT NOT NULL,
  `is_winner` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_teams_has_matches_matches1_idx` (`match_id` ASC),
  INDEX `fk_teams_has_matches_teams1_idx` (`team_id` ASC),
  CONSTRAINT `fk_teams_has_matches_teams1`
    FOREIGN KEY (`team_id`)
    REFERENCES `sports`.`teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_teams_has_matches_matches1`
    FOREIGN KEY (`match_id`)
    REFERENCES `sports`.`matches` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
