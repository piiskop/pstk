-- Schema armin_energies
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `armin_energies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `armin_energies` ;

-- -----------------------------------------------------
-- Table `energies`.`energy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `armin_energies`.`energy` (
  `idenergy` INT NOT NULL,
  `energy_type` CHAR(20) NOT NULL,
  `renewable_or_not` BOOLEAN NOT NULL,
  PRIMARY KEY (`idenergy`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `armin_energies`.`producer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `armin_energies`.`producer` (
  `idproducer` INT NOT NULL,
  `producer_name` VARCHAR(45) NOT NULL,
  `price` INT NULL,
  PRIMARY KEY (`idproducer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `armin_energies`.`producer_has_energy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `armin_energies`.`producer_has_energy` (
  `producer_idproducer` INT NOT NULL,
  `energy_idenergy` INT NOT NULL,
  PRIMARY KEY (`producer_idproducer`, `energy_idenergy`),
  INDEX `fk_producer_has_energy_energy1_idx` (`energy_idenergy` ASC),
  INDEX `fk_producer_has_energy_producer_idx` (`producer_idproducer` ASC),
  CONSTRAINT `fk_producer_has_energy_producer`
    FOREIGN KEY (`producer_idproducer`)
    REFERENCES `armin_energies`.`producer` (`idproducer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producer_has_energy_energy1`
    FOREIGN KEY (`energy_idenergy`)
    REFERENCES `armin_energies`.`energy` (`idenergy`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
-- loon ja annan kõik õigused kasutajale
create user `armin`@'localhost' identified by 'pass';
GRANT ALL PRIVILEGES ON `armin_energies` . * TO `armin`@'localhost';
-- login kasutajasse sisse
mysql.exe -u armin -p pass
use armin_energies;
-- väike muudatus tootja hinna andmetüübis
alter table producer modify price float(6.2);
--sisestan andmed
insert into energy (idenergy, energy_type) values (1, 'gasoline');
insert into energy (idenergy, energy_type) values (2, 'diesel');
insert into energy (idenergy, energy_type) values (3, 'heating oil');
insert into energy (idenergy, energy_type) values (4, 'electricity');
insert into energy (idenergy, energy_type) values (5, 'coal');

insert into producer (idproducer, producer_name, price) values (1, 'WTI', 95.55);
insert into producer (idproducer, producer_name, price) values (2, 'Brent', 111.80);
insert into producer (idproducer, producer_name, price) values (3, 'NIMRA', 3.65);
insert into producer (idproducer, producer_name, price) values (4, 'anadrako', 10.87);
insert into producer (idproducer, producer_name, price) values (5, 'france', 2.45);
insert into producer (idproducer, producer_name, price) values (6, 'china', 2.40);
insert into producer (idproducer, producer_name, price) values (7, 'Brazil', 2.27);

----andmete muutmine rollbackiga (ei tahtnud muuta)
update producer set idproducer = 789 where idproducer=1 limit 1;
--------------------distinct(pole sarnaseid andmeid)
select distinct producer_name from producer;
-----------group by
select idproducer, producer_name, price from producer where idproducer>=5 group by price desc;
----------having
select idproducer, producer_name, price from producer where idproducer>=5 group by price having idproducer <=5;
--------order by
select idproducer, producer_name, price from producer where idproducer>=5 order by price desc;
----------union valib siis mõlemast tabelist, kuid paneb kõik ühte ritta
select producer_name from producer 
union
select energy_type from energy; 
------------------ between
select price from producer where price between 2 and 4;
---------------- in või not in command
select producer_name from prodcuer where producer in ('china');
-------------------like and not like
SELECT * FROM producer
WHERE producer_name LIKE 'c%';
