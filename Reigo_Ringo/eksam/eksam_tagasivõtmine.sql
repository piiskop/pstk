
--Tõnni fail benefits.sql

DROP USER 'tnn'@'localhost';

DELETE FROM Plant;

DELETE FROM Culinary;

DELETE FROM Medical;

DELETE FROM Plant_has_Culinary;

DELETE FROM Plant_has_Medical;

DROP TABLE Plant;

DROP TABLE Culinary;

DROP TABLE Medical;

DROP TABLE Plant_has_Culinary;

DROP TABLE Plant_has_Medical;

DROP DATABASE benefits;
