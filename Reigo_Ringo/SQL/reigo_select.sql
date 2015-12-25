
CREATE TABLE football(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
	goals INT UNSIGNED,
	assists INT UNSIGNED
);

INSERT INTO football(first_name, last_name, goals, assists) VALUES
	('Martin', 'Mann', 2, 14),
	('Toomas', 'Kaku', 21, 2),	
	('Vallo', 'Vasikas', NULL, NULL),
	('Edukas', 'Moos', 1, 4),
	('Kari', 'Käbi', 3, NULL),
	('Andrus', 'Kana', 12, 12),
	('Einar', 'Tuletis', NULL, 2),
	('Selge', 'Siga', NULL, NULL),
	('Alane', 'Tuul', 26, 1),
	('Hannes', 'Raisus', 8, 5);

--mis unikaalseid tulemusi on assistide hulgas
SELECT DISTINCT assists FROM football ORDER BY assists DESC;


SELECT first_name, last_name, goals
	FROM football
	WHERE goals > 10 
	ORDER BY goals DESC;

SELECT first_name, last_name, goals
	FROM football
	WHERE goals BETWEEN 5 AND 15
	ORDER BY goals DESC;	
	
-- kui palju on neid kel vähemalt 1 värav või assist antud
SELECT COUNT(*)
	FROM football
	WHERE (assists > 0 OR goals > 0);	

-- sama asi teisiti
SELECT COUNT(*)
	FROM football
	WHERE (assists IS NOT NULL OR goals IS NOT NULL);		
	
-- tähestiku alusel perekonnanime järgi 5 esimest
SELECT first_name, last_name
	FROM football
	ORDER BY last_name ASC
	LIMIT 5;	
	
SELECT SUM(goals) FROM football;	
	
-- need kelle perekonnanimi algab s või m tähega
SELECT first_name, last_name
	FROM football
	WHERE LOWER(last_name) REGEXP '^[sm]';

-- need kelle perekonnanimi lõpeb s tähega
SELECT first_name, last_name
	FROM football
	WHERE last_name LIKE '%s';
	