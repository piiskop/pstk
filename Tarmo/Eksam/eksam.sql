-- MySQL Script generated by MySQL Workbench
-- 02/14/15 15:28:02
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tarmo_toiduained
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tarmo_toiduained
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tarmo_toiduained` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tarmo_toiduained` ;

-- -----------------------------------------------------
-- Table `tarmo_toiduained`.`Toiduaineliigid`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tarmo_toiduained`.`Toiduaineliigid` (
  `L_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Liik` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`L_ID`),
  UNIQUE INDEX `L_ID_UNIQUE` (`L_ID` ASC),
  UNIQUE INDEX `Liik_UNIQUE` (`Liik` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tarmo_toiduained`.`Toiduained`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tarmo_toiduained`.`Toiduained` (
  `T_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Toiduaine` VARCHAR(45) NOT NULL,
  `Toiduaineliigid_L_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`T_ID`),
  UNIQUE INDEX `T_ID_UNIQUE` (`T_ID` ASC),
  UNIQUE INDEX `Toiduaine_UNIQUE` (`Toiduaine` ASC),
  INDEX `fk_Toiduained_Toiduaineliigid_idx` (`Toiduaineliigid_L_ID` ASC),
  CONSTRAINT `fk_Toiduained_Toiduaineliigid`
    FOREIGN KEY (`Toiduaineliigid_L_ID`)
    REFERENCES `tarmo_toiduained`.`Toiduaineliigid` (`L_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tarmo_toiduained`.`Eripära`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tarmo_toiduained`.`Eripära` (
  `E_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Eri` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`E_ID`),
  UNIQUE INDEX `E_ID_UNIQUE` (`E_ID` ASC),
  UNIQUE INDEX `Eri_UNIQUE` (`Eri` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tarmo_toiduained`.`ToiduaineteEripärad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tarmo_toiduained`.`ToiduaineteEripärad` (
  `TE_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `T_ID` INT UNSIGNED NOT NULL,
  `E_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`TE_ID`),
  INDEX `fk_Toiduained_has_Kasu_Kahju_Kasu_Kahju1_idx` (`E_ID` ASC),
  INDEX `fk_Toiduained_has_Kasu_Kahju_Toiduained1_idx` (`T_ID` ASC),
  UNIQUE INDEX `TE_ID_UNIQUE` (`TE_ID` ASC),
  CONSTRAINT `fk_Toiduained_has_Kasu_Kahju_Toiduained1`
    FOREIGN KEY (`T_ID`)
    REFERENCES `tarmo_toiduained`.`Toiduained` (`T_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Toiduained_has_Kasu_Kahju_Kasu_Kahju1`
    FOREIGN KEY (`E_ID`)
    REFERENCES `tarmo_toiduained`.`Eripära` (`E_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- Andmed toiduaineliikide kohta tablisse --
insert into Toiduaineliigid values (1, "Mürgine"), (2, "Kahjulik"), (3, "Kasulik"), (4, "Tervendav");
-- Andmed toiduainete kohta tablisse --
insert into Toiduained values (1, "Õlu", 1), (2, "Lahustuv kohv", 1), (3, "Valge nisujahu", 2), (4, "Sulatatud juust", 2),
(5, "Tume šokolaad", 3), (6, "Lamba liha", 3), (7, "Kõrge rasvasisaldusega juust", 4), (8, "Pohlad", 4);
-- Andmed toiduainete eripärade kohta tabelisse --
insert into Eripära values (1, "Lagundab maksa."), (2, "Sisaldab B-vitamiini."), (3, "Tekitab insuldi- ja infarkti ohtu ning veresoonte haiguseid."),
(4, "Tekitab aktiivselt kolesterooli."), (5, "Neutraliseerib valge suhkru toimet."), (6, "Sisaldab kaltsiumit ning letsiini, mis on väga tõhus kolesteroolivastane aine.");
-- Seosed vahetablisse ToiduaineteEripärad --
insert into ToiduaineteEripärad values (1, 1, 1), (2, 2, 1), (3, 3, 3), (4, 4, 4), (5, 5, 2), (6, 6, 2), (7, 7, 6), (8, 8, 5);

-- 1.11 Uus kasutaja -- 
GRANT ALL PRIVILEGES on tarmo_toiduained TO 'eksam'@'localhost' IDENTIFIED BY 'eksamparool' WITH GRANT OPTION;

-- 1.12 Login uue kasutajaga sisse nagu ikka: mysql -utarmo_toiduained -p ja parool --

-- 1.16 Muudan kirjet - õlu muudan Pudeli/purgi õluks, kuna see on esimene kirje, siis limit 1 ning muud tingimust pole vaja --
BEGIN;
UPDATE Toiduained set Toiduaine = "Pudeli/purgi õlu" LIMIT 1;
COMMIT;

-- 1.17 -- 
-- DISTINCT Valib erinevad toiduainete eripärad vastavast tablist --
SELECT DISTINCT E_ID from ToiduaineteEripärad;
-- JOIN Valib toiduained ja nendele vasta toiduaine liigi -- 
SELECT Toiduaineliigid.Liik, Toiduained.Toiduaine FROM Toiduaineliigid 
JOIN Toiduained ON Toiduaineliigid.L_ID = Toiduained.Toiduaineliigid_L_ID;
-- LEFT JOIN Valib kõik toiduained ja nende eripärad--
SELECT Toiduained.Toiduaine, Eripära.Eri FROM Toiduained 
LEFT JOIN ToiduaineteEripärad ON Toiduained.T_ID = ToiduaineteEripärad.T_ID 
LEFT JOIN Eripära ON Eripära.E_ID = ToiduaineteEripärad.E_ID;
-- GROUP BY Valib toiduainete liigid ja vastavate toiduainete hulga ning grupeerib toiduainete liikide järgi --
SELECT Toiduaineliigid.Liik, COUNT(Toiduained.Toiduaine) AS ToiduaineteHulk FROM Toiduaineliigid 
JOIN Toiduained ON Toiduaineliigid.L_ID = Toiduained.Toiduaineliigid_L_ID GROUP BY Toiduaineliigid.Liik;
-- HAVING/IS NOT NULL/LIKE Valib eripärad ja vastavate toiduainete hulga, kusjuures toiduaine ei ole tühi ja eripära sisaldab sõna "sisaldab" --
SELECT COUNT(Toiduained.Toiduaine) AS ToiduaineteHulk, Eripära.Eri FROM Toiduained 
LEFT JOIN ToiduaineteEripärad ON Toiduained.T_ID = ToiduaineteEripärad.T_ID 
LEFT JOIN Eripära ON Eripära.E_ID = ToiduaineteEripärad.E_ID WHERE Toiduained.Toiduaine IS NOT NULL 
GROUP BY Eripära.Eri HAVING Eripära.Eri LIKE "%Sisaldab%";
-- ORDER BY/LIMIT Valib esimesed kolm eripärad, järjestab tähestikulises järjekorras --
SELECT Eripära.Eri FROM Eripära ORDER BY Eri LIMIT 1, 3;
-- UNION Valib ühendi toiduainete ja liikide ID'dest-- 
SELECT T_ID FROM Toiduained UNION ALL SELECT L_ID FROM Toiduaineliigid;
-- BETWEEN Valib toiduainete tabelist esimesed 5 kirjet (1 kuni 5)--
SELECT * FROM Toiduained WHERE T_ID BETWEEN 1 AND 5;
-- IN Valib kasulikud ja tervendavad toiduained--
SELECT Toiduaineliigid.Liik, Toiduained.Toiduaine FROM Toiduaineliigid 
JOIN Toiduained ON Toiduaineliigid.L_ID = Toiduained.Toiduaineliigid_L_ID 
WHERE Toiduaineliigid.Liik IN ("Tervendav", "Kasulik");


-- 1.18 --
-- Ilma transaktsioonita --
DELETE FROM Eripära WHERE E_ID > 10;
-- Transaktsiooniga --
BEGIN;
DELETE FROM ToiduaineteEripärad WHERE E_ID = 2;
ROLLBACK;



