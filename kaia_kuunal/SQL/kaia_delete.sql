-- Create table
CREATE TABLE people (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(20) NOT NULL,
	dob DATE NOT NULL,
	gender ENUM('male','female','neutral') NOT NULL,
	height_cm TINYINT(3) UNSIGNED NOT NULL,
	weight_kg DECIMAL(4,1) UNSIGNED NOT NULL,
	description TEXT,
	created DATETIME NOT NULL DEFAULT NOW()
);

-- Insert 10 rows
INSERT INTO people 
		(first_name, last_name, dob, gender, height_cm, weight_kg, description)
	VALUES
		('Aadam', 'Õun', '1985-01-29', 'male', 211, 140.5, NULL),
		('Meeri', 'Lammas', '1987-12-23', 'female', 165, 56.0, 'Kõlab tuttavalt'),
		('Mati', 'Mets', '1976-10-02', 'male', 187, 91.2, NULL),
		('Kerli', 'Koor', '1990-03-20', 'neutral', 155, 49.0, NULL),
		('Paul', 'Saabas', '1991-08-04', 'male', 190, 98.5, 'Täitsa normaalne'),
		('Veronika', 'Värk', '1973-06-04', 'female', 171, 65.0, NULL),
		('Martin', 'Mart', '1963-01-21', 'male', 190, 97.5, 'Pikk keskealine'),
		('Aita-Leida', 'Kuusepuu', '1953-11-02', 'female', 166, 58.6, NULL),
		('Jüri', 'Mänd', '1993-02-20', 'neutral', 187, 72.0, NULL),
		('Varvara', 'Jõgi', '1991-12-02', 'female', 155, 50.1, NULL);

-- Delete max 5 people born in 1991
DELETE FROM people
	WHERE YEAR(dob) = 1991
	LIMIT 5;

-- Delete everyone whose last name ends with 's' or 'd'
DELETE FROM people
	WHERE last_name REGEXP '[sd]$';

-- Delete everyone who isn't gender neutral
DELETE FROM people
	WHERE gender != 'neutral';