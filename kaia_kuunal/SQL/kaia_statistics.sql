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

-- Average weight for genders, given it's at least 60 kg
SELECT gender, AVG(weight_kg) AS avg_weight
	FROM people
	GROUP BY gender
	HAVING avg_weight >= 60;

-- Height of tallest woman
SELECT MAX(height_cm) AS max_height
	FROM people
	WHERE gender = 'female';

-- Birthdate of oldest man
SELECT MIN(dob) AS min_dob
	FROM people
	WHERE gender = 'male';

-- Count people of different genders in table
SELECT gender, COUNT(*) as number_entries
	FROM people
	GROUP BY gender;

-- Number of different heights based on birth year
SELECT YEAR(dob) AS birthyear, COUNT(DISTINCT height_cm) as different_heights
	FROM people
	GROUP BY YEAR(dob);
	
-- Combined weight, stddev height, avg birthyear - by gender
SELECT
		gender,
		SUM(weight_kg) AS combined_weight,
		FORMAT(STD(height_cm), 2) AS stddev_height,
		ROUND(AVG(YEAR(dob))) AS avg_birthyear
	FROM people
	GROUP BY gender;