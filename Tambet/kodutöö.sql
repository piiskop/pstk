-- Tabeli loomine
CREATE TABLE sugul (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	eesnim VARCHAR(20) NOT NULL,
	pernim VARCHAR(20) NOT NULL,
	sugu ENUM('male','female','neutral') NOT NULL,
	elus ENUM ('jah', 'ei')NOT NULL,
	description TEXT,
	created DATETIME NOT NULL DEFAULT NOW()
		
);
-- ridade sisestamine
INSERT INTO sugul 
		(id, eesnim, pernim, sugu, elus, description, created)
	VALUES
		(1,'Tambet', 'Song', 'male', 'jah', 'mina ise', '25-02-07 13:54:00');
		
--Lisa tulp
ALTER TABLE sugul ADD COLUMN aasta integer;

-- Muuda aastat sael, kus id on 1
update sugul set aasta=1979 where id=1;

--Lisa ülejäänud sugulased
INSERT INTO sugul (id, eesnim, pernim, sugu, elus, description, created, aasta)
	VALUES(2,'Tambet', 'Song', 'male', 'jah', 'poeg', '25-02-07 13:58:00', '2005'),
	(3, 'Eliisbet', 'Song', 'female', 'jah', 'tütar', '25-02-07 13:59:00', '2009'),
	(4,'Enn', 'Song', 'male', 'jah', 'isa', '25-02-07 13:59:00', '1951'),
	(5,'Lea', 'Song', 'female', 'jah', 'ema', '25-02-07 14:00:00', '1951'),
	(6,'Indrek', 'Song', 'male', 'jah', 'vend', '25-02-07 14:01:00', '1976'),
	(7,'Elo', 'Tenusaar', 'female', 'jah', 'naine', '25-02-07 14:02:00', '1984'),
	(8,'Lehte', 'Rootslane', 'female', 'ei', 'vanaema', '25-02-07 14:03:00', '1901'),
	(9,'Osvald', 'Rootslane', 'male', 'ei', 'vanaisa', '25-02-07 14:04:00', '1901')
	(10,'Osvald', 'Rootslane', 'male', 'ei', 'vanaisa', '25-02-07 14:04:00', '1901');

--Kuva tabel sugul
SELECT * FROM sugul;

--Näita kõiki naisi (eesnime-perenime ja sünniaasta järjestuses
SELECT eesnim, pernim, aasta FROM sugul WHERE sugu="female";

-- Näita kõiki, kes on sündinud hiljem kui 1976
SELECT eesnim, pernim, aasta AS aasta FROM sugul WHERE aasta >= 1976;

--Näita kõiki mehi sündinud vahemikus 1951-2005, reasta eesnime järgi
SELECT eesnim, pernim, aasta FROM sugul WHERE sugu='male' AND aasta BETWEEN 1951 AND 2005 ORDER BY pernim;

--Sorteeri eesnim järgi tähestiku järjekorras kasvavalt
SELECT eesnim , pernim FROM sugul ORDER BY eesnim DESC;

--Sorteeri eesnim järgi tähestiku järjekorras khanevalt NÄITA AINULT ESIMEST!
SELECT eesnim , pernim FROM sugul ORDER BY eesnim ASC LIMIT 1;

--Loenda mitu naist on
SELECT COUNT(*) FROM sugul WHERE sugu='female';

--Kõik mehed mitte elus (!=)
SELECT eesnim, pernim, description AS elus FROM sugul WHERE elus !='jah' AND sugu='male';

--aastad kokku grupeeritud soo järgi
SELECT sugu, SUM(aasta) FROM sugul GROUP BY sugu;

--Kustuta üks meestest kes on sündinud 1901
DELETE FROM sugul WHERE aasta=1901 AND sugu='male' LIMIT 1;
