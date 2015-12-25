SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `databases` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `databases` ;



-- -----------------------------------------------------
-- Table `databases`.`Contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `databases`.`Contact` (
  `idContact` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idContact`))
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

insert into Contact(name) values ('AS KARU'), ('AS MADU'), ('AS KASS');

-- -----------------------------------------------------
-- Table `databases`.`ContactPerson`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `databases`.`ContactPerson` (
  `idContactPerson` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idContact` INT(11) UNSIGNED NOT NULL,
  `sex` TINYINT(1) NULL,
  `firstName` VARCHAR(255) NULL,
  `lastName` VARCHAR(255) NULL,
  `role` VARCHAR(40) NULL,
  PRIMARY KEY (`idContactPerson`),
  CONSTRAINT `fk_687a1bf2-ae11-11e4-8f31-64315006d03e`
    FOREIGN KEY (`idContact`)
    REFERENCES `databases`.`Contact` (`idContact`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

insert into ContactPerson values (1, 2, 0, 'Kelly', 'Tom', 'Sekretär'),
(2, 1, 1, 'Bany', 'Suur', 'Cheef'), (3, 3, 0, 'Kity', 'Litle', 'worker');
-- -----------------------------------------------------
-- Table `databases`.`Inquiry`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `databases`.`Inquiry` (
  `idInquiry` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idContact` INT(11) UNSIGNED NOT NULL,
  `statusOInquiry` VARCHAR(255) NULL COMMENT 'What is the status of this inquiry at the moment?',
  `result` ENUM('unanswered', 'possible', 'accepted', 'denied') NOT NULL DEFAULT 'unanswered' COMMENT 'What is the end result of this inquiry?',
  `weHaveLogo` TINYINT(1) NULL,
  `weHaveObjects` TINYINT(1) NULL,
  `logo` VARCHAR(255) NULL,
  `hrefOLogo` VARCHAR(255) NULL,
  `cat` ENUM('money', 'arrangers', 'balls', 'courts', 'discount', 'food', 'media', 'prizes', 'minitennis') NULL,
  PRIMARY KEY (`idInquiry`),
  CONSTRAINT `fk_687a3e8e-ae11-11e4-8f31-64315006d03e`
    FOREIGN KEY (`idContact`)
    REFERENCES `databases`.`Contact` (`idContact`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

INSERT INTO Inquiry (idInquiry, idContact, statusOInquiry, result) VALUES (NULL, 1, "IN PROGRESS", "UNANSWERED");
INSERT INTO Inquiry (idInquiry, idContact, statusOInquiry, result) VALUES (NULL, 2, "Üle küsida", "ACCEPTED");
INSERT INTO Inquiry (idInquiry, idContact, statusOInquiry, result) VALUES (NULL, 1, "Järele minna 11.02", "denied");


-- -----------------------------------------------------
-- Table `databases`.`ContactPersonData`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `databases`.`ContactPersonData` (
  `idContactPersonData` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idContactPerson` INT(11) UNSIGNED NOT NULL,
  `typeOContact` ENUM('email', 'phone', 'MSN', 'Skype', 'GTalk', 'Facebook') NOT NULL,
  `valOContact` VARCHAR(255) NOT NULL COMMENT 'This is for instance an email address or phone number.',
  PRIMARY KEY (`idContactPersonData`),
  UNIQUE INDEX `ContactData_person_type_val` (`typeOContact` ASC, `valOContact` ASC, `idContactPerson` ASC),
  CONSTRAINT `fk_687a60e4-ae11-11e4-8f31-64315006d03e`
    FOREIGN KEY (`idContactPerson`)
    REFERENCES `databases`.`ContactPerson` (`idContactPerson`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

insert into ContactPersonData (idContactPerson, typeOContact, valOContact) values (2, 'email', 'krok@gmail.com'), (3, 'phone', '58142832'), (1, 'phone', '5719255');
-- -----------------------------------------------------
-- Table `databases`.`RowOInquiry`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `databases`.`RowOInquiry` (
  `idRowOInquiry` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idContactPersonData` INT(11) UNSIGNED NOT NULL,
  `idInquiry` INT(11) UNSIGNED NOT NULL,
  `subject` VARCHAR(45) NOT NULL,
  `content` TEXT NOT NULL,
  `tS` TIMESTAMP NOT NULL,
  `typeOInquiry` TINYINT(1) NOT NULL COMMENT 'true if per email otherwise false',
  PRIMARY KEY (`idRowOInquiry`),
  CONSTRAINT `fk_687a4fc8-ae11-11e4-8f31-64315006d03e`
    FOREIGN KEY (`idInquiry`)
    REFERENCES `databases`.`Inquiry` (`idInquiry`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_687a7246-ae11-11e4-8f31-64315006d03e`
    FOREIGN KEY (`idContactPersonData`)
    REFERENCES `databases`.`ContactPersonData` (`idContactPersonData`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
PACK_KEYS = 0
ROW_FORMAT = DEFAULT;

INSERT into RowOInquiry (idRowOInquiry, idContactPersonData, idInquiry, subject, content, tS, typeOInquiry ) values(1, 1, 1, "postikana", "Tere tere", "2015-02-09 12:00:01", 0 );
INSERT into RowOInquiry (idRowOInquiry, idContactPersonData, idInquiry, subject, content, tS, typeOInquiry ) values(2, 2, 2, "email", "Hüva", "2015-02-10 12:01:01", 1 );
INSERT into RowOInquiry (idRowOInquiry, idContactPersonData, idInquiry, subject, content, tS, typeOInquiry ) values(3, 3, 3, "kuller", "Mingi tekst", "2015-02-09 12:02:01", 0 );

-- Kõik suhtlused AS KARU-ga uuemast vanemaks
SELECT RowOInquiry.subject FROM RowOInquiry JOIN Inquiry ON Inquiry.IdInquiry = RowOInquiry.idInquiry JOIN Contact ON Contact.idContact = Inquiry.idContact WHERE Contact.name = "AS KARU" ORDER BY RowOInquiry.ts DESC;
--Viimane suhtlus AS KARU-ga
SELECT RowOInquiry.subject FROM RowOInquiry JOIN Inquiry ON Inquiry.IdInquiry = RowOInquiry.idInquiry JOIN Contact ON Contact.idContact = Inquiry.idContact WHERE Contact.name = "AS KARU" ORDER BY RowOInquiry.ts DESC LIMIT 1;
--Kõik mitte e-posti suhtlused AS KARU-ga
SELECT RowOInquiry.subject FROM RowOInquiry JOIN Inquiry ON Inquiry.IdInquiry = RowOInquiry.idInquiry JOIN Contact ON Contact.idContact = Inquiry.idContact WHERE Contact.name = "AS KARU" AND typeOInquiry = 0 ORDER BY RowOInquiry.ts DESC;
-- Viimane GoBus saadetud e-kiri
SELECT RowOInquiry.subject FROM RowOInquiry JOIN Inquiry ON Inquiry.IdInquiry = RowOInquiry.idInquiry JOIN Contact ON Contact.idContact = Inquiry.idContact WHERE RowOInquiry.typeOInquiry = 1 AND Contact.name = "GOBUS" ORDER BY RowOInquiry.ts DESC LIMIT 1;

-- AS MADU kontaktisikute nimi ja telefoninumbrid
SELECT ContactPerson.firstName, ContactPerson.lastName, ContactPersonData.valOContact FROM ContactPerson JOIN Contact ON Contact.idContact = ContactPerson.idContact JOIN ContactPersonData on ContactPersonData.idContactPerson = ContactPerson.idContactPerson WHERE Contact.name = 'AS MADU' AND ContactPersonData.typeOContact = 'phone';

-- Kõik positiivsed suhtlused, ühendades nimed ja roll, mis on saadud enne 2015 10.veebruarit

SELECT  RowOInquiry.idRowOInquiry, ContactPerson.firstName, ContactPerson.lastName, ContactPerson.role from RowOInquiry 
join ContactPersonData on  ContactPersonData.idContactPersonData = RowOInquiry.idContactPersonData 
inner join ContactPerson on  ContactPerson.idContactPerson = ContactPersonData.idContactPerson  
join Inquiry on  RowOInquiry.idInquiry = Inquiry.IdInquiry 
where Inquiry.result = "accepted" and RowOInquiry.tS < "2015-02-10 00:00:00";



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
