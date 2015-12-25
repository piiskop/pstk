
CREATE TABLE joins_2 (
  joins_2_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  kus VARCHAR(100) NOT NULL
);

INSERT INTO joins_2(kus) VALUES 
  ('kodus'),
  ('koolis'),
  ('poes'),
  ('tööl');

CREATE TABLE joins_1 (
  joins_1_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  joins_2_id INT UNSIGNED NOT NULL,
  kes VARCHAR(100) NOT NULL,  
  PRIMARY KEY (joins_1_id), 
  CONSTRAINT takistus
    FOREIGN KEY (joins_2_id)
    REFERENCES andmebaas.joins_2 (joins_2_id)
);

INSERT INTO joins_1(kes, joins_2_id) VALUES 
  ('Mati', 1),
  ('Kati', 3),
  ('Mari', 1),
  ('Vallo', 4),
  ('Vaino', 3),
  ('Aino', 2),
  ('Esta', 2),
  ('Endel', 1),
  ('Andrus', 4),
  ('Mati', 4);

SELECT joins_1.kes, joins_2.kus
FROM joins_2
INNER JOIN joins_1
ON joins_2.joins_2_id=joins_1.joins_2_id;

ALTER TABLE joins_1 ADD kui_palju INT;
	
UPDATE joins_1 SET kui_palju=5 WHERE kes='Kati';
	
SELECT joins_2.kus, joins_1.kui_palju
FROM joins_1
JOIN joins_2
ON joins_1.joins_2_id=joins_2.joins_2_id;

ALTER TABLE joins_2 ADD midagi INT;

ALTER TABLE joins_1 MODIFY kes VARCHAR(100);

