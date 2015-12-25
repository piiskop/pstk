-- Tambet Song on üks mitmekümnest inimesest, kes Haapsalu maantee äärde kodu soetas.


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sentence` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sentence` ;

-- -----------------------------------------------------
-- Table `sentence`.`inimene`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`inimene` (
  `idinimene` INT NOT NULL AUTO_INCREMENT,
  `eesnimi` VARCHAR(45) NULL,
  `perenimi` VARCHAR(45) NULL,
  PRIMARY KEY (`idinimene`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sentence`.`asukoht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`asukoht` (
  `idasukoht` INT NOT NULL AUTO_INCREMENT,
  `asukoht` VARCHAR(45) NULL,
  PRIMARY KEY (`idasukoht`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sentence`.`inimene_has_asukoht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`inimene_has_asukoht` (
  `inimene_idinimene` INT NOT NULL,
  `asukoht_idasukoht` INT NOT NULL,
  `aeg` TIMESTAMP NULL,
  INDEX `fk_inimene_has_asukoht_asukoht1_idx` (`asukoht_idasukoht` ASC),
  INDEX `fk_inimene_has_asukoht_inimene_idx` (`inimene_idinimene` ASC),
  CONSTRAINT `fk_inimene_has_asukoht_inimene`
    FOREIGN KEY (`inimene_idinimene`)
    REFERENCES `sentence`.`inimene` (`idinimene`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inimene_has_asukoht_asukoht1`
    FOREIGN KEY (`asukoht_idasukoht`)
    REFERENCES `sentence`.`asukoht` (`idasukoht`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `sentence`.`inimene`
-- -----------------------------------------------------
START TRANSACTION;
USE `sentence`;
INSERT INTO `sentence`.`inimene` (`idinimene`, `eesnimi`, `perenimi`) VALUES (1, 'Tambet', 'Song');
INSERT INTO `sentence`.`inimene` (`idinimene`, `eesnimi`, `perenimi`) VALUES (2, 'Jüri', 'Pikmaa');
INSERT INTO `sentence`.`inimene` (`idinimene`, `eesnimi`, `perenimi`) VALUES (3, 'Jüri', 'Ild');

INSERT INTO `sentence`.`asukoht` (`idasukoht`, `asukoht`) VALUES (1, 'Haapsalu maantee ääres');
INSERT INTO `sentence`.`asukoht` (`idasukoht`, `asukoht`) VALUES (2, 'Pärnu linnas');
INSERT INTO `sentence`.`asukoht` (`idasukoht`, `asukoht`) VALUES (3, 'Pärnu linnast väljas');

INSERT INTO `sentence`.`inimene_has_asukoht` (`inimene_idinimene`, `asukoht_idasukoht`) VALUES (1, 1);
INSERT INTO `sentence`.`inimene_has_asukoht` (`inimene_idinimene`, `asukoht_idasukoht`) VALUES (1, 2);
INSERT INTO `sentence`.`inimene_has_asukoht` (`inimene_idinimene`, `asukoht_idasukoht`) VALUES (2, 1);
INSERT INTO `sentence`.`inimene_has_asukoht` (`inimene_idinimene`, `asukoht_idasukoht`) VALUES (2, 3);
INSERT INTO `sentence`.`inimene_has_asukoht` (`inimene_idinimene`, `asukoht_idasukoht`) VALUES (2, 2);
INSERT INTO `sentence`.`inimene_has_asukoht` (`inimene_idinimene`, `asukoht_idasukoht`) VALUES (3, 1);

COMMIT;
