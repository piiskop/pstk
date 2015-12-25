
---tabeli loomine
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eesnimi` varchar(20) DEFAULT NULL,
  `perekonnanimi` char(20) DEFAULT NULL,
  `sünniaeg` date DEFAULT NULL,
  `sisseastumise_aasta` year(4) DEFAULT NULL,
  `oppesuund` set('A','R','BK','E') DEFAULT NULL,
  `kiituskiri` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)

--andmete lisamine
insert into types
(eesnimi, perekonnanimi, sünniaeg, sisseastumise_aasta, oppesuund)
values
('juku','lill','1985-12-12','2000','r'),
('kati','põõsas','1987-3-4','1999','bk'),
('meeli','pott','1990-5-16','2001','a'),
('robi','aus','1988-9-17','2004','a'),
('juri','janes','1884-4-25','2011','e'),
('jane', 'aus', '1986-4-30','2007','e'),
('sigrid','kuusk','1994-4-6','2001','a'),
('tabmet','lill','1997-5-6','2007','a'),
('kaia','kaunis','1965-4-6','2008', 'bk'),
('kaupo','raba','1977-8-9','2004','r')
