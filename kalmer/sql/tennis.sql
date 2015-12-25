CREATE DATABASE tennis CHARACTER SET utf8 COLLATE utf8_general_ci;

GRANT ALL ON tennis.* TO `databases`@localhost;

CREATE TABLE IF NOT EXISTS `tennis`.`Turniir` (
  `idTurniir` INT NOT NULL AUTO_INCREMENT,
  `nimi` CHAR(50) NOT NULL,
  `turniiriAlgus` TIMESTAMP NOT NULL,
  `turniiriLõpp` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idTurniir`),
  UNIQUE INDEX `nimi_UNIQUE` (`nimi` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tennis`.`Kohtunik` (
  `idKohtunik` INT NOT NULL AUTO_INCREMENT,
  `eesnimi` CHAR(45) NOT NULL,
  `perenimi` CHAR(45) NOT NULL,
  `telefoniNumber` CHAR(15) NOT NULL,
  `meiliAadress` TEXT NOT NULL,
  PRIMARY KEY (`idKohtunik`),
  INDEX `Kohtunik_eesnimi` (`eesnimi` ASC),
  INDEX `Kohtunik_perenimi` (`perenimi` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tennis`.`Turniir_has_Kohtunik` (
  `Turniir_idTurniir` INT NOT NULL,
  `Kohtunik_idKohtunik` INT NOT NULL,
  PRIMARY KEY (`Turniir_idTurniir`, `Kohtunik_idKohtunik`),
  INDEX `fk_Turniir_has_Kohtunik_Kohtunik1_idx` (`Kohtunik_idKohtunik` ASC),
  INDEX `fk_Turniir_has_Kohtunik_Turniir_idx` (`Turniir_idTurniir` ASC),
  CONSTRAINT `fk_Turniir_has_Kohtunik_Turniir`
    FOREIGN KEY (`Turniir_idTurniir`)
    REFERENCES `tennis`.`Turniir` (`idTurniir`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Turniir_has_Kohtunik_Kohtunik1`
    FOREIGN KEY (`Kohtunik_idKohtunik`)
    REFERENCES `tennis`.`Kohtunik` (`idKohtunik`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

START TRANSACTION;

INSERT INTO `tennis`.`Turniir` (`idTurniir`, `nimi`, `turniiriAlgus`, `turniiriLõpp`) VALUES (1, 'Välishooaja avaturniir 2010', '2010-05-30 12:00', '2010-05-30 22:00');

INSERT INTO `tennis`.`Kohtunik` (`idKohtunik`, `eesnimi`, `perenimi`, `telefoniNumber`, `meiliAadress`) VALUES (1, 'Kalmer', 'Piiskop', '5620 4556', 'kalmer@tennis24.ee');
INSERT INTO `tennis`.`Kohtunik` (`idKohtunik`, `eesnimi`, `perenimi`, `telefoniNumber`, `meiliAadress`) VALUES (2, 'Kirsi', 'Raudsepp', '5620 3394', 'kirsi.raudsepp@hot.ee');

INSERT INTO `tennis`.`Turniir_has_Kohtunik` (`Turniir_idTurniir`, `Kohtunik_idKohtunik`) VALUES (1, 1);
INSERT INTO `tennis`.`Turniir_has_Kohtunik` (`Turniir_idTurniir`, `Kohtunik_idKohtunik`) VALUES (1, 2);

COMMIT;

USE tennis;
INSERT INTO Kohtunik SET eesnimi = "Aleksander", perenimi = "Jürgens", telefoniNumber = "527 4146", meiliAadress = "aleksander@tennis.ee";
INSERT INTO Kohtunik SET eesnimi = "Taavi", perenimi = "Palu", telefoniNumber = "525 9991", meiliAadress = "palutaavi@hotmail.com";
INSERT INTO Kohtunik SET eesnimi = "Taavi", perenimi = "Treier", telefoniNumber = "5332 4884", meiliAadress = "taavi@tartutennisekool.ee";
INSERT INTO Turniir SET nimi = "Augustiunetuse tenniseturniir", turniiriAlgus = "2014-08-16 17:00", turniiriLõpp = "2014-08-16 21:30";
INSERT INTO Kohtunik SET eesnimi = "Toomas", perenimi = "Kuuda", telefoniNumber = "5646 0045", meiliAadress = "kati@vaasvaas.ee";
INSERT INTO Turniir_has_Kohtunik SET Turniir_idTurniir = 2, Kohtunik_idKohtunik = 6;

ALTER TABLE Turniir MODIFY turniiriAlgus DATETIME NOT NULL;

ALTER TABLE Turniir MODIFY turniiriLõpp DATETIME NOT NULL;

ALTER TABLE Turniir ADD COLUMN reglement TEXT NOT NULL;

CREATE TABLE ToimumisKoht (
idToimumisKoht INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nimi CHAR(45)
);

CREATE TABLE Turniir_has_ToimumisKoht (
idTurniir_has_ToimumisKoht INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
idTurniir INT(11) NOT NULL,
idToimumisKoht INT(11) NOT NULL
);

ALTER TABLE Turniir_has_ToimumisKoht ADD CONSTRAINT fromTurniirToTurniir_has_ToimumisKoht FOREIGN KEY (idTurniir) REFERENCES Turniir(idTurniir);

ALTER TABLE Turniir_has_ToimumisKoht ADD CONSTRAINT fromToimumisKohtToTurniir_has_ToimumisKoht FOREIGN KEY (idToimumisKoht) REFERENCES ToimumisKoht(idToimumisKoht);

INSERT INTO ToimumisKoht SET nimi = "Pärnu Kesklinna Tenniseklubi";

INSERT INTO Turniir_has_ToimumisKoht SET idTurniir = 2, idToimumisKoht = 1;

ALTER TABLE Turniir_has_ToimumisKoht DROP FOREIGN KEY fromToimumisKohtToTurniir_has_ToimumisKoht;

ALTER TABLE Turniir_has_ToimumisKoht ADD CONSTRAINT fromToimumisKohtToTurniir_has_ToimumisKoht FOREIGN KEY (idToimumisKoht) REFERENCES ToimumisKoht(idToimumisKoht) ON UPDATE CASCADE;

UPDATE ToimumisKoht SET idToimumisKoht = 10;
