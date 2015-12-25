SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `permaculture_andrus` DEFAULT CHARACTER SET utf8 ;
USE `permaculture_andrus` ;

-- -----------------------------------------------------
-- Table `permaculture_andrus`.`krundid`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permaculture_andrus`.`krundid` (
  `idkrundid` INT NOT NULL AUTO_INCREMENT,
  `asukoht` VARCHAR(45) NOT NULL,
  `suurus_m2` INT NOT NULL,
  PRIMARY KEY (`idkrundid`),
  UNIQUE INDEX `idkrundid_UNIQUE` (`idkrundid` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permaculture_andrus`.`sook`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permaculture_andrus`.`sook` (
  `idsook` INT NOT NULL AUTO_INCREMENT,
  `nimi` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idsook`),
  UNIQUE INDEX `idkasvatatakse_UNIQUE` (`idsook` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permaculture_andrus`.`inimesed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permaculture_andrus`.`inimesed` (
  `idinimesed` INT NOT NULL AUTO_INCREMENT,
  `enimi` VARCHAR(45) NOT NULL,
  `pnimi` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idinimesed`),
  UNIQUE INDEX `idinimesed_UNIQUE` (`idinimesed` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permaculture_andrus`.`krundid_has_inimesed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permaculture_andrus`.`krundid_has_inimesed` (
  `inimesed_idinimesed` INT NOT NULL,
  `krundid_idkrundid` INT NOT NULL,
  PRIMARY KEY (`inimesed_idinimesed`, `krundid_idkrundid`),
  INDEX `fk_inimesed_has_krundid_krundid1` (`krundid_idkrundid` ASC),
  CONSTRAINT `fk_inimesed_has_krundid_inimesed`
    FOREIGN KEY (`inimesed_idinimesed`)
    REFERENCES `permaculture_andrus`.`inimesed` (`idinimesed`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inimesed_has_krundid_krundid1`
    FOREIGN KEY (`krundid_idkrundid`)
    REFERENCES `permaculture_andrus`.`krundid` (`idkrundid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permaculture_andrus`.`inimesed_has_sook`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permaculture_andrus`.`inimesed_has_sook` (
  `inimesed_idinimesed` INT NOT NULL,
  `sook_idsook` INT NOT NULL,
  PRIMARY KEY (`inimesed_idinimesed`, `sook_idsook`),
  INDEX `fk_inimesed_has_sook_sook1_idx` (`sook_idsook` ASC),
  INDEX `fk_inimesed_has_sook_inimesed1_idx` (`inimesed_idinimesed` ASC),
  CONSTRAINT `fk_inimesed_has_sook_inimesed1`
    FOREIGN KEY (`inimesed_idinimesed`)
    REFERENCES `permaculture_andrus`.`inimesed` (`idinimesed`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inimesed_has_sook_sook1`
    FOREIGN KEY (`sook_idsook`)
    REFERENCES `permaculture_andrus`.`sook` (`idsook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `permaculture_andrus`.`krundid_has_sook`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `permaculture_andrus`.`krundid_has_sook` (
  `krundid_idkrundid` INT NOT NULL,
  `sook_idsook` INT NOT NULL,
  PRIMARY KEY (`krundid_idkrundid`, `sook_idsook`),
  INDEX `fk_krundid_has_sook_sook1_idx` (`sook_idsook` ASC),
  INDEX `fk_krundid_has_sook_krundid1_idx` (`krundid_idkrundid` ASC),
  CONSTRAINT `fk_krundid_has_sook_krundid1`
    FOREIGN KEY (`krundid_idkrundid`)
    REFERENCES `permaculture_andrus`.`krundid` (`idkrundid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_krundid_has_sook_sook1`
    FOREIGN KEY (`sook_idsook`)
    REFERENCES `permaculture_andrus`.`sook` (`idsook`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `permaculture_andrus`.`krundid`
-- -----------------------------------------------------
START TRANSACTION;
USE `permaculture_andrus`;
INSERT INTO `permaculture_andrus`.`krundid` (`idkrundid`, `asukoht`, `suurus_m2`) VALUES (1, 'Uulu', 1200);
INSERT INTO `permaculture_andrus`.`krundid` (`idkrundid`, `asukoht`, `suurus_m2`) VALUES (2, 'Tallinn', 1500);
INSERT INTO `permaculture_andrus`.`krundid` (`idkrundid`, `asukoht`, `suurus_m2`) VALUES (3, 'K-Nõmme', 900);
INSERT INTO `permaculture_andrus`.`krundid` (`idkrundid`, `asukoht`, `suurus_m2`) VALUES (4, 'Häädemeeste', 1600);
INSERT INTO `permaculture_andrus`.`krundid` (`idkrundid`, `asukoht`, `suurus_m2`) VALUES (5, 'Rannametsa', 500);

COMMIT;


-- -----------------------------------------------------
-- Data for table `permaculture_andrus`.`sook`
-- -----------------------------------------------------
START TRANSACTION;
USE `permaculture_andrus`;
INSERT INTO `permaculture_andrus`.`sook` (`idsook`, `nimi`) VALUES (1, 'kapsas');
INSERT INTO `permaculture_andrus`.`sook` (`idsook`, `nimi`) VALUES (2, 'porgand');
INSERT INTO `permaculture_andrus`.`sook` (`idsook`, `nimi`) VALUES (3, 'pirn');
INSERT INTO `permaculture_andrus`.`sook` (`idsook`, `nimi`) VALUES (4, 'mustsõstar');
INSERT INTO `permaculture_andrus`.`sook` (`idsook`, `nimi`) VALUES (5, 'kukeseen');

COMMIT;


-- -----------------------------------------------------
-- Data for table `permaculture_andrus`.`inimesed`
-- -----------------------------------------------------
START TRANSACTION;
USE `permaculture_andrus`;
INSERT INTO `permaculture_andrus`.`inimesed` (`idinimesed`, `enimi`, `pnimi`) VALUES (1, 'Mari', 'Kalkun');
INSERT INTO `permaculture_andrus`.`inimesed` (`idinimesed`, `enimi`, `pnimi`) VALUES (2, 'Kauri', 'Mets');
INSERT INTO `permaculture_andrus`.`inimesed` (`idinimesed`, `enimi`, `pnimi`) VALUES (3, 'Meelis', 'Raba');
INSERT INTO `permaculture_andrus`.`inimesed` (`idinimesed`, `enimi`, `pnimi`) VALUES (4, 'Kairi', 'Tolgus');
INSERT INTO `permaculture_andrus`.`inimesed` (`idinimesed`, `enimi`, `pnimi`) VALUES (5, 'Meelis', 'Kalkun');

COMMIT;


-- -----------------------------------------------------
-- Data for table `permaculture_andrus`.`krundid_has_inimesed`
-- -----------------------------------------------------
START TRANSACTION;
USE `permaculture_andrus`;
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (1, 1);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (1, 2);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (1, 3);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (2, 2);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (2, 3);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (2, 4);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (3, 3);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (3, 4);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (3, 5);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (4, 4);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (4, 5);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (4, 1);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (5, 5);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (5, 1);
INSERT INTO `permaculture_andrus`.`krundid_has_inimesed` (`inimesed_idinimesed`, `krundid_idkrundid`) VALUES (5, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `permaculture_andrus`.`inimesed_has_sook`
-- -----------------------------------------------------
START TRANSACTION;
USE `permaculture_andrus`;
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (1, 1);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (1, 2);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (1, 3);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (2, 2);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (2, 3);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (2, 4);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (3, 3);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (3, 4);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (3, 5);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (4, 4);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (4, 5);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (4, 1);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (5, 5);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (5, 1);
INSERT INTO `permaculture_andrus`.`inimesed_has_sook` (`inimesed_idinimesed`, `sook_idsook`) VALUES (5, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `permaculture_andrus`.`krundid_has_sook`
-- -----------------------------------------------------
START TRANSACTION;
USE `permaculture_andrus`;
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (1, 1);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (1, 2);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (1, 3);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (2, 2);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (2, 3);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (2, 4);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (3, 3);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (3, 4);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (3, 5);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (4, 4);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (4, 5);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (4, 1);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (5, 5);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (5, 1);
INSERT INTO `permaculture_andrus`.`krundid_has_sook` (`krundid_idkrundid`, `sook_idsook`) VALUES (5, 2);

COMMIT;

