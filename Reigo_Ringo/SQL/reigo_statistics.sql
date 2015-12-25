
CREATE TABLE statistika (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,	
	dob DATE NOT NULL,
	mitu_kapsast INT
);

INSERT INTO statistika (first_name, last_name, dob, mitu_kapsast) VALUES 
	('Martin', 'Mann', '1975-12-21', 14),
	('Toomas', 'Kaku', '1992-06-01', 2),	
	('Vallo', 'Vasikas', '1985-07-12', NULL),
	('Edukas', 'Moos', '1988-11-22', 4),
	('Kari', 'Käbi', '1983-01-18', NULL),
	('Andrus', 'Kana', '1965-09-24', 12),
	('Einar', 'Tuletis', '1999-06-26', 2),
	('Selge', 'Siga', '1975-02-20', NULL),
	('Alane', 'Tuul', '1962-06-04', 1),
	('Hannes', 'Raisus', '1991-12-07', 5);

SELECT AVG(IFNULL(mitu_kapsast, 0)) FROM statistika;
	
SELECT MIN(mitu_kapsast) FROM statistika;	
	
SELECT MAX(mitu_kapsast) FROM statistika;

SELECT SUM(mitu_kapsast) FROM statistika;

-- mitu rida
SELECT COUNT(*) FROM statistika;

SELECT mitu_kapsast AS kapsaste_arv FROM statistika;

-- mitu kapsa omamise varianti on
SELECT mitu_kapsast FROM statistika
	GROUP BY mitu_kapsast DESC;

-- kellel rohkem kui 2 kapsast reastatud kapsaste arvu järgi	
SELECT first_name, last_name, mitu_kapsast AS kapsaste_arv
	FROM statistika
	GROUP BY mitu_kapsast DESC
	HAVING kapsaste_arv  > 2;	
	