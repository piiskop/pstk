
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `tipp` (
  `id` int(11) NOT NULL,
  `name` text,
  `puuliik` text,
  `valem` text,
  `diameeter_cm` int(11) DEFAULT NULL,
  `pikkus_dm` int(11) DEFAULT NULL,
  `paksus_mm` int(11) DEFAULT NULL,
  `erikaal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tipp` (`id`, `name`, `puuliik`, `valem`, `diameeter_cm`, `pikkus_dm`, `paksus_mm`, `erikaal`) VALUES
(1, 'ümar', 'kask', 'tühi', 8, 3, 0, 1),
(2, 'ümar', 'kuusk', 'tühi', 8, 3, 0, 1),
(3, 'ümar', 'mänd', 'tühi', 8, 3, 0, 1),
(4, 'ümar', 'lepp', 'tühi', 8, 3, 0, 1),
(5, 'ümar', 'haab', 'tühi', 8, 3, 0, 1),
(6, 'laud', 'kask', 'tühi', 8, 3, 80, 1),
(7, 'laud', 'kuusk', 'tühi', 8, 3, 80, 1),
(8, 'laud', 'mänd', 'tühi', 8, 3, 80, 1),
(9, 'laud', 'kask', 'tühi', 9, 3, 80, 1);
