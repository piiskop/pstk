-- Create table
CREATE TABLE people (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(20) NOT NULL
);

-- Insert 10 rows
INSERT INTO people 
		(first_name, last_name)
	VALUES
		('Aadam', 'Õun'),
		('Meeri', 'Lammas'),
		('Mati', 'Mets'),
		('Kerli', 'Koor'),
		('Paul', 'Saabas'),
		('Veronika', 'Värk'),
		('Martin', 'Mart'),
		('Aita-Leida', 'Kuusepuu'),
		('Jüri', 'Mänd'),
		('Varvara', 'Jõgi');

-- Change name for first person whose first name starts with A
UPDATE people
	SET first_name = 'Eeva',
	last_name = 'Madu'
	WHERE first_name LIKE 'A%'
	LIMIT 1;