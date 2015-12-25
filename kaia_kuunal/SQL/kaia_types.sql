-- Create table `students`:
CREATE TABLE students (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(20) NOT NULL,
	last_name CHAR(20) NOT NULL,
	dob DATE NOT NULL,
	gpa FLOAT (3,2) NOT NULL,
	tests_taken SMALLINT(4) NOT NULL,
	has_graduated BOOL NOT NULL DEFAULT FALSE,
	comments TEXT,
	eye_color ENUM('brown', 'green', 'blue', 'gray'),
	hobbies SET('singing','dancing','writing','hiking','cooking','knitting'),
	time_born TIME,
	created DATETIME NOT NULL DEFAULT NOW(),
	s_timestamp TIMESTAMP NOT NULL DEFAULT NOW()
);

-- Insert 10 rows:
INSERT INTO students
		(first_name, last_name, dob, gpa, tests_taken,
		has_graduated, comments, eye_color, hobbies, time_born)
	VALUES
		('Aadam', 'Õun', '1985-01-29', 4.32, 44,
			FALSE, NULL, 'brown', 'singing,dancing,knitting', '21:29:12'),
		('Meeri', 'Lammas', '1987-12-23', 3.94, 12,
			FALSE, 'Käitumisraskused.', 'blue', NULL, '13:12:00'),
		('Mati', 'Mets', '1976-10-02', 3.00, 439,
			TRUE, 'Täitsa tavaline jüts', 'gray', 'writing', '00:12:34'),
		('Kerli', 'Koor', '1990-03-20', 3.99, 204,
			FALSE, NULL, 'green', 'dancing,hiking,knitting', '12:34:33'),
		('Paul', 'Saabas', '1991-08-04', 2.42, 109,
			FALSE, NULL, 'blue', NULL, '12:02:15'),
		('Veronika', 'Värk', '1973-06-04', 2.89, 509,
			TRUE, 'Matemaatikas tugev, kõiges muus null.', 'gray', 'knitting', '23:19:00'),
		('Martin', 'Mart', '1963-01-21', 4.00, 308,
			TRUE, 'Tark inimene!', 'blue', 'knitting', '08:40:08'),
		('Aita-Leida', 'Kuusepuu', '1953-11-02', 3.46, 299,
			TRUE, NULL, 'green', 'cooking,knitting', '12:03:59'),
		('Jüri', 'Mänd', '1993-02-20', 3.86, 105,
			FALSE, NULL, 'blue', NULL, '20:12:04'),
		('Varvara', 'Jõgi', '1991-12-02', 2.43, 34,
			FALSE, 'Kipub puuduma.', 'blue', 'singing,dancing', '02:03:04');		