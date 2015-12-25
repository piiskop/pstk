
#näitab kõik tabelid

show tables;
/*
+-----------------------+
| Tables_in_tvSeries    |
+-----------------------+
| Country               |
| Country_has_TV_series |
| Network               |
| Network_has_TV_series |
| TV_series             |
+-----------------------+
5 rows in set (0.00 sec)
*/

#kuvab kogu tabeli Country sisu

select * from Country;
/*
+-----------+----------------+
| idCountry | Name           |
+-----------+----------------+
|         1 | America        |
|         2 | United Kingdom |
|         3 | Germany        |
+-----------+----------------+
3 rows in set (0.00 sec)
*/

#kuvab kogu tabeli Network sisu

select * from Network;
/*
+-----------+---------+
| idNetwork | Name    |
+-----------+---------+
|         1 | FOX     |
|         2 | NBC     |
|         3 | CBS     |
|         4 | BBC One |
|         5 | ORF     |
+-----------+---------+
5 rows in set (0.00 sec)
*/

#kuvab kogu tabeli TV_series sisu

select * from TV_series;
/*
+-------------+---------------+-------------------+---------+------------+------------+
| idTV_series | Name          | Type              | Seasons | Start_date | End_date   |
+-------------+---------------+-------------------+---------+------------+------------+
|           1 | Martin        | Sitcom            | 5       | 1992-08-27 | 1997-05-01 |
|           2 | The A-Team    | Action-adventure  | 5       | 1983-01-23 | 1986-12-30 |
|           3 | CSI           | Crime drama       | 15      | 2000-10-20 | 2015-02-15 |
|           4 | Merlin        | Fantasy-adventure | 5       | 2008-09-20 | 2012-12-24 |
|           5 | Kommissar Rex | Crime drama       | 10      | 1994-11-10 | 2004-10-19 |
+-------------+---------------+-------------------+---------+------------+------------+
5 rows in set (0.01 sec)
*/

#kuvab kogu tabeli Country_has_TV_series sisu

select * from Country_has_TV_series;
/*
+-------------------+-----------------------+
| Country_idCountry | TV_series_idTV_series |
+-------------------+-----------------------+
|                 1 |                     1 |
|                 1 |                     2 |
|                 1 |                     3 |
|                 2 |                     4 |
|                 3 |                     5 |
+-------------------+-----------------------+
5 rows in set (0.00 sec)
*/

#kuvab kogu tabeli Network_nas_TV_series sisu

select * from Network_has_TV_series;
/*
+-------------------+-----------------------+
| Network_idNetwork | TV_series_idTV_series |
+-------------------+-----------------------+
|                 1 |                     1 |
|                 2 |                     2 |
|                 3 |                     3 |
|                 4 |                     4 |
|                 5 |                     5 |
+-------------------+-----------------------+
5 rows in set (0.00 sec)
*/

#Muudab tabeli TV_Series tulba Type andmetüübi enum.

alter table TV_series modify type enum("sitcom","action-adventure", "crime drama", "fantasy-adventure");


#Kuvab tabelis TV_series ainult tulba Seasons

select seasons from TV_series;
/*
+---------+
| seasons |
+---------+
| 5       |
| 5       |
| 15      |
| 5       |
| 10      |
+---------+
5 rows in set (2.14 sec)
*/

#muudab tulba seasons andmetüübi Int

alter table TV_series modify seasons int unsigned;

#lisab tabelisse TV_series uue rea andmeid

insert into TV_series (idTV_series, name, type, seasons, start_date, end_date) values (6, "Bold and Beautiful", "sitcom", 99, "1988-01-12","2045-12-23" );
Query OK, 1 row affected, 1 warning (0.05 sec)

/*
mysql> select * from TV_series;
+-------------+--------------------+-------------------+---------+------------+------------+
| idTV_series | Name               | type              | seasons | Start_date | End_date   |
+-------------+--------------------+-------------------+---------+------------+------------+
|           1 | Martin             | sitcom            |       5 | 1992-08-27 | 1997-05-01 |
|           2 | The A-Team         | action-adventure  |       5 | 1983-01-23 | 1986-12-30 |
|           3 | CSI                | crime drama       |      15 | 2000-10-20 | 2015-02-15 |
|           4 | Merlin             | fantasy-adventure |       5 | 2008-09-20 | 2012-12-24 |
|           5 | Kommissar Rex      | crime drama       |      10 | 1994-11-10 | 2004-10-19 |
|           6 | Bold and Beautiful | sitcom            |      99 | 1988-01-12 | 2045-12-23 |
+-------------+--------------------+-------------------+---------+------------+------------+
6 rows in set (0.00 sec)
*/

#tekitab tabeli Genre

create table Genre (id integer primary key, name tinytext); 

kuvab tebeli väljade info

desc TV_series;
/*
+-------------+---------------------------------------------------------------------+------+-----+---------+-------+
| Field       | Type                                                                | Null | Key | Default | Extra |
+-------------+---------------------------------------------------------------------+------+-----+---------+-------+
| idTV_series | int(11)                                                             | NO   | PRI | NULL    |       |
| Name        | varchar(45)                                                         | NO   |     | NULL    |       |
| type        | enum('sitcom','action-adventure','crime drama','fantasy-adventure') | YES  |     | NULL    |       |
| seasons     | int(10) unsigned                                                    | YES  |     | NULL    |       |
| Start_date  | date                                                                | NO   |     | NULL    |       |
| End_date    | date                                                                | YES  |     | NULL    |       |
+-------------+---------------------------------------------------------------------+------+-----+---------+-------+
6 rows in set (1.94 sec)
*/

#lisab taelisse TV_series uue tulba idGanre

alter table TV_series add column idGanre int(11)unsigned not NULL;

#kuvab tabeli Genre väljade info

desc Genre;
/*
+-------+----------+------+-----+---------+-------+
| Field | Type     | Null | Key | Default | Extra |
+-------+----------+------+-----+---------+-------+
| id    | int(11)  | NO   | PRI | NULL    |       |
| name  | tinytext | YES  |     | NULL    |       |
+-------+----------+------+-----+---------+-------+
2 rows in set (0.00 sec)
*/

#eemaldab tabeli TV_series sulbal idGanre unsigned.

alter table TV_series modify idGanre int(11)not NULL;

#Lisab tabelisse Genre 4 rida andmeid

insert into Genre (id, name) values (1, "sitcom");
insert into Genre (id, name) values (2, "action-adventure");
insert into Genre (id, name) values (3, "crime drama");
insert into Genre (id, name) values (4, "fantasy-adventure");

#kuvab tabeli TV_seriesid ja type sisu

select idTV_series, type from TV_series;
/*
+-------------+-------------------+
| idTV_series | type              |
+-------------+-------------------+
|           1 | sitcom            |
|           2 | action-adventure  |
|           3 | crime drama       |
|           4 | fantasy-adventure |
|           5 | crime drama       |
|           6 | sitcom            |
+-------------+-------------------+
6 rows in set (0.00 sec)
*/

#annab tabelis TV_series olevatele seriaalidele id mis vastab tabelis Genre olevatele þanritele.

update TV_series set idGanre=1 where idTV_series=1;
update TV_series set idGanre=1 where idTV_series=6;
update TV_series set idGanre=2 where idTV_series=3;
update TV_series set idGanre=2 where idTV_series=5;
update TV_series set idGanre=3 where idTV_series=2;
update TV_series set idGanre=4 where idTV_series=4;

#määrab võtme millega seob ühe tabeli teisega

alter table TV_series add constraint fromTV_seriestoGenre foreign key (idGanre) references Genre (id);

#kustutab eelpool loodud võtme

alter table TV_series drop foreign key fromTV_seriestoGenre;

#muudab tabeli TV_series tulba idGanre tulba andmetüübi

alter table TV_series modify idGanre int(11) NULL;

#määrab võtme millega seob ühe tabeli teisega ja määrab välja kustutamisel väärtuseks NULL

alter table TV_series add constraint fromTV_seriestoGenre foreign key (idGanre) references Genre (id)on delete set NULL;

#kustutab tabelist Genre kus on id 1

delete from Genre where id=1;

#kuvab tabeli TV:series id ja idGanre

select idTV_series, idGanre from TV_series;

/*
+-------------+---------+
| idTV_series | idGanre |
+-------------+---------+
|           1 |    NULL |
|           6 |    NULL |
|           3 |       2 |
|           5 |       2 |
|           2 |       3 |
|           4 |       4 |
+-------------+---------+
*/

#kuvab kogu tabeli Genre sisu

select * from Genre;
/*
+----+-------------------+
| id | name              |
+----+-------------------+
|  2 | action-adventure  |
|  3 | crime drama       |
|  4 | fantasy-adventure |
+----+-------------------+
3 rows in set (0.00 sec)
*/

#sisestab tabelisse Genre uue rea sitcom

insert Genre (id, name) values (1, "sitcom");

#tekitab ajutise tabeli mis on koopia tabelist TV_series

create temporary table temporarytvseries select * from TV_series;

#kuvab kõik tabelid

show tables;

/*
+-----------------------+
| Tables_in_tvSeries    |
+-----------------------+
| Country               |
| Country_has_TV_series |
| Genre                 |
| Network               |
| Network_has_TV_series |
| TV_series             |
+-----------------------+
6 rows in set (0.00 sec)
*/

#kuvab ajutise tabeli

select * from temporarytvseries;
/*
+-------------+--------------------+-------------------+---------+------------+------------+---------+
| idTV_series | Name               | type              | seasons | Start_date | End_date   | idGanre |
+-------------+--------------------+-------------------+---------+------------+------------+---------+
|           1 | Martin             | sitcom            |       5 | 1992-08-27 | 1997-05-01 |    NULL |
|           2 | The A-Team         | action-adventure  |       5 | 1983-01-23 | 1986-12-30 |       3 |
|           3 | CSI                | crime drama       |      15 | 2000-10-20 | 2015-02-15 |       2 |
|           4 | Merlin             | fantasy-adventure |       5 | 2008-09-20 | 2012-12-24 |       4 |
|           5 | Kommissar Rex      | crime drama       |      10 | 1994-11-10 | 2004-10-19 |       2 |
|           6 | Bold and Beautiful | sitcom            |      99 | 1988-01-12 | 2045-12-23 |    NULL |
+-------------+--------------------+-------------------+---------+------------+------------+---------+
6 rows in set (0.00 sec)
*/

#kuvab kogu Country_has_TV_series sisu

select * from Country_has_TV_series;
/*
+-------------------+-----------------------+
| Country_idCountry | TV_series_idTV_series |
+-------------------+-----------------------+
|                 1 |                     1 |
|                 1 |                     2 |
|                 1 |                     3 |
|                 2 |                     4 |
|                 3 |                     5 |
+-------------------+-----------------------+
5 rows in set (0.00 sec)
*/

#kuvab kogu tabeli TV_series sisu

select * from TV_series;
/*
+-------------+--------------------+-------------------+---------+------------+------------+---------+
| idTV_series | Name               | type              | seasons | Start_date | End_date   | idGanre |
+-------------+--------------------+-------------------+---------+------------+------------+---------+
|           1 | Martin             | sitcom            |       5 | 1992-08-27 | 1997-05-01 |    NULL |
|           2 | The A-Team         | action-adventure  |       5 | 1983-01-23 | 1986-12-30 |       3 |
|           3 | CSI                | crime drama       |      15 | 2000-10-20 | 2015-02-15 |       2 |
|           4 | Merlin             | fantasy-adventure |       5 | 2008-09-20 | 2012-12-24 |       4 |
|           5 | Kommissar Rex      | crime drama       |      10 | 1994-11-10 | 2004-10-19 |       2 |
|           6 | Bold and Beautiful | sitcom            |      99 | 1988-01-12 | 2045-12-23 |    NULL |
+-------------+--------------------+-------------------+---------+------------+------------+---------+
6 rows in set (0.00 sec)
*/

#muudab tabelis TV_series tulba seasons esimesed kaks välja mille väärtus on 5 väärtuseks 6

update TV_series set seasons=6 where seasons=5 limit 2;

#kuvab kogu tabeli TV_series sisu

select * from TV_series;
/*
+-------------+--------------------+-------------------+---------+------------+------------+---------+
| idTV_series | Name               | type              | seasons | Start_date | End_date   | idGanre |
+-------------+--------------------+-------------------+---------+------------+------------+---------+
|           1 | Martin             | sitcom            |       6 | 1992-08-27 | 1997-05-01 |    NULL |
|           2 | The A-Team         | action-adventure  |       6 | 1983-01-23 | 1986-12-30 |       3 |
|           3 | CSI                | crime drama       |      15 | 2000-10-20 | 2015-02-15 |       2 |
|           4 | Merlin             | fantasy-adventure |       5 | 2008-09-20 | 2012-12-24 |       4 |
|           5 | Kommissar Rex      | crime drama       |      10 | 1994-11-10 | 2004-10-19 |       2 |
|           6 | Bold and Beautiful | sitcom            |      99 | 1988-01-12 | 2045-12-23 |    NULL |
+-------------+--------------------+-------------------+---------+------------+------------+---------+
6 rows in set (0.01 sec)
*/

#kuvab tabeli väljade info

desc TV_series;
/*
+-------------+---------------------------------------------------------------------+------+-----+---------+-------+
| Field       | Type                                                                | Null | Key | Default | Extra |
+-------------+---------------------------------------------------------------------+------+-----+---------+-------+
| idTV_series | int(11)                                                             | NO   | PRI | NULL    |       |
| Name        | varchar(45)                                                         | NO   |     | NULL    |       |
| type        | enum('sitcom','action-adventure','crime drama','fantasy-adventure') | YES  |     | NULL    |       |
| seasons     | int(10) unsigned                                                    | YES  |     | NULL    |       |
| Start_date  | date                                                                | NO   |     | NULL    |       |
| End_date    | date                                                                | YES  |     | NULL    |       |
| idGanre     | int(11)                                                             | YES  | MUL | NULL    |       |
+-------------+---------------------------------------------------------------------+------+-----+---------+-------+
7 rows in set (0.00 sec)
*/

#kuvab koodi tabeli TV_series koostamiseks

show create table TV_series;

/*
+-----------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table     | Create Table                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |
+-----------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| TV_series | CREATE TABLE `TV_series` (
  `idTV_series` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `type` enum('sitcom','action-adventure','crime drama','fantasy-adventure') DEFAULT NULL,
  `seasons` int(10) unsigned DEFAULT NULL,
  `Start_date` date NOT NULL,
  `End_date` date DEFAULT NULL,
  `idGanre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTV_series`),
  KEY `fromTV_seriestoGenre` (`idGanre`),
  CONSTRAINT `fromTV_seriestoGenre` FOREIGN KEY (`idGanre`) REFERENCES `Genre` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 |
+-----------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (2.01 sec)
*/
