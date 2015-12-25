/*Tekitan kasutaja*/
CREATE USER 'imelik'@'localhost' IDENTIFIED by 'pass';
/*Annan õigused*/
grant all privileges on eksam.* to 'imelik'@'localhost' identified by 'pass';

/*Loon andmebaasi nimega eksam*/
CREATE DATABASE eksam CHARACTER SET UTF8;

/*Kasuta andmebaasi eksam*/
USE eksam;

/*Loon tabeli taimed*/
CREATE TABLE taimed(
taimed_id INT NOT NULL UNIQUE AUTO_INCREMENT,
taime_nim VARCHAR(100) NOT NULL,
ladina_nim VARCHAR(100) NOT NULL,
PRIMARY KEY(`taimed_id`));

/*Lisan tabelisse väärtused*/
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Punane Leeder','Sambucus racemosa');
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Harilik Toomingas','Padus avium');
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Kibuvits','Rosa');
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Maasikas','Fragaria');
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Kirss','Cerasus Mill');
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Ploom','Prunus domestica');
INSERT INTO taimed (taime_nim, ladina_nim) VALUES ('Vaarikas','Rubus idaeus');

/*Loon tabeli kasvukohad*/
CREATE TABLE kasvukohad(
kasvukohad_id INT NOT NULL UNIQUE AUTO_INCREMENT,
kasvukoht VARCHAR(45),
PRIMARY KEY(`kasvukohad_id`)
);
/*Lisan tabelisse väärtused*/
INSERT INTO kasvukohad (kasvukoht) VALUES ('Metsaalused');
INSERT INTO kasvukohad (kasvukoht) VALUES ('Mahajäetud varemed');
INSERT INTO kasvukohad (kasvukoht) VALUES ('Kaasik');
INSERT INTO kasvukohad (kasvukoht) VALUES ('Kuusik');
INSERT INTO kasvukohad (kasvukoht) VALUES ('Raba/soo');
INSERT INTO kasvukohad (kasvukoht) VALUES ('Koduaed');

/*Tekitan vahetabeli taimed_kasvukohad ja loon seose mitu mitmele*/
CREATE TABLE taimed_kasvukohad(
koos_id INT NOT NULL UNIQUE AUTO_INCREMENT,
taimed_id INT,
kasvukohad_id INT,
PRIMARY KEY (`koos_id`),
FOREIGN KEY (`taimed_id`) REFERENCES taimed(`taimed_id`) 
ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`kasvukohad_id`) REFERENCES kasvukohad(`kasvukohad_id`)
ON DELETE RESTRICT ON UPDATE CASCADE
);

/*Lisan tabelisse väärtused*/
INSERT INTO taimed_kasvukohad (taimed_id, kasvukohad_id) VALUES (1,2);
INSERT INTO taimed_kasvukohad (taimed_id, kasvukohad_id) VALUES (2,2);
INSERT INTO taimed_kasvukohad (taimed_id, kasvukohad_id) VALUES (3,2);
INSERT INTO taimed_kasvukohad (taimed_id, kasvukohad_id) VALUES (4,6);
INSERT INTO taimed_kasvukohad (taimed_id, kasvukohad_id) VALUES (5,2);
INSERT INTO taimed_kasvukohad (taimed_id, kasvukohad_id) VALUES (6,6);

/*Tekitan tabeli omadused*/
CREATE TABLE omadused(
omadused_id INT NOT NULL UNIQUE AUTO_INCREMENT,
maitseomadus VARCHAR(45),
pikkus INT(3),
lehe_kuju VARCHAR(45),
kroonlehe_varv VARCHAR(45),
PRIMARY KEY (`omadused_id`)
);

/*Lisan tabelisse väärtused*/
INSERT INTO omadused (maitseomadus, pikkus, lehe_kuju, kroonlehe_varv) VALUES ('magus',2,'piklik','valge');
INSERT INTO omadused (maitseomadus, pikkus, lehe_kuju, kroonlehe_varv) VALUES ('Mõrkjas',5,'piklik','valge');
INSERT INTO omadused (maitseomadus, pikkus, lehe_kuju, kroonlehe_varv) VALUES ('puine',1,'sakiline','roosa');
INSERT INTO omadused (maitseomadus, pikkus, lehe_kuju, kroonlehe_varv) VALUES ('magus',1,'sakiline','valge');
INSERT INTO omadused (maitseomadus, pikkus, lehe_kuju, kroonlehe_varv) VALUES ('magus',1,'ümar','valge');
INSERT INTO omadused (maitseomadus, pikkus, lehe_kuju, kroonlehe_varv) VALUES ('magus',1,'ümar','valge');

/*Tekitan vahe tabeli taimed_omadused ja loon seose mitu mitmele.*/
CREATE TABLE taimed_omadused(
id INT NOT NULL UNIQUE AUTO_INCREMENT,
taimed_id INT,
omadused_id INT,
PRIMARY KEY (`id`),
FOREIGN KEY (`taimed_id`) REFERENCES taimed(`taimed_id`)
ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`omadused_id`) REFERENCES omadused(`omadused_id`)
ON DELETE RESTRICT ON UPDATE CASCADE
);

/*Lisan tabelisse väärtused*/
INSERT INTO taimed_omadused (taimed_id, omadused_id) VALUES (1,1);
INSERT INTO taimed_omadused (taimed_id, omadused_id) VALUES (2,2);
INSERT INTO taimed_omadused (taimed_id, omadused_id) VALUES (3,3);
INSERT INTO taimed_omadused (taimed_id, omadused_id) VALUES (4,4);
INSERT INTO taimed_omadused (taimed_id, omadused_id) VALUES (5,5);
INSERT INTO taimed_omadused (taimed_id, omadused_id) VALUES (6,6);

/*Lisan tabelisse omadused tulba yhik.*/
ALTER TABLE omadused ADD COLUMN (yhik char(1));
/*Lisan uude lahtrisse */
UPDATE omadused SET yhik = 'm' WHERE yhik IS NULL LIMIT 6;

/*Kuvan kõik taime nimetused mis sisaldavad tähekombinatsiooni 'kas' ja järjestan need tähestikule vastupidises järjekorras.*/
SELECT DISTINCT taime_nim FROM taimed WHERE taime_nim LIKE '%kas' ORDER BY taimed_id DESC LIMIT 0,3;
/*Kuvan kõik taimed mille sõna ei sisalda tähekombinatsiooni 'kas' järjestan need tähestikulises järjekorras maximaalselt 6 tulemust, alates nullist.*/
SELECT DISTINCT taime_nim FROM taimed WHERE taime_nim NOT LIKE '%kas' ORDER BY taimed_id ASC LIMIT 0,6;

/*Kuvan kõikide taimede nimetused ja nende kasvukohad.*/
SELECT taimed.taime_nim, kasvukohad.kasvukoht
FROM taimed_kasvukohad
INNER JOIN taimed
ON taimed_kasvukohad.taimed_id=taimed.taimed_id
INNER JOIN kasvukohad
ON taimed_kasvukohad.kasvukohad_id=kasvukohad.kasvukohad_id;

/*Kuvan kõikide taimede nimetused ja nende omadused.*/
SELECT taimed.taime_nim, omadused.maitseomadus, omadused.pikkus, omadused.lehe_kuju, omadused.kroonlehe_varv
FROM taimed_omadused
INNER JOIN taimed
ON taimed_omadused.taimed_id=taimed.taimed_id
INNER JOIN omadused
ON taimed_omadused.omadused_id=omadused.omadused_id;

/*Päring LEFT JOIN-ga + GROU BY.*/
SELECT taimed.taime_nim, kasvukohad.kasvukoht
FROM taimed_kasvukohad
LEFT JOIN taimed
ON taimed_kasvukohad.taimed_id = taimed.taimed_id
LEFT JOIN kasvukohad
ON taimed_kasvukohad.kasvukohad_id = kasvukohad.kasvukohad_id
GROUP BY kasvukoht;

 
/*Päring HAVING*/

/*Päring UNION*/
SELECT taime_nim FROM taimed
UNION
SELECT maitseomadus FROM omadused;

/*IN või NOT IN, Kuvan kõik taimed mis kasvavad mahajäetud varemetes.*/
SELECT taimed.taime_nim, kasvukohad.kasvukoht
FROM taimed_kasvukohad
LEFT JOIN taimed
ON taimed_kasvukohad.taimed_id = taimed.taimed_id
LEFT JOIN kasvukohad
ON taimed_kasvukohad.kasvukohad_id = kasvukohad.kasvukohad_id
WHERE kasvukoht IN ('Mahajäetud varemed');
/*statistikatalitlus, palju on mitte tühjasid välju tulbaas*/
SELECT count(taime_nim) FROM taimed;

/*Transaktsioon*/
START TRANSACTION;
DELETE FROM kasvukohad WHERE kasvukoht = 'kaasik' LIMIT 2;
ROLLBACK;

/*Kustutamine*/
DELETE FROM kasvukohad WHERE kasvukoht = 'kuusik' LIMIT 2;

/*IS NULL*/
SELECT maitseomadus FROM omadused WHERE yhik IS NULL;

/*Kuvan kõik taimed mille pikkus on vahemikus 1 ja 2.*/
SELECT taimed.taime_nim, omadused.pikkus
FROM taimed_omadused
INNER JOIN taimed
ON taimed_omadused.taimed_id = taimed.taimed_id
INNER JOIN omadused
ON taimed_omadused.omadused_id = omadused.omadused_id
WHERE pikkus BETWEEN 1 AND 2;