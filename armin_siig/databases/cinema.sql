create database cinema character set utf8 collate utf8_general_ci;
create user 'watcher'@'localhost' identified by 'pass';
-----kasutaja "watcher" võib olla ka ilma üla komadeta
grant all privileges on cinema.* to 'watcher'@'localhost';
use cinema;
create table movies (idmovie integer(10) unsigned not null auto_increment primary key, movie varchar(40) not null);

create table actor (idactor integer(10) unsigned not null auto_increment primary key, actor varchar(40) not null);

create table movie_actor (movie_idmovie int(100) unsigned not null auto_increment primary key, 
actor_idactor int(100) unsigned not null,
constraint fk_movies
foreign key(`movie_idmovie`)
references `movies` (`idmovie`)
on delete no action
on update cascade,
constraint fk_actors
foreign key(`actor_idactor`)
references `actor` (`idactor`)
on delete no action
on update cascade);

grant all privileges on cinema.* to 'watcher'@'localhost';

revoke all privileges on cinema.* from 'watcher'@'localhost';

insert into movies (idmovie, movie) values (1, 'Arrow');
insert into movies (idmovie, movie) values (2, 'The Flash');
insert into movies (idmovie, movie) values (3, 'Gotham');

alter table actor drop column actor;
truncate actors;
alter table actor add column name char(20) not null;
alter table actor add column familiy char(20) not null;

insert into actors (idactor, name, family) values (1, 'Stephen', 'Amell');
insert into actors (idactor, name, family) values (2, 'Katie', 'Cassidy');
insert into actors (idactor, name, family) values (3, 'David', 'Ramsey');
insert into actors (idactor, name, family) values (4, 'Willa', 'Holland');
insert into actors (idactor, name, family) values (5, 'Paul', 'Blackthorne');
insert into actors (idactor, name, family) values (6, 'Emiliy Bett', 'Richards');
insert into actors (idactor, name, family) values (7, 'Colton', 'Haynes');
insert into actors (idactor, name, family) values (8, 'Susanna', 'Thompson');
insert into actors (idactor, name, family) values (9, 'John', 'Barrowman');
insert into actors (idactor, name, family) values (10, 'Grant', 'Gustin');
insert into actors (idactor, name, family) values (11, 'Candice', 'Patton');
insert into actors (idactor, name, family) values (12, 'Danielle', 'Panabaker');
insert into actors (idactor, name, family) values (13, 'Rick', 'Cosnett');
insert into actors (idactor, name, family) values (14, 'Tom', 'Cavanagh');
insert into actors (idactor, name, family) values (15, 'Carlos', 'Valdes');
insert into actors (idactor, name, family) values (16, 'Jessie', 'L. Martin');
insert into actors (idactor, name, family) values (17, 'Patrick', 'Sabongui');
insert into actors (idactor, name, family) values (18, 'Jon Wesley', 'Shipp');
insert into actors (idactor, name, family) values (19, 'Ben', 'McKenzie');
insert into actors (idactor, name, family) values (20, 'Zabryna', 'Guevara');
insert into actors (idactor, name, family) values (21, 'Robin Lord', 'Taylor');
insert into actors (idactor, name, family) values (22, 'Erin', 'Richards');
insert into actors (idactor, name, family) values (23, 'Camren', 'Bicondova');
insert into actors (idactor, name, family) values (24, 'Cory Michael', 'Smith');
insert into actors (idactor, name, family) values (25, 'Victoria', 'Cartagena');
insert into actors (idactor, name, family) values (26, 'Andrew', 'Stewart-Jones');
insert into actors (idactor, name, family) values (27, 'Jada', 'Pinkett Smith');
begin;

alter table movie_actors 
drop foreign key fk_movies;

alter table movie_actors 
drop foreign key fk_movies;

rollback;
drop movie_actor;

update actors set family='Laenumeheks' where name='John' limit 1;