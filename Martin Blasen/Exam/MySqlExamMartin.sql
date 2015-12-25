


/* tekitab andmebaasi */
create database RocketHeater ;

/* võtab andmebaasi kasutusele */
use RocketHeater ;

/* koostab taelid */
create table Models (idModels int(11) UNSIGNED NOT NULL primary key auto_increment, Name mediumtext NOT NULL )ENGINE = InnoDB;
create table DuctSize (idSize int(11) UNSIGNED NOT NULL primary key auto_increment, Inches int(11) NOT NULL )ENGINE = InnoDB;
create table Barrel (idBarrel int(11) UNSIGNED NOT NULL primary key auto_increment, Gallons int(11) NOT NULL )ENGINE = InnoDB;
create table HeatableArea (idHeatableArea int(11) UNSIGNED NOT NULL primary key auto_increment, SquareFeet INT(11) NOT NULL )ENGINE = InnoDB;
create table WoodConsumed (idWoodConsumed int(11) UNSIGNED NOT NULL primary key auto_increment, Cords decimal(4,2) NOT NULL)ENGINE = InnoDB;

/* sisestab tabelitesse andmed */
insert into Models (Name) values ("Annex Variation");
insert into Models (Name) values ("Daybed with Bypass");
insert into Models (Name) values ("Bonny Convection Bench");
insert into Models (Name) values ("Cabin Variation");

insert into DuctSize (Inches) values (6);
insert into DuctSize (Inches) values (8);

insert into Barrel (Gallons) values (55);
insert into Barrel (Gallons) values (30);

insert into HeatableArea (SquareFeet) values (800);
insert into HeatableArea (SquareFeet) values (120);
insert into HeatableArea (SquareFeet) values (2000);
insert into HeatableArea (SquareFeet) values (840);

insert into WoodConsumed (Cords) values (1.5);
insert into WoodConsumed (Cords) values (0.4);
insert into WoodConsumed (Cords) values (3.3);

/* tekitab tabeli heaters */
create table Heaters (
	idOfModel int(11) UNSIGNED NOT NULL, 
	idOfDuctSize int(11) UNSIGNED NOT NULL, 
	idOfBarrel int(11) UNSIGNED NOT NULL, 
	idOfArea int(11) UNSIGNED NOT NULL,  
	idOfConsumption int(11) UNSIGNED NOT NULL);

/* loob seosed tabelite vahel */	
alter table Heaters add constraint fromModelstoHeaters foreign key (idOfModel) references Models (idModels);
alter table Heaters add constraint fromDuctSizetoHeaters foreign key (idOfDuctSize) references DuctSize (idSize);
alter table Heaters add constraint fromBarreltoHeaters foreign key (idOfBarrel) references Barrel (idBarrel);
alter table Heaters add constraint fromHeatableAreatoHeaters foreign key (idOfArea) references HeatableArea (idHeatableArea);
alter table Heaters add constraint fromWoodConsumedtoHeaters foreign key (idOfConsumption) references WoodConsumed (idWoodConsumed);

/* sisestab andmed tabelisse Heaters */
insert into Heaters (idOfModel, idOfDuctSize, idOfBarrel, idOfArea, idOfConsumption) values (1,1,1,1,1);
insert into Heaters (idOfModel, idOfDuctSize, idOfBarrel, idOfArea, idOfConsumption) values (2,1,2,2,2);
insert into Heaters (idOfModel, idOfDuctSize, idOfBarrel, idOfArea, idOfConsumption) values (3,2,1,3,3);
insert into Heaters (idOfModel, idOfDuctSize, idOfBarrel, idOfArea, idOfConsumption) values (4,2,2,4,1);

/*tekitab kasutaja ja annab talle õigused */

CREATE USER 'Polarbear'@'localhost' IDENTIFIED BY 'mrbear';

GRANT ALL PRIVILEGES ON `RocketHeater` . * TO `Polarbear`@'localhost';

/* logib kasutajaga sisse
mysql -uPolarbear -pmrbear RocketHeater
*/

/* muudab tabelis WoodConsumed Cords 1.4 kus varem oli 1.5 ainult 1 korra */
update WoodConsumed set Cords=1.4 where Cords=1.5 limit 1;


/*kustutab tabelist Heaters rea andmeid kus idOfModel on 4 */
delete from Heaters where idOfModel=4;

/* alustab andmete muutmist tabelis Heaters muudab idOfBarrel 1 kus idOfModel on 2, ja siis võtab käsu tagsi */ 
begin; update Heaters set idOfbarrel=1  where idOfModel=2;
rollback;





