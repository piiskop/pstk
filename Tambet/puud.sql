CREATE TABLE `puud` (
  `id` int(11) NOT NULL,
  `nimi` text,
  `diameeter` double DEFAULT NULL,
  `pikkus` float DEFAULT NULL,
  `hind$` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 utf8

INSERT INTO `puud` (`id`, `nimi`, `diameeter`, `pikkus`, `hind$`) VALUES
(1, 'mänd', 25.5, 5.2, 70),
(2, 'mänd', 26, 3.2, 70),
(3, 'kuusk', 36, 3.1, 68),
(4, 'kuusk', 13, 3.7, 70);
