-- Save data for game

CREATE TABLE save (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `save_location` ENUM('alley','backyard','garage','shop') NULL,
  `stage` SMALLINT(8) UNSIGNED NOT NULL,
  `inv_items` TEXT NULL,
  `points` FLOAT(5,2) NULL,
  `last_save` TIMESTAMP NOT NULL DEFAULT now(),
  `acc_created` DATETIME NOT NULL DEFAULT now(),
  `deleted` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`));
  
-- Insert data
  
INSERT INTO save
		(name, save_location, stage, inv_items, points,deleted)
	VALUES
		('Monkey94', 'alley', '23546', "string, hammer", 134.12,'0'),
		('Troll', 'backyard', '65535', "gum", 534.12,'0'),
		('BumBum', 'garage', '5345', "nails", 111.10,'0'),
		('Crazeh', 'shop', '35355', "saw, hammer", 999.99,'0'),
		('HoleInThe', 'garage', '45322', "saw", 422.32,'0');