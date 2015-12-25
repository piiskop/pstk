SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sentence` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sentence` ;

-- -----------------------------------------------------
-- Table `sentence`.`isik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`isik` (
  `id` INT NOT NULL,
  `enimi` VARCHAR(45) NOT NULL,
  `pnimi` VARCHAR(45) NOT NULL,
  `synd` DATE NOT NULL,
  `synnikoht` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sentence`.`amet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`amet` (
  `id-amet` INT NOT NULL,
  `amet` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id-amet`),
  UNIQUE INDEX `id-amet_UNIQUE` (`id-amet` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sentence`.`amet_has_isik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sentence`.`amet_has_isik` (
  `amet_id-amet1` INT NOT NULL,
  `isik_id` INT NOT NULL,
  `start` DATE NOT NULL,
  `end` DATE NOT NULL,
  INDEX `fk_amet_has_isik_isik1_idx` (`isik_id` ASC),
  INDEX `fk_amet_has_isik_amet1_idx` (`amet_id-amet1` ASC),
  CONSTRAINT `fk_amet_has_isik_isik1`
    FOREIGN KEY (`isik_id`)
    REFERENCES `sentence`.`isik` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_amet_has_isik_amet1`
    FOREIGN KEY (`amet_id-amet1`)
    REFERENCES `sentence`.`amet` (`id-amet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `sentence`.`isik`
-- -----------------------------------------------------
START TRANSACTION;
USE `sentence`;
INSERT INTO `sentence`.`isik` (`id`, `enimi`, `pnimi`, `synd`, `synnikoht`) VALUES (1, 'Andrus', 'Kivirähk', '1970-08-17', 'Tallinn');

COMMIT;


-- -----------------------------------------------------
-- Data for table `sentence`.`amet`
-- -----------------------------------------------------
START TRANSACTION;
USE `sentence`;
INSERT INTO `sentence`.`amet` (`id-amet`, `amet`) VALUES (1, 'kirjanik');
INSERT INTO `sentence`.`amet` (`id-amet`, `amet`) VALUES (2, 'näitekirjaniik');
INSERT INTO `sentence`.`amet` (`id-amet`, `amet`) VALUES (3, 'följetonist');
INSERT INTO `sentence`.`amet` (`id-amet`, `amet`) VALUES (4, 'prosaist');
INSERT INTO `sentence`.`amet` (`id-amet`, `amet`) VALUES (5, 'lastekirjanik');

COMMIT;


-- -----------------------------------------------------
-- Data for table `sentence`.`amet_has_isik`
-- -----------------------------------------------------
START TRANSACTION;
USE `sentence`;
INSERT INTO `sentence`.`amet_has_isik` (`amet_id-amet1`, `isik_id`, `start`, `end`) VALUES (1, 1, '1990-02-27', '1995-02-27');
INSERT INTO `sentence`.`amet_has_isik` (`amet_id-amet1`, `isik_id`, `start`, `end`) VALUES (2, 1, '1995-02-27', '1996-02-27');
INSERT INTO `sentence`.`amet_has_isik` (`amet_id-amet1`, `isik_id`, `start`, `end`) VALUES (3, 1, '1996-02-27', '1997-02-27');
INSERT INTO `sentence`.`amet_has_isik` (`amet_id-amet1`, `isik_id`, `start`, `end`) VALUES (4, 1, '1997-02-27', '1998-02-27');
INSERT INTO `sentence`.`amet_has_isik` (`amet_id-amet1`, `isik_id`, `start`, `end`) VALUES (5, 1, '1999-02-27', '2000-02-27');

COMMIT;

