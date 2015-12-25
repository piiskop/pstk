-- ANDMEBAASI LOOMINE

-- Loo andmebaas
CREATE DATABASE dokumendid CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Vali andmebaas
USE dokumendid;

-- KASUTAJA LOOMINE

-- Loo uus kasutaja
CREATE USER 'kallekusta'@'localhost' IDENTIFIED BY 'parool';

-- Õiguste andmine
GRANT ALL PRIVILEGES ON dokumendid.* TO 'kallekusta'@'localhost' WITH GRANT OPTION;

-- TABELITE JA SEOSTE LOOMINE

-- Loo tabel `tegelane`
CREATE TABLE `tegelane` (`idtegelane` INT AUTO_INCREMENT primary key,`amet` VARCHAR(45));

-- Loo tabel `dokument`
CREATE TABLE `dokument` (`iddokument` INT AUTO_INCREMENT PRIMARY KEY,`nimetus` VARCHAR(45));

-- Loo tabel `varv`
CREATE TABLE `varv` (`idvarv` INT AUTO_INCREMENT PRIMARY KEY,`varvus` VARCHAR(20));

-- Loo tabel `tegelase_dokumendi_varv`
CREATE TABLE `tegelase_dokumendi_varv` (
  `id_koos` INT NOT NULL,
  `tegelane_idtegelane` INT NOT NULL,
  `dokument_iddokument` INT NOT NULL,
  `varv_idvarv` INT NOT NULL,
  INDEX `fk_tegelane_has_dokument_dokument1_idx` (`dokument_iddokument` ASC),
  INDEX `fk_tegelane_has_dokument_tegelane_idx` (`tegelane_idtegelane` ASC),
  INDEX `fk_tegelane_has_dokument_varv1_idx` (`varv_idvarv` ASC),
  PRIMARY KEY (`id_koos`),
  CONSTRAINT `fk_tegelane_has_dokument_tegelane`
    FOREIGN KEY (`tegelane_idtegelane`)
    REFERENCES `dokumendid`.`tegelane` (`idtegelane`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tegelane_has_dokument_dokument1`
    FOREIGN KEY (`dokument_iddokument`)
    REFERENCES `dokumendid`.`dokument` (`iddokument`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tegelane_has_dokument_varv1`
    FOREIGN KEY (`varv_idvarv`)
    REFERENCES `dokumendid`.`varv` (`idvarv`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION);

-- ANDMETE SISESTAMINE

-- Andmed tabelile `tegelane`
INSERT INTO `tegelane` VALUES (1, 'Politseinik');
INSERT INTO `tegelane` VALUES (2, 'Minister');
INSERT INTO `tegelane` VALUES (3, 'Arst');
INSERT INTO `tegelane` VALUES (4, 'Autojuht');

-- Andmed tabelile `dokument`
INSERT INTO `dokument` VALUES (1, 'Leping');
INSERT INTO `dokument` VALUES (2, 'Avaldus');
INSERT INTO `dokument` VALUES (3, 'Kiirus Trahv');
INSERT INTO `dokument` VALUES (4, 'Tsekk');

-- Andmed tabelile `varv`
INSERT INTO `varv` VALUES (1, 'sinine');
INSERT INTO `varv` VALUES (2, 'punane');
INSERT INTO `varv` VALUES (3, 'kollane');
INSERT INTO `varv` VALUES (4, 'must');

-- Andmed tabelile `tegelase_dokumendi_varv`
INSERT INTO `tegelase_dokumendi_varv` VALUES (1, 1, 2, 3);
INSERT INTO `tegelase_dokumendi_varv` VALUES (2, 2, 1, 4);
INSERT INTO `tegelase_dokumendi_varv` VALUES (3, 3, 4, 2);
INSERT INTO `tegelase_dokumendi_varv` VALUES (4, 1, 3, 1);

-- PÄRINGUD
-- "Mõtestatud" päringud : LEFT JOIN, GROUP BY, HAVING, ORDER BY, IS NOT NULL, BETWEEN, IN, LIKE, LIMIT
-- WHERE
update dokument set nimetus="Kiirustrahv" where iddokument=3;
-- LIMIT
update tegelase_dokumendi_varv set dokument_iddokument=3 limit 2;
-- DISTINCT
SELECT DISTINCT dokument_iddokument FROM tegelase_dokumendi_varv;
-- JOIN, ORDER BY, HAVING
SELECT tegelase_dokumendi_varv.id_koos, tegelane.amet, dokument.nimetus, varv.varvus 
from tegelase_dokumendi_varv JOIN dokument ON iddokument=dokument_iddokument 
JOIN varv ON idvarv=varv_idvarv JOIN tegelane ON idtegelane=tegelane_idtegelane 
HAVING amet IN ('Politseinik', 'Minister')
ORDER BY amet;
-- LEFT JOIN, GROUP BY
SELECT amet , nimetus 
FROM tegelase_dokumendi_varv 
JOIN tegelane on tegelase_dokumendi_varv.tegelane_idtegelane=tegelane.idtegelane  
LEFT JOIN dokument ON tegelase_dokumendi_varv.dokument_iddokument=dokument.nimetus 
GROUP BY tegelane_idtegelane;
-- UNION
SELECT amet FROM tegelane UNION SELECT nimetus FROM dokument;
-- DELETE
DELETE 
FROM tegelase_dokumendi_varv WHERE id_koos=4;

BEGIN;
DELETE FROM varv where idvarv=1; 
HAVING pealkiri LIKE "%i%";
alterTable koostisosad modify idkoostisosad int not null;
drop primary key;
kustuta ennem ära vahetabelist kui on on delete restrict!
ROLLBACK;

