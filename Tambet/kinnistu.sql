-- MySQL Script generated by MySQL Workbench
-- 02/14/15 12:58:24
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema kinnistu
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kinnistu
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kinnistu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `kinnistu` ;

-- -----------------------------------------------------
-- Table `kinnistu`.`Omanik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Omanik` (
  `idOmanik` INT NOT NULL AUTO_INCREMENT,
  `Eesnimi` VARCHAR(45) NULL,
  `Perenimi` VARCHAR(45) NULL,
  `Telefon` VARCHAR(45) NULL,
  `Kontakt` VARCHAR(45) NULL,
  `Parool` VARCHAR(8) NULL,
  PRIMARY KEY (`idOmanik`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Kinnistu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Kinnistu` (
  `idKinnistu` INT NOT NULL AUTO_INCREMENT COMMENT '	',
  `Kataster` CHAR(14) NULL,
  `Nimi` VARCHAR(45) NULL,
  `Asukoht` VARCHAR(45) NULL,
  PRIMARY KEY (`idKinnistu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Langetaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Langetaja` (
  `idLangetaja` INT NOT NULL,
  `Langetaja_eesnim` VARCHAR(45) NULL,
  `Langetaja_perenimi` VARCHAR(45) NULL,
  PRIMARY KEY (`idLangetaja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Liik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Liik` (
  `idLiik` INT NOT NULL AUTO_INCREMENT,
  `Liik` VARCHAR(45) NULL,
  PRIMARY KEY (`idLiik`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Liik_has_Kinnistu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Liik_has_Kinnistu` (
  `Kinnistu_idKinnistu` INT NOT NULL,
  `Liik_idLiik` INT NOT NULL,
  `Prognoos_kogus` SMALLINT NULL,
  `idLiik_has_Kinnistu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idLiik_has_Kinnistu`),
  INDEX `fk_Liik_has_Kinnistu_Kinnistu1_idx` (`Kinnistu_idKinnistu` ASC),
  INDEX `fk_Liik_has_Kinnistu_Liik1_idx` (`Liik_idLiik` ASC),
  CONSTRAINT `fk_Liik_has_Kinnistu_Liik1`
    FOREIGN KEY (`Liik_idLiik`)
    REFERENCES `kinnistu`.`Liik` (`idLiik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Liik_has_Kinnistu_Kinnistu1`
    FOREIGN KEY (`Kinnistu_idKinnistu`)
    REFERENCES `kinnistu`.`Kinnistu` (`idKinnistu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Liik_has_Kinnistu_has_Langetaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Liik_has_Kinnistu_has_Langetaja` (
  `idLiik_has_Kinnistu_has_Langetaja` INT NOT NULL AUTO_INCREMENT,
  `Langetus_kogus` SMALLINT NULL,
  `Langetaja_idLangetaja` INT NOT NULL,
  `Liik_has_Kinnistu_idLiik_has_Kinnistu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idLiik_has_Kinnistu_has_Langetaja`),
  INDEX `fk_Langetus_Langetaja1_idx` (`Langetaja_idLangetaja` ASC),
  INDEX `fk_Liik_has_Kinnistu_has_Langetaja_Liik_has_Kinnistu1_idx` (`Liik_has_Kinnistu_idLiik_has_Kinnistu` ASC),
  CONSTRAINT `fk_Langetus_Langetaja1`
    FOREIGN KEY (`Langetaja_idLangetaja`)
    REFERENCES `kinnistu`.`Langetaja` (`idLangetaja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Liik_has_Kinnistu_has_Langetaja_Liik_has_Kinnistu1`
    FOREIGN KEY (`Liik_has_Kinnistu_idLiik_has_Kinnistu`)
    REFERENCES `kinnistu`.`Liik_has_Kinnistu` (`idLiik_has_Kinnistu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Vedaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Vedaja` (
  `idVedaja` INT NOT NULL,
  `Vedaja_eesnimi` VARCHAR(45) NULL,
  `Vedaja_perenimi` VARCHAR(45) NULL,
  PRIMARY KEY (`idVedaja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Vedu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Vedu` (
  `idVedu` INT NOT NULL AUTO_INCREMENT,
  `Vedu_kogus` SMALLINT NULL,
  `Vedaja_idVedaja` INT NOT NULL,
  `Liik_has_Kinnistu_idLiik_has_Kinnistu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idVedu`),
  INDEX `fk_Vedu_Vedaja1_idx` (`Vedaja_idVedaja` ASC),
  INDEX `fk_Vedu_Liik_has_Kinnistu1_idx` (`Liik_has_Kinnistu_idLiik_has_Kinnistu` ASC),
  CONSTRAINT `fk_Vedu_Vedaja1`
    FOREIGN KEY (`Vedaja_idVedaja`)
    REFERENCES `kinnistu`.`Vedaja` (`idVedaja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vedu_Liik_has_Kinnistu1`
    FOREIGN KEY (`Liik_has_Kinnistu_idLiik_has_Kinnistu`)
    REFERENCES `kinnistu`.`Liik_has_Kinnistu` (`idLiik_has_Kinnistu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Transportija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Transportija` (
  `idTransportija` INT NOT NULL,
  `Transportija_eesnimi` VARCHAR(45) NULL,
  `Transportija_perenimi` VARCHAR(45) NULL,
  PRIMARY KEY (`idTransportija`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Transportija_has_Liik_has_kinnistu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Transportija_has_Liik_has_kinnistu` (
  `idTransportija_has_Liik_has_kinnistu` INT NOT NULL AUTO_INCREMENT,
  `Transport_kogus` SMALLINT NULL,
  `Transportija_idTransportija` INT NOT NULL,
  `Liik_has_Kinnistu_idLiik_has_Kinnistu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTransportija_has_Liik_has_kinnistu`),
  INDEX `fk_Transport_Transportija1_idx` (`Transportija_idTransportija` ASC),
  INDEX `fk_Transportija_has_Liik_has_kinnistu_Liik_has_Kinnistu1_idx` (`Liik_has_Kinnistu_idLiik_has_Kinnistu` ASC),
  CONSTRAINT `fk_Transport_Transportija1`
    FOREIGN KEY (`Transportija_idTransportija`)
    REFERENCES `kinnistu`.`Transportija` (`idTransportija`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Transportija_has_Liik_has_kinnistu_Liik_has_Kinnistu1`
    FOREIGN KEY (`Liik_has_Kinnistu_idLiik_has_Kinnistu`)
    REFERENCES `kinnistu`.`Liik_has_Kinnistu` (`idLiik_has_Kinnistu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Sihtkoht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Sihtkoht` (
  `idSihtkoht` INT NOT NULL,
  `Sihtkoht_nimi` VARCHAR(45) NULL,
  PRIMARY KEY (`idSihtkoht`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Sihtkoht_has_Liik_has_Kinnistu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Sihtkoht_has_Liik_has_Kinnistu` (
  `idSihtkoht_has_Liik_has_Kinnistu` INT NOT NULL AUTO_INCREMENT,
  `Sihtkohas_kogus` SMALLINT NULL,
  `Sihtkoht_idSihtkoht` INT NOT NULL,
  `Liik_has_Kinnistu_idLiik_has_Kinnistu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSihtkoht_has_Liik_has_Kinnistu`),
  INDEX `fk_Sihtkohas_Sihtkoht1_idx` (`Sihtkoht_idSihtkoht` ASC),
  INDEX `fk_Sihtkoht_has_Liik_has_Kinnistu_Liik_has_Kinnistu1_idx` (`Liik_has_Kinnistu_idLiik_has_Kinnistu` ASC),
  CONSTRAINT `fk_Sihtkohas_Sihtkoht1`
    FOREIGN KEY (`Sihtkoht_idSihtkoht`)
    REFERENCES `kinnistu`.`Sihtkoht` (`idSihtkoht`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sihtkoht_has_Liik_has_Kinnistu_Liik_has_Kinnistu1`
    FOREIGN KEY (`Liik_has_Kinnistu_idLiik_has_Kinnistu`)
    REFERENCES `kinnistu`.`Liik_has_Kinnistu` (`idLiik_has_Kinnistu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Omandaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Omandaja` (
  `idOmandaja` INT NOT NULL AUTO_INCREMENT COMMENT '					',
  `Nimi` VARCHAR(45) NULL,
  `Kontakt` VARCHAR(45) NULL,
  PRIMARY KEY (`idOmandaja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Omanik_has_kinnistu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Omanik_has_kinnistu` (
  `Kinnistu_idKinnistu` INT NOT NULL,
  `Omanik_idOmanik` INT NOT NULL,
  PRIMARY KEY (`Kinnistu_idKinnistu`, `Omanik_idOmanik`),
  INDEX `fk_Kinnistu_has_Omanik_Omanik1_idx` (`Omanik_idOmanik` ASC),
  INDEX `fk_Kinnistu_has_Omanik_Kinnistu_idx` (`Kinnistu_idKinnistu` ASC),
  CONSTRAINT `fk_Kinnistu_has_Omanik_Kinnistu`
    FOREIGN KEY (`Kinnistu_idKinnistu`)
    REFERENCES `kinnistu`.`Kinnistu` (`idKinnistu`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Kinnistu_has_Omanik_Omanik1`
    FOREIGN KEY (`Omanik_idOmanik`)
    REFERENCES `kinnistu`.`Omanik` (`idOmanik`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kinnistu`.`Omandaja_has_Kinnistu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kinnistu`.`Omandaja_has_Kinnistu` (
  `Kinnistu_idKinnistu` INT NOT NULL,
  `Omandaja_idOmandaja` INT NOT NULL,
  `algus` VARCHAR(45) NULL,
  `lõpp` VARCHAR(45) NULL,
  PRIMARY KEY (`Kinnistu_idKinnistu`, `Omandaja_idOmandaja`),
  INDEX `fk_Kinnistu_has_Omandaja_Omandaja1_idx` (`Omandaja_idOmandaja` ASC),
  INDEX `fk_Kinnistu_has_Omandaja_Kinnistu1_idx` (`Kinnistu_idKinnistu` ASC),
  CONSTRAINT `fk_Kinnistu_has_Omandaja_Kinnistu1`
    FOREIGN KEY (`Kinnistu_idKinnistu`)
    REFERENCES `kinnistu`.`Kinnistu` (`idKinnistu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kinnistu_has_Omandaja_Omandaja1`
    FOREIGN KEY (`Omandaja_idOmandaja`)
    REFERENCES `kinnistu`.`Omandaja` (`idOmandaja`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `kinnistu`.`Omanik`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Omanik` (`idOmanik`, `Eesnimi`, `Perenimi`, `Telefon`, `Kontakt`, `Parool`) VALUES (1, 'Lembit', 'Talvis', '5333333', 'Kase talu 45, Rapla', '0000');
INSERT INTO `kinnistu`.`Omanik` (`idOmanik`, `Eesnimi`, `Perenimi`, `Telefon`, `Kontakt`, `Parool`) VALUES (2, 'Kulla', 'Valgus', '54000000', 'Tallinn, Lomonossovi 45-5', '1210221');
INSERT INTO `kinnistu`.`Omanik` (`idOmanik`, `Eesnimi`, `Perenimi`, `Telefon`, `Kontakt`, `Parool`) VALUES (3, 'Tuume', 'Valgus', '65656565', 'Tallinn, Lomonossovi 45-5', '5465214');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Kinnistu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Kinnistu` (`idKinnistu`, `Kataster`, `Nimi`, `Asukoht`) VALUES (1, '00000:000:0000', 'Kase', 'Rapla, Pühatu');
INSERT INTO `kinnistu`.`Kinnistu` (`idKinnistu`, `Kataster`, `Nimi`, `Asukoht`) VALUES (2, '11111:111:1111', 'Terevee', 'Kohila, Puuri küla');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Langetaja`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Langetaja` (`idLangetaja`, `Langetaja_eesnim`, `Langetaja_perenimi`) VALUES (1, 'Enn', 'Song');
INSERT INTO `kinnistu`.`Langetaja` (`idLangetaja`, `Langetaja_eesnim`, `Langetaja_perenimi`) VALUES (2, 'Rein', 'Veeväli');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Liik`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (1, 'Ku_jäme');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (2, 'Ku_peen');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (3, 'Ku_paber');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (4, 'Ku_küte');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (5, 'Mä_jäme');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (6, 'Mä_peen');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (7, 'Mä_paber');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (8, 'Mä_küte');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (9, 'Ks_jäme');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (10, 'Ks_peen');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (11, 'Ks_paber');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (12, 'Ks_küte');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (13, 'Hb_jäme');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (14, 'Hb_peen');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (15, 'Hb_paber');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (16, 'Hb_küte');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (17, 'Lm_jäme');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (18, 'Lm_peen');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (19, 'Lm_küte');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (20, 'Lv_jäme');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (21, 'Lv_peen');
INSERT INTO `kinnistu`.`Liik` (`idLiik`, `Liik`) VALUES (22, 'Lv_küte');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Liik_has_Kinnistu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 1, 250, '1');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 2, 150, '2');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 3, 50, '3');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 4, 60, '4');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 5, 12, '5');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 6, 10, '6');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 7, 55, '7');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 8, 25, '8');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 9, 30, '9');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 10, 54, '10');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 11, 60, '11');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 12, 50, '12');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 14, 10, '13');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (1, 18, 50, '14');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (2, 1, 10, '15');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (2, 2, 60, '16');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (2, 3, 100, '17');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (2, 4, 60, '18');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (2, 20, 100, '19');
INSERT INTO `kinnistu`.`Liik_has_Kinnistu` (`Kinnistu_idKinnistu`, `Liik_idLiik`, `Prognoos_kogus`, `idLiik_has_Kinnistu`) VALUES (NULL, NULL, NULL, '20');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Liik_has_Kinnistu_has_Langetaja`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Liik_has_Kinnistu_has_Langetaja` (`idLiik_has_Kinnistu_has_Langetaja`, `Langetus_kogus`, `Langetaja_idLangetaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (1, 200, 1, NULL);
INSERT INTO `kinnistu`.`Liik_has_Kinnistu_has_Langetaja` (`idLiik_has_Kinnistu_has_Langetaja`, `Langetus_kogus`, `Langetaja_idLangetaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (2, 150, 1, NULL);
INSERT INTO `kinnistu`.`Liik_has_Kinnistu_has_Langetaja` (`idLiik_has_Kinnistu_has_Langetaja`, `Langetus_kogus`, `Langetaja_idLangetaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (3, 50, 2, NULL);
INSERT INTO `kinnistu`.`Liik_has_Kinnistu_has_Langetaja` (`idLiik_has_Kinnistu_has_Langetaja`, `Langetus_kogus`, `Langetaja_idLangetaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (4, 5, 2, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Vedaja`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Vedaja` (`idVedaja`, `Vedaja_eesnimi`, `Vedaja_perenimi`) VALUES (1, 'Aare', 'Teearu');
INSERT INTO `kinnistu`.`Vedaja` (`idVedaja`, `Vedaja_eesnimi`, `Vedaja_perenimi`) VALUES (2, 'Madis', 'Männi');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Vedu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Vedu` (`idVedu`, `Vedu_kogus`, `Vedaja_idVedaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (1, 150, 1, NULL);
INSERT INTO `kinnistu`.`Vedu` (`idVedu`, `Vedu_kogus`, `Vedaja_idVedaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (2, 100, 1, NULL);
INSERT INTO `kinnistu`.`Vedu` (`idVedu`, `Vedu_kogus`, `Vedaja_idVedaja`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (3, 10, 2, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Transportija`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Transportija` (`idTransportija`, `Transportija_eesnimi`, `Transportija_perenimi`) VALUES (1, 'Vello', 'Järvekülg');
INSERT INTO `kinnistu`.`Transportija` (`idTransportija`, `Transportija_eesnimi`, `Transportija_perenimi`) VALUES (2, 'Villu', 'Tamme');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Transportija_has_Liik_has_kinnistu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Transportija_has_Liik_has_kinnistu` (`idTransportija_has_Liik_has_kinnistu`, `Transport_kogus`, `Transportija_idTransportija`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (1, 250, 1, NULL);
INSERT INTO `kinnistu`.`Transportija_has_Liik_has_kinnistu` (`idTransportija_has_Liik_has_kinnistu`, `Transport_kogus`, `Transportija_idTransportija`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (2, 100, 2, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Sihtkoht`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Sihtkoht` (`idSihtkoht`, `Sihtkoht_nimi`) VALUES (1, 'Stora Enso Imavere');
INSERT INTO `kinnistu`.`Sihtkoht` (`idSihtkoht`, `Sihtkoht_nimi`) VALUES (2, 'Stora Enso Näpi');
INSERT INTO `kinnistu`.`Sihtkoht` (`idSihtkoht`, `Sihtkoht_nimi`) VALUES (3, 'Tarrixs');
INSERT INTO `kinnistu`.`Sihtkoht` (`idSihtkoht`, `Sihtkoht_nimi`) VALUES (4, 'Valmos');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Sihtkoht_has_Liik_has_Kinnistu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Sihtkoht_has_Liik_has_Kinnistu` (`idSihtkoht_has_Liik_has_Kinnistu`, `Sihtkohas_kogus`, `Sihtkoht_idSihtkoht`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (1, 260, 1, NULL);
INSERT INTO `kinnistu`.`Sihtkoht_has_Liik_has_Kinnistu` (`idSihtkoht_has_Liik_has_Kinnistu`, `Sihtkohas_kogus`, `Sihtkoht_idSihtkoht`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (2, 150, 2, NULL);
INSERT INTO `kinnistu`.`Sihtkoht_has_Liik_has_Kinnistu` (`idSihtkoht_has_Liik_has_Kinnistu`, `Sihtkohas_kogus`, `Sihtkoht_idSihtkoht`, `Liik_has_Kinnistu_idLiik_has_Kinnistu`) VALUES (3, 10, 4, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Omandaja`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Omandaja` (`idOmandaja`, `Nimi`, `Kontakt`) VALUES (1, 'Karo Mets OÜ', '53431484');
INSERT INTO `kinnistu`.`Omandaja` (`idOmandaja`, `Nimi`, `Kontakt`) VALUES (2, 'Eremka OÜ', '534314846');

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Omanik_has_kinnistu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Omanik_has_kinnistu` (`Kinnistu_idKinnistu`, `Omanik_idOmanik`) VALUES (1, 1);
INSERT INTO `kinnistu`.`Omanik_has_kinnistu` (`Kinnistu_idKinnistu`, `Omanik_idOmanik`) VALUES (2, 2);
INSERT INTO `kinnistu`.`Omanik_has_kinnistu` (`Kinnistu_idKinnistu`, `Omanik_idOmanik`) VALUES (2, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `kinnistu`.`Omandaja_has_Kinnistu`
-- -----------------------------------------------------
START TRANSACTION;
USE `kinnistu`;
INSERT INTO `kinnistu`.`Omandaja_has_Kinnistu` (`Kinnistu_idKinnistu`, `Omandaja_idOmandaja`, `algus`, `lõpp`) VALUES (1, 1, '2015 01.02', NULL);
INSERT INTO `kinnistu`.`Omandaja_has_Kinnistu` (`Kinnistu_idKinnistu`, `Omandaja_idOmandaja`, `algus`, `lõpp`) VALUES (2, 1, '2015.02.28', NULL);

COMMIT;

