
CREATE DATABASE growing_reigo CHARACTER SET utf8 COLLATE utf8_general_ci;

USE growing_reigo;

CREATE USER 'minginimi'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON growing_reigo.* TO 'minginimi'@'localhost';

CREATE TABLE growing (
  id_growing INT NOT NULL,
  name VARCHAR(20) NOT NULL,
  grows_where SET('indoors', 'outdoors') NOT NULL,
  is_edible BOOL NOT NULL,
  is_suitable_houseplan BOOL NOT NULL,
  PRIMARY KEY (id_growing),
  INDEX growing_name_index (name))
ENGINE = InnoDB;

CREATE TABLE grows_from (
  id_from INT NOT NULL,
  species VARCHAR(40) NOT NULL,
  from_this SET('seeds', 'cuttings') NOT NULL,
  level_of_difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
  PRIMARY KEY (id_from),
  INDEX species_index (species))
ENGINE = InnoDB;

CREATE TABLE growing_has_grows_from (
  growing_id_growing INT NOT NULL,
  grows_from_id_from INT NOT NULL,
  INDEX fk_growing_has_grows_from_from1_idx (grows_from_id_from),
  INDEX fk_growing_has_grows_from_growing_idx (growing_id_growing),
  CONSTRAINT fk_growing_has_grows_from_growing
    FOREIGN KEY (growing_id_growing)
    REFERENCES growing (id_growing)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT fk_growing_has_grows_from_from1
    FOREIGN KEY (grows_from_id_from)
    REFERENCES grows_from (id_from)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO growing (id_growing, name, grows_where, is_edible, is_suitable_houseplan)
VALUES  (1, 'sidrun', 'indoors', true, true),
		(2, 'kapsas', 'indoors', true, true),
		(3, 'melon', 'indoors', false, true),
		(4, 'õun', 'outdoors', false, true);

INSERT INTO grows_from (id_from, species, from_this, level_of_difficulty)
VALUES  (1, 'madrun', 'seeds,cuttings', 'easy'),
		(2, 'kahukas', 'seeds', 'medium'),
		(3, 'mahane', 'cuttings', 'hard'),
		(4, 'sibul', 'seeds', 'easy');

INSERT INTO growing_has_grows_from (growing_id_growing, grows_from_id_from)
VALUES (1, 1), (1, 2), (2, 3), (4, 4);

UPDATE grows_from SET level_of_difficulty='medium' WHERE level_of_difficulty='easy' LIMIT 1;

-- mitu unikaalset asja kasvatab
SELECT COUNT(DISTINCT growing_id_growing) FROM growing_has_grows_from;

-- selle nimi mida kasvatan ja mis liigid sel on
SELECT growing.name, grows_from.species FROM grows_from
JOIN growing_has_grows_from
ON grows_from.id_from=growing_has_grows_from.grows_from_id_from
JOIN growing
ON growing_has_grows_from.growing_id_growing=growing.id_growing;

SELECT grows_from.species AS liik, growing.name AS nimetus FROM grows_from
JOIN growing_has_grows_from
ON grows_from.id_from=growing_has_grows_from.grows_from_id_from
JOIN growing
ON growing_has_grows_from.growing_id_growing=growing.id_growing
GROUP BY liik;

-- valida see millel on rohkem kui 1 liik
SELECT growing_id_growing, COUNT(grows_from_id_from) AS arv
FROM growing_has_grows_from
GROUP BY growing_id_growing
HAVING arv > 1;

SELECT growing.name, COUNT(grows_from_id_from) AS arv
FROM growing_has_grows_from
JOIN growing
ON growing_has_grows_from.growing_id_growing=growing.id_growing
GROUP BY growing_has_grows_from.growing_id_growing
HAVING arv > 1;

-- sorteerib kasvatamise raskuse järgi alustades kergeimast
SELECT species, level_of_difficulty FROM grows_from ORDER BY level_of_difficulty;

-- liikide nimed ja nendest kasvavate asjade nimed üheskoos tähestikulises järjekorras
SELECT name FROM growing UNION SELECT species FROM grows_from ORDER BY name;

-- nimi algab s tähega
SELECT name FROM growing WHERE name LIKE 's%';

-- kuvab selle mille id 2 ja 3 vahel
SELECT id_from, species FROM grows_from WHERE id_from BETWEEN 2 AND 3;

-- kuvab selle mille id on 1 ja 4
SELECT id_from, species FROM grows_from WHERE id_from IN (1, 4);

-- kevab kõik kus name not null
SELECT * FROM growing WHERE name IS NOT NULL;

-- vaib kaks pärast esimest
SELECT * FROM growing LIMIT 1, 2;

-- kustutab selle kus id on 1
DELETE FROM growing_has_grows_from WHERE grows_from_id_from=1;

BEGIN;
DELETE FROM grows_from WHERE id_from=1;
ROLLBACK;
