
CREATE TABLE kustuta (
	kelle varchar(20),
	mis varchar(20)
);

INSERT INTO kustuta(kelle, mis) VALUES 
	('karu', 'mesi'),
	('jänes', 'mesi'),
	('siga', 'juurikas'),
	('leevike', 'seeme'),
	('hobune', 'hein'),
	('lehm', 'hein'),
	('rebane', 'hiir'),
	('hiir', 'juurikas'),
	('tihane', 'mari'),
	('konn', 'mesi');

DELETE FROM kustuta
	WHERE mis='mesi'
	LIMIT 2;

DELETE FROM kustuta
	WHERE kelle LIKE 'l%';
	