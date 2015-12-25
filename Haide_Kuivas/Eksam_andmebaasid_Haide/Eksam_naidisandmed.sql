
-- Create database
CREATE DATABASE school
	CHARACTER SET utf8
	COLLATE utf8_general_ci;
	

-- Select created database
USE school;


-- Create a new user
CREATE USER 'haide_user'@'localhost'
	IDENTIFIED BY 'password';


-- Grant new user rights to database
GRANT ALL PRIVILEGES ON school.*
	TO 'haide_user'@'localhost'
	WITH GRANT OPTION;
	

	
-- näidisandmed
USE mydb;
BEGIN;
INSERT into klass (Klass) values (1),(2),(3);

INSERT into Õpilane (eesnimi, perekonnanimi, klass_idklass)
VALUES  ("haide", "kuivas", 1), 
("tõnn", "vaher", 1), 
("tambet","song",2), 
("mihkel", "siim",3);

INSERT into  õpetaja (nimi) values ("Mati"),("Kati"),("Toomas");

INSERT into valikaine (valikaine_nimi, õpetaja_idõpetaja) values ("puhkpill", 1), ("male", 2) , ("laulmine",3);

INSERT into õpilane_has_valikaine VALUES (1,2), (2,2),(3,1),(4,1),(4,3);

COMMIT;

UPDATE õpetaja SET nimi="Piret" WHERE nimi="Mati" LIMIT 1;

select klass, klass.Klass from õpilane inner join klass on klass.idklass=õpilane.klass_idklass;


SELECT * FROM Klass
ORDER BY ASC;

SELECT eesnimi
FROM Õpilane
WHERE eesnimi BETWEEN value1 AND value2;

like SELECT perekonnanimi
FROM Õpilane
WHERE perekonnanimi LIKE pattern;


drop database mydb;


