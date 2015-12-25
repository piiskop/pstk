-- Create tables

CREATE TABLE students (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(20) NOT NULL,
	lastName VARCHAR(20) NOT NULL
);

CREATE TABLE scores (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	subject ENUM('Matemaatika', 'Keemia', 'Kirjandus', 'Eesti keel') NOT NULL,
	score TINYINT(3) NOT NULL,
	student_id INT UNSIGNED,
	FOREIGN KEY (student_id) REFERENCES students(id)
		ON DELETE RESTRICT
);

-- Insert rows
INSERT INTO students
	(firstName, lastName)
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
	
INSERT INTO scores
	(subject, score, student_id)
VALUES
	('Keemia', 20, 2),
	('Keemia', 95, 1),
	('Keemia', 50, 4),
	('Matemaatika', 80, 2),
	('Eesti keel', 50, 2),
	('Kirjandus', 100, 8),
	('Eesti keel', 95, 1),
	('Kirjandus', 100, 9),
	('Matemaatika', 45, NULL),
	('Keemia', 95, NULL);

-- Leiame kõik Meeri Lamba tehtud tööd
SELECT students.firstName, students.lastName, scores.subject, scores.score
	FROM students
	JOIN scores on scores.student_id = students.id
WHERE students.firstName = 'Meeri' AND students.lastName = 'Lammas';