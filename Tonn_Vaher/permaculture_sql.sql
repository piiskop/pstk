-- -----------------------------------------------------
-- 2.Delete database test
-- -----------------------------------------------------
DROP DATABASE IF EXISTS test;

-- -----------------------------------------------------
-- 3.Give all privileges to user plant
-- -----------------------------------------------------
GRANT ALL PRIVILEGES ON plant.* TO plant@localhost;

-- -----------------------------------------------------
-- 4.Remove all privileges FROM user plant
-- -----------------------------------------------------
REVOKE ALL ON plant.* FROM plant@localhost;

-- -----------------------------------------------------
-- 5.Remove primary key with auto_increment
-- -----------------------------------------------------
-- Remove foreign key constraint
ALTER TABLE plantClimates drop foreign key fk_plant_has_climates_climates1;
-- Remove auto_increment
ALTER TABLE climates MODIFY idClimate INT(11) UNSIGNED NOT NULL;
-- Remove primary key
ALTER TABLE climates drop primary key;
 
-- -----------------------------------------------------
-- 6.Remove table plantClimates
-- -----------------------------------------------------
DROP TABLE plantClimates;

-- -----------------------------------------------------
-- 7,8.Data deleting and taking back
-- -----------------------------------------------------
-- Start transaction
BEGIN;
# Kustutab tabeli andmed
DELETE FROM climates;
/*
Take back previous actions;
*/
ROLLBACK;

-- using initial sql model

-- -----------------------------------------------------
-- 9.16 Change climate cold to Cold
-- -----------------------------------------------------
UPDATE climates SET climate = "Cold" LIMIT 1;

-- -----------------------------------------------------
-- 9.17 SELECT querys
-- -----------------------------------------------------

-- Plant with its climate
SELECT plant.name, climates.climate 
FROM plant JOIN plantClimates ON 
	plantClimates.plant_idplant = plant.idPlant JOIN 
	climates ON climates.idClimate = plantClimates.climates_idClimate;
-- Climates with the amount of plants growing there atleast 1 ordered by plant count
SELECT climates.climate,count(plantClimates.climates_idClimate) AS plant_count 
FROM climates JOIN plantClimates  
	ON plantClimates.climates_idClimate = climates.idClimate GROUP BY climate
	HAVING plant_count >= 1 ORDER BY plant_count ASC;
-- Climates with the amount of plants growing there is between 2 and 3
SELECT climates.climate,count(plantClimates.climates_idClimate) AS plant_count 
FROM climates JOIN plantClimates  
	ON plantClimates.climates_idClimate = climates.idClimate GROUP BY climate
	HAVING plant_count BETWEEN 2 AND 3;
-- Plants with planting time in april or september
SELECT plant.name, plantingTimes.plantingTime 
FROM plant JOIN plantPlantingTimes 
	ON plant_idPlant = plant.idPlant JOIN plantingTimes 
	ON idPlantingTime = plantPlantingTimes.plantingTimes_idPlantingTime 
	GROUP BY plantingTime HAVING plantingTime IN ('april', 'september');	
-- Plants with unknown edibility
SELECT name FROM plant WHERE edible IS NULL;
-- First plant that starts with C
SELECT name FROM plant WHERE name LIKE "C%" limit 1;
-- Plants and planting times
SELECT name FROM plant UNION SELECT plantingTime FROM plantingTimes;
-- -----------------------------------------------------
-- 9.18 Delete with/without transaction
-- -----------------------------------------------------
-- Without (remove plant currant)
DELETE FROM plantClimates WHERE plant_idPlant = 6;
DELETE FROM plantPlantingTimes WHERE plant_idPlant = 6;
DELETE FROM plant WHERE plant.idPlant = 6;

-- With (try to remove plant Rose)
BEGIN;
DELETE FROM plantClimates WHERE plant_idPlant = 6;
DELETE FROM plantPlantingTimes WHERE plant_idPlant = 6;
DELETE FROM plant WHERE plant.idPlant = 6;
ROLLBACK;