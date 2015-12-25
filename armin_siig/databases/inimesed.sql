create table if not exists `databases`.`humans`
(`idhuman` int(11) unsigned NOT NULL auto increment,
`firstName` varchar(255) NULL,
`lastName` varchar(255) NULL);

create table if not exists `databases`.`humans_humans`
(`idhumans_humans` int(11) not null auto incremenet,
`start_end_date` timestamp() not null,
conversation text null)
PRIMARY KEY (`idhumans_humans`),
  CONSTRAINT 
    FOREIGN KEY (`idhuman`)
    REFERENCES `databases`.`humans` (`idhuman`)
    ON DELETE restrict
    ON UPDATE CASCADE);

insert into `humans` (`id`,`firstname`;``lastname`) values (1,'armin','tool')
(2,'nimra','kull'),
(3,'kasnakalle','mets')
(4,'mari','muri'),
(5,'juku','kuul')
(6,'scrolllock','tuul'),
(7,'pause','nool')
(8,'break','rool'),
(9,'juhan','parts');