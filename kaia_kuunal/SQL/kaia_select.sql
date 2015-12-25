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

-- All women born in or after 1980
SELECT first_name, last_name, YEAR(dob) as year_born
	FROM people
	WHERE gender = 'female'
	AND YEAR(dob) >= 1980;

-- Everyone weighing less than 100 kg and over 180 cm tall
SELECT first_name, last_name, weight_kg, height_cm
	FROM people
	WHERE weight_kg < 100
	AND height_cm > 180;

/*
 * All men weighing between 90 and 100 kg,
 * sorted by last name
 */
SELECT first_name, last_name, weight_kg
	FROM people
	WHERE gender = 'male'
	AND weight_kg BETWEEN 90 AND 100
	ORDER BY last_name;

-- The person last in a list sorted alphabetically by first name
SELECT first_name, last_name
	FROM people
	ORDER BY first_name DESC
	LIMIT 1;
	
-- Number of gender-neutral people whose last name starts with 'M'
SELECT COUNT(*)
	FROM people
	WHERE gender = 'neutral'
	AND last_name LIKE 'M%';

-- All women not born in December
SELECT first_name, last_name, MONTH(dob) as month_born
	FROM people
	WHERE MONTH(dob) != 12
	ORDER BY MONTH(dob) DESC;

-- All men and women who have a description
SELECT first_name, last_name, description
	FROM people
	WHERE description IS NOT NULL
	AND (gender = 'male' OR gender = 'female');

/* Everyone without a description
 * born in 1990, 1991, or 1993
 * etc...
 */
SELECT first_name, last_name, YEAR(dob) AS year_born
	FROM people
	WHERE description IS NULL
	AND YEAR(dob) IN (1990, 1991, 1993)
	AND last_name NOT LIKE '_oo_';

-- Everyone whose last name doesn't start with a vowel	
SELECT first_name, last_name
	FROM people
	WHERE LOWER(last_name) REGEXP '^[^aeiouõäöü]';
	
-- Total weight grouped by gender where total weight is at least 150
SELECT gender, SUM(weight_kg) AS total_weight
	FROM people
	GROUP BY gender
	HAVING total_weight >= 150;

