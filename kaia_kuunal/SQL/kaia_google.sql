-- "Nimetada kooli lippuriks 2008/2009 õppeaastal Paul-Matis Türnpuu ning lippuri assistentideks Kaia Küünal ja Laura-Liis Pärna."

CREATE DATABASE IF NOT EXISTS kaia_google
	CHARACTER SET utf8
	COLLATE utf8_general_ci;

USE kaia_google;

CREATE TABLE students (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name CHAR(45) NOT NULL,
	last_name CHAR(45) NOT NULL,
	INDEX idx_students_first_name (first_name),
	INDEX idx_students_last_name (last_name)
);

CREATE TABLE standard_bearers (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	student_id INT UNSIGNED NOT NULL,
	start_year YEAR NOT NULL,
	end_year YEAR NOT NULL,
	UNIQUE INDEX uidx_bearers_start (start_year),
	CONSTRAINT fk_bearers_student
		FOREIGN KEY (student_id)
		REFERENCES students(id)
		ON DELETE RESTRICT
		ON UPDATE CASCADE
);

CREATE TABLE assistants (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	student_id INT UNSIGNED NOT NULL,
	standard_bearer_id INT UNSIGNED NOT NULL,
	CONSTRAINT fk_assistants_student
		FOREIGN KEY (student_id)
		REFERENCES students(id)
		ON DELETE RESTRICT
		ON UPDATE CASCADE,
	CONSTRAINT fk_assistants_bearer
		FOREIGN KEY (standard_bearer_id)
		REFERENCES standard_bearers(id)
		ON DELETE RESTRICT
		ON UPDATE CASCADE
);

INSERT INTO students 
	(first_name, last_name)
VALUES
	('Paul-Matis', 'Türnpuu'),
	('Kaia', 'Küünal'),
	('Laura-Liis', 'Pärna');

INSERT INTO standard_bearers
	(student_id, start_year, end_year)
VALUES
	(1, 2008, 2009);

INSERT INTO assistants
	(student_id, standard_bearer_id)
VALUES
	(2, 1),
	(3, 1);

SELECT
	CONCAT(start_year, '/', end_year) AS Term,
	CONCAT(bearer.first_name, ' ', bearer.last_name) AS Bearer,
	CONCAT(assistant.first_name, ' ', assistant.last_name) AS Assistant
FROM standard_bearers
	JOIN students AS bearer ON standard_bearers.student_id = bearer.id
	JOIN assistants ON assistants.standard_bearer_id = bearer.id
	JOIN students AS assistant ON assistant.id = assistants.student_id;