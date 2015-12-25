#Autorite, kelle haridus pole magistriõpe, ees- ja perenimi

select first_name, last_name from authors where education!= 'magistriõpe';
/*
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Helle      | Lõhmus    |
| Reigo      | Ringo     |
+------------+-----------+
2 rows in set (0.00 sec)
*/

select first_name, last_name from authors where education <> 'magistriõpe';
/*
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Helle      | Lõhmus    |
| Reigo      | Ringo     |
+------------+-----------+
2 rows in set (0.00 sec)
*/

#Näituste nimed ja vastavate kuraatorite eesnimed
select exhibition.title, curator.first_name from curator 
join curator_has_exhibition on curator.id_curator=curator_has_exhibition.curator_id_curator 
join exhibition on curator_has_exhibition.exhibition_id_exhibition=exhibition.id_exhibition;
/*
| title                 | first_name |
+-----------------------+------------+
| TÜ KUNSTIDE OSAKONNA  | Kristel    |
| Aastalõpunäitus       | Kristel    |
| Karu lendab           | Marko      |
+-----------------------+------------+
3 rows in set (0.00 sec)
*/

#Kuraator Marko näitused
select exhibition.title, curator.first_name from curator 
join curator_has_exhibition on curator.id_curator=curator_has_exhibition.curator_id_curator 
join exhibition on curator_has_exhibition.exhibition_id_exhibition=exhibition.id_exhibition 
where curator.first_name='Marko';
/*
+-------------+------------+
| title       | first_name |
+-------------+------------+
| Karu lendab | Marko      |
+-------------+------------+
1 row in set (0.00 sec)
*/

#Kuraatorid
select * from curator;
/*
+------------+------------+-----------+------------+
| id_curator | first_name | last_name | phone_nr   |
+------------+------------+-----------+------------+
|          1 | Kristel    | Kink      | NULL       |
|          2 | Marko      | Valge     | 346 454547 |
+------------+------------+-----------+------------+
2 rows in set (0.00 sec)
*/

#Autorid
select * from authors;
/*
+-----------+------------+------------+-----------------------------+
| id_table1 | first_name | last_name  | education                   |
+-----------+------------+------------+-----------------------------+
|         1 | Agnes      | Liping     | magistriõpe                 |
|         2 | Elo-Mai    | Mikkelsaar | magistriõpe                 |
|         3 | Maarja     | Nõmmik     | magistriõpe                 |
|         4 | Egle       | Remm       | magistriõpe                 |
|         5 | Helle      | Lõhmus     | bakalaureuseõpe             |
|         6 | Reigo      | Ringo      | bakalaureuseõpe lõpetanud   |
+-----------+------------+------------+-----------------------------+
6 rows in set (0.00 sec)
*/

#Bakalaureuseõppega autorite eesnimed
select first_name from authors where education like 'bakalaureuseõpe';
/*
+------------+
| first_name |
+------------+
| Helle      |
+------------+
1 row in set (0.02 sec)
*/

#Autorite eesnimed, kelle haridus algab "bakalaureuseõpe"-ga
select first_name from authors where education like 'bakalaureuseõpe%';
/*
+------------+
| first_name |
+------------+
| Helle      |
| Reigo      |
+------------+
2 rows in set (0.00 sec)
*/

#Me ei mäleta, kas autori perenimi oli Nõmmik või Nõmik
select first_name from authors where last_name like 'Nõm_ik';
/*
+------------+
| first_name |
+------------+
| Maarja     |
+------------+
1 row in set (0.00 sec)
*/

#Kolm esimest autorit. Sortimiseks kasutatakse eesnime sisujuhti
select first_name from authors limit 3;
/*
+------------+
| first_name |
+------------+
| Agnes      |
| Egle       |
| Elo-Mai    |
+------------+
3 rows in set (0.00 sec)
*/

#Kolme esimese autori ees- ja perenimi rühmitatuna perenimede kaupa
select first_name, last_name from authors group by last_name limit 3;
/*
+------------+------------+
| first_name | last_name  |
+------------+------------+
| Agnes      | Liping     |
| Helle      | Lõhmus     |
| Elo-Mai    | Mikkelsaar |
+------------+------------+
3 rows in set (0.02 sec)
*/

#Näitame autoreid lehekülgede kaupa, neli autorit lehel alates neljandast
select first_name, last_name from authors group by last_name limit 3, 4;
/*
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Maarja     | Nõmmik    |
| Egle       | Remm      |
| Reigo      | Ringo     |
+------------+-----------+
3 rows in set (0.00 sec)
*/

#Autorite eesnimed lehekülgede kaupa, neli autorit lehel alates neljandast
select first_name from authors limit 3, 4;
/*
+------------+
| first_name |
+------------+
| Helle      |
| Maarja     |
| Reigo      |
+------------+
3 rows in set (0.00 sec)
*/

#Autorite eesnimed. Sortimise alus eesnime sisujuht
select first_name from authors;
/*
+------------+
| first_name |
+------------+
| Agnes      |
| Egle       |
| Elo-Mai    |
| Helle      |
| Maarja     |
| Reigo      |
+------------+
6 rows in set (0.00 sec)
*/

#Kõik autorid. Sortimise alus peavõti
select * from authors;
/*
+-----------+------------+------------+-----------------------------+
| id_table1 | first_name | last_name  | education                   |
+-----------+------------+------------+-----------------------------+
|         1 | Agnes      | Liping     | magistriõpe                 |
|         2 | Elo-Mai    | Mikkelsaar | magistriõpe                 |
|         3 | Maarja     | Nõmmik     | magistriõpe                 |
|         4 | Egle       | Remm       | magistriõpe                 |
|         5 | Helle      | Lõhmus     | bakalaureuseõpe             |
|         6 | Reigo      | Ringo      | bakalaureuseõpe lõpetanud   |
+-----------+------------+------------+-----------------------------+
6 rows in set (0.00 sec)
*/

#Neli autorit alates neljandast, sortimise alus nime sisujuht
select id_table1, first_name from authors limit 3, 4;
/*
+-----------+------------+
| id_table1 | first_name |
+-----------+------------+
|         5 | Helle      |
|         3 | Maarja     |
|         6 | Reigo      |
+-----------+------------+
3 rows in set (0.00 sec)
*/

#Kolm autorit alates viiendast, sortimise alus nime sisujuht
select id_table1, first_name from authors limit 4, 3;
/*
+-----------+------------+
| id_table1 | first_name |
+-----------+------------+
|         3 | Maarja     |
|         6 | Reigo      |
+-----------+------------+
2 rows in set (0.00 sec)
*/

#Esimene autor
select id_table1, first_name from authors limit 0, 1;
/*
+-----------+------------+
| id_table1 | first_name |
+-----------+------------+
|         1 | Agnes      |
+-----------+------------+
1 row in set (0.00 sec)
*/

#Esimesed kaks autorit, sortimise alus nime sisujuht
select id_table1, first_name from authors limit 0, 2;
/*
+-----------+------------+
| id_table1 | first_name |
+-----------+------------+
|         1 | Agnes      |
|         4 | Egle       |
+-----------+------------+
2 rows in set (0.00 sec)
*/

#Esimesed viis autorit, sortimise alus nime sisujuht
select id_table1, first_name from authors limit 0, 5;
/*
+-----------+------------+
| id_table1 | first_name |
+-----------+------------+
|         1 | Agnes      |
|         4 | Egle       |
|         2 | Elo-Mai    |
|         5 | Helle      |
|         3 | Maarja     |
+-----------+------------+
5 rows in set (0.00 sec)
*/

#Autorite tabeli ülesehitus
describe authors;
+------------+--------------+------+-----+---------+-------+
| Field      | Type         | Null | Key | Default | Extra |
+------------+--------------+------+-----+---------+-------+
| id_table1  | int(11)      | NO   | PRI | NULL    |       |
| first_name | varchar(20)  | NO   | MUL | NULL    |       |
| last_name  | varchar(20)  | NO   |     | NULL    |       |
| education  | varchar(100) | YES  |     | NULL    |       |
+------------+--------------+------+-----+---------+-------+
4 rows in set (0.00 sec)
*/

#Autorite tabeli loomise skript
show create table authors;
/*
+---------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table   | Create Table                                                                                                                                                                                                                                                                                       |
+---------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| authors | CREATE TABLE `authors` (
  `id_table1` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_table1`),
  UNIQUE KEY `author_name` (`first_name`,`last_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 |
+---------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.02 sec)
*/

#Hariduste kaupa autorite arv, sortimise alus kogus
select authors.education, count(authors.first_name ) as amount from authors group by authors.education;
/*
+-----------------------------+--------+
| education                   | amount |
+-----------------------------+--------+
| bakalaureuseõpe             |      1 |
| bakalaureuseõpe lõpetanud   |      1 |
| magistriõpe                 |      4 |
+-----------------------------+--------+
3 rows in set (0.00 sec)
*/

#Hariduste kaupa autorite arv, sorditud kahanevalt koguse järgi
select authors.education, count(authors.first_name ) as amount from authors group by authors.education desc;
/*
+-----------------------------+--------+
| education                   | amount |
+-----------------------------+--------+
| magistriõpe                 |      4 |
| bakalaureuseõpe lõpetanud   |      1 |
| bakalaureuseõpe             |      1 |
+-----------------------------+--------+
3 rows in set (0.00 sec)
*/

#Hariduste kaupa autorite arv, sorditud hariduse järgi
select authors.education, count(authors.first_name ) as amount from authors group by authors.education 
desc order by authors.education asc;
/*
+-----------------------------+--------+
| education                   | amount |
+-----------------------------+--------+
| bakalaureuseõpe             |      1 |
| bakalaureuseõpe lõpetanud   |      1 |
| magistriõpe                 |      4 |
+-----------------------------+--------+
3 rows in set (0.00 sec)
*/

/*
 * Hariduste kaupa autorite arv, sorditud koguste järgi kahanevalt ja hariduse
 * järgi kasvavalt
 */
select authors.education, count(authors.first_name ) as amount from authors group by authors.education 
desc order by amount desc, authors.education asc;
/*
+-----------------------------+--------+
| education                   | amount |
+-----------------------------+--------+
| magistriõpe                 |      4 |
| bakalaureuseõpe             |      1 |
| bakalaureuseõpe lõpetanud   |      1 |
+-----------------------------+--------+
3 rows in set (0.00 sec)
*/

#Autorite arv hariduste kaupa üle koguse 2, sorditud hariduste järgi
select authors.education, count(authors.first_name ) as amount from authors group by authors.education 
desc having amount > 2 order by authors.education asc;
/*
+--------------+--------+
| education    | amount |
+--------------+--------+
| magistriõpe  |      4 |
+--------------+--------+
1 row in set (0.00 sec)
*/

#Kõik autorid, sorditud peavõtme järgi
select * from authors;
/*
+-----------+------------+------------+-----------------------------+
| id_table1 | first_name | last_name  | education                   |
+-----------+------------+------------+-----------------------------+
|         1 | Agnes      | Liping     | magistriõpe                 |
|         2 | Elo-Mai    | Mikkelsaar | magistriõpe                 |
|         3 | Maarja     | Nõmmik     | magistriõpe                 |
|         4 | Egle       | Remm       | magistriõpe                 |
|         5 | Helle      | Lõhmus     | bakalaureuseõpe             |
|         6 | Reigo      | Ringo      | bakalaureuseõpe lõpetanud   |
+-----------+------------+------------+-----------------------------+
6 rows in set (0.00 sec)
*/

#Kõik näitused, sorditud peavõtme järgi
select * from exhibition;
/*
+---------------+-----------------------+--------------------+------------+------------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| id_exhibition | title                 | location           | begins     | ends       | description                                                                                                                                                                                                                                                                                                                                                                  |
+---------------+-----------------------+--------------------+------------+------------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
|             1 | TÜ KUNSTIDE OSAKONNA  | kohvikus Gaudeamus | 2014-10-06 | 2014-10-31 | Tartu Ülikooli kunstide osakonna graafika erikursus esitleb üliõpilaste töid. Põhiliselt graafika erikursuse raames on segatud kokku erinevaid tehnikaid, kasutatud isetehtud paberit, trükitud erilisele materjalile, leiutatud materjalitrükki. Kursus lubab eksperimentaalsemat lähenemist nii materjalides, trükitehnilises kui kompositsioonilises lahenduses.          |
|             2 | Aastalõpunäitus       |                    | 2015-11-10 | 2016-01-12 | vinge                                                                                                                                                                                                                                                                                                                                                                        |
|             3 | Karu lendab           |                    | 2016-07-12 | 2015-08-12 | Metsast tuleb karu, sööb seent, talle kasvavad tiivad ja siisiis ta lendab                                                                                                                                                                                                                                                                                                   |
+---------------+-----------------------+--------------------+------------+------------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
3 rows in set (0.00 sec)
*/

#Näituste arv toimumiskohtade kaupa, sorditud toimumiskohtade järgi kahanevalt
select exhibition.location, count(exhibition.id_exhibition) as amount from exhibition group by exhibition.location desc;
/*
| location           | amount |
+--------------------+--------+
| kohvikus Gaudeamus |      1 |
|                    |      2 |
+--------------------+--------+
2 rows in set (0.00 sec)
*/

#Autori lisamine
insert into authors (id_table1, first_name, last_name, education) values (7, 'Liina', 'Lõhmus', 'bakalaureusõpe');
/*
Query OK, 1 row affected (0.03 sec)
*/

#Kõik autorid, sortimise alus peavõti
select * from authors;
/*
+-----------+------------+------------+-----------------------------+
| id_table1 | first_name | last_name  | education                   |
+-----------+------------+------------+-----------------------------+
|         1 | Agnes      | Liping     | magistriõpe                 |
|         2 | Elo-Mai    | Mikkelsaar | magistriõpe                 |
|         3 | Maarja     | Nõmmik     | magistriõpe                 |
|         4 | Egle       | Remm       | magistriõpe                 |
|         5 | Helle      | Lõhmus     | bakalaureuseõpe             |
|         6 | Reigo      | Ringo      | bakalaureuseõpe lõpetanud   |
|         7 | Liina      | Lõhmus     | bakalaureusõpe              |
+-----------+------------+------------+-----------------------------+
7 rows in set (0.00 sec)
*/

/*
 * Autorite ees- ja perenimed: kõik read, kus puudub seos näitusega, sortimise
 * alus peavõti
 */
select first_name, last_name from authors 
join exhibition_has_authors on authors.id_table1!=exhibition_has_authors.authors_id_table1;
/*
+------------+------------+
| first_name | last_name  |
+------------+------------+
| Agnes      | Liping     |
| Agnes      | Liping     |
| Agnes      | Liping     |
| Agnes      | Liping     |
| Agnes      | Liping     |
| Elo-Mai    | Mikkelsaar |
| Elo-Mai    | Mikkelsaar |
| Elo-Mai    | Mikkelsaar |
| Elo-Mai    | Mikkelsaar |
| Elo-Mai    | Mikkelsaar |
| Maarja     | Nõmmik     |
| Maarja     | Nõmmik     |
| Maarja     | Nõmmik     |
| Maarja     | Nõmmik     |
| Maarja     | Nõmmik     |
| Egle       | Remm       |
| Egle       | Remm       |
| Egle       | Remm       |
| Egle       | Remm       |
| Egle       | Remm       |
| Helle      | Lõhmus     |
| Helle      | Lõhmus     |
| Helle      | Lõhmus     |
| Helle      | Lõhmus     |
| Helle      | Lõhmus     |
| Reigo      | Ringo      |
| Reigo      | Ringo      |
| Reigo      | Ringo      |
| Reigo      | Ringo      |
| Reigo      | Ringo      |
| Liina      | Lõhmus     |
| Liina      | Lõhmus     |
| Liina      | Lõhmus     |
| Liina      | Lõhmus     |
| Liina      | Lõhmus     |
| Liina      | Lõhmus     |
+------------+------------+
36 rows in set (0.00 sec)
*/

#Näitusel esinevate autorite ees- ja perenimed, sortimise alus peavõti
select first_name, last_name from authors 
join exhibition_has_authors on authors.id_table1=exhibition_has_authors.authors_id_table1;
/*
+------------+------------+
| first_name | last_name  |
+------------+------------+
| Agnes      | Liping     |
| Elo-Mai    | Mikkelsaar |
| Maarja     | Nõmmik     |
| Egle       | Remm       |
| Helle      | Lõhmus     |
| Reigo      | Ringo      |
+------------+------------+
6 rows in set (0.00 sec)
*/

/*
 * Kõikide autorite ees- ja perenimed sõltumata sellest, kas esinevad näitustel,
 * sortimise alus peavõti
 */
select first_name, last_name from authors 
left join exhibition_has_authors on authors.id_table1=exhibition_has_authors.authors_id_table1;
/*
+------------+------------+
| first_name | last_name  |
+------------+------------+
| Agnes      | Liping     |
| Egle       | Remm       |
| Elo-Mai    | Mikkelsaar |
| Helle      | Lõhmus     |
| Liina      | Lõhmus     |
| Maarja     | Nõmmik     |
| Reigo      | Ringo      |
+------------+------------+
7 rows in set (0.00 sec)
*/

#Näitustel mitteosalevate autorite ees- ja perenimed, sortimise alus peavõti
select first_name, last_name from authors left join exhibition_has_authors on authors.id_table1=exhibition_has_authors.authors_id_table1 where exhibition_has_authors.authors_id_table1 is null;
/*
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Liina      | Lõhmus    |
+------------+-----------+
1 row in set (0.00 sec)
*/

/*
 * Näitustel osalevate autorite ees- ja perenimed "läbi ussiaugu", sortimise
 * alus peavõti
 */
select first_name, last_name from authors 
left join exhibition_has_authors on authors.id_table1=exhibition_has_authors.authors_id_table1 
where exhibition_has_authors.authors_id_table1 is not null;
/*
+------------+------------+
| first_name | last_name  |
+------------+------------+
| Agnes      | Liping     |
| Elo-Mai    | Mikkelsaar |
| Maarja     | Nõmmik     |
| Egle       | Remm       |
| Helle      | Lõhmus     |
| Reigo      | Ringo      |
+------------+------------+
6 rows in set (0.00 sec)
*/