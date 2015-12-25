/*sudo mysql -u root -p < /data/projektid/pstk/databases/Andrus_Kull/Andrus_kivirähk.sql
 * [sudo] password for kalmer: 
 * Enter password: 
sudo mysql mysql -u root -p
 * Enter password: */

/*Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 907
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> grant all on sentence.* to sentence@localhost identified by "Sentence 2015";
Query OK, 0 rows affected (1.86 sec)

mysql> exit
Bye*/

/*kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u sentence -p
Enter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 908
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.*/

## Kuvab tabelid
-- mysql> 
show tables;
/*
+---------------------+
| Tables_in_sentence  |
+---------------------+
| amet                |
| amet_has_isik       |
| isik                |
+---------------------+
7 rows in set (0.00 sec)*/

## kuvab tapeli amet
-- mysql> 
select*from amet;
/*
+---------+-----------------+
| id-amet | amet            |
+---------+-----------------+
|       1 | kirjanik        |
|       2 | näitekirjaniik  |
|       3 | följetonist     |
|       4 | prosaist        |
|       5 | lastekirjanik   |
+---------+-----------------+
5 rows in set (0.00 sec)
*/

## muudab "näitekirjaniik" "näitekirjanik"-ks
-- mysql>
begin; update amet set amet="näitekirjanik" where amet="näitekirjaniik";
-- Query OK, 0 rows affected (0.00 sec)

## kuvame muudatuse
--mysql> 
select*from amet;
/*
+---------+----------------+
| id-amet | amet           |
+---------+----------------+
|       1 | kirjanik       |
|       2 | näitekirjanik  |
|       3 | följetonist    |
|       4 | prosaist       |
|       5 | lastekirjanik  |
+---------+----------------+
5 rows in set (0.00 sec)*/

## võtame muudatuse tagasi
-- mysql> 
rollback;
-- Query OK, 0 rows affected (0.71 sec)

## kuvame muudatused
-- mysql> 
select*from amet;
/*
+---------+-----------------+
| id-amet | amet            |
+---------+-----------------+
|       1 | kirjanik        |
|       2 | näitekirjaniik  |
|       3 | följetonist     |
|       4 | prosaist        |
|       5 | lastekirjanik   |
+---------+-----------------+
5 rows in set (0.00 sec)
*/

## teeme uuesti muudatuse
-- mysql> 
begin; update amet set amet="näitekirjanik" where amet="näitekirjaniik";
-- Query OK, 0 rows affected (0.00 sec)

## kinnitame muudatuse
-- mysql> 
commit;
-- Query OK, 0 rows affected (2.31 sec)
## kuvame tabeli amet sisu
-- mysql> 
select*from amet;
/*
+---------+----------------+
| id-amet | amet           |
+---------+----------------+
|       1 | kirjanik       |
|       2 | näitekirjanik  |
|       3 | följetonist    |
|       4 | prosaist       |
|       5 | lastekirjanik  |
+---------+----------------+
5 rows in set (0.00 sec)
*/

## kuvame tabeli isik sisiu
-- mysql> 
select*from isik;
/*
+----+--------+-----------+------------+-----------+
| id | enimi  | pnimi     | synd       | synnikoht |
+----+--------+-----------+------------+-----------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
+----+--------+-----------+------------+-----------+
1 row in set (0.00 sec)
*/

## kuvame tabeli amet_has_isik sisiu
-- mysql> 
select*from amet_has_isik;
/*
+---------------+---------+------------+------------+
| amet_id-amet1 | isik_id | start      | end        |
+---------------+---------+------------+------------+
|             1 |       1 | 1990-02-27 | 1995-02-27 |
|             2 |       1 | 1995-02-27 | 1996-02-27 |
|             3 |       1 | 1996-02-27 | 1997-02-27 |
|             4 |       1 | 1997-02-27 | 1998-02-27 |
|             5 |       1 | 1999-02-27 | 2000-02-27 |
+---------------+---------+------------+------------+
5 rows in set (0.00 sec)
*/

## kuvame isik ja amet tabeli sisu
-- mysql> 
select*from isik, amet;
/*
+----+--------+-----------+------------+-----------+---------+----------------+
| id | enimi  | pnimi     | synd       | synnikoht | id-amet | amet           |
+----+--------+-----------+------------+-----------+---------+----------------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       1 | kirjanik       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       2 | näitekirjanik  |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       3 | följetonist    |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       4 | prosaist       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       5 | lastekirjanik  |
+----+--------+-----------+------------+-----------+---------+----------------+
5 rows in set (0.00 sec)
*/

## lisame uue inimese tabelisse isik
-- mysql> 
insert into isik values ("", "Ott", "Sepp", "1984-23-03", "Tartu");
-- Query OK, 1 row affected, 2 warnings (0.28 sec)
/*
+----+--------+-----------+------------+-----------+
| id | enimi  | pnimi     | synd       | synnikoht |
+----+--------+-----------+------------+-----------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
|  0 |    Ott | Sepp      | 1984-23-03 | Tartu     |
+----+--------+-----------+------------+-----------+
2 row in set (0.00 sec)
*/
## kuvame uuesti isik ja amet tabeli sisud
-- mysql> 
select*from isik, amet;
/*
+----+--------+-----------+------------+-----------+---------+----------------+
| id | enimi  | pnimi     | synd       | synnikoht | id-amet | amet           |
+----+--------+-----------+------------+-----------+---------+----------------+
|  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |       1 | kirjanik       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       1 | kirjanik       |
|  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |       2 | näitekirjanik  |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       2 | näitekirjanik  |
|  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |       3 | följetonist    |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       3 | följetonist    |
|  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |       4 | prosaist       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       4 | prosaist       |
|  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |       5 | lastekirjanik  |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       5 | lastekirjanik  |
+----+--------+-----------+------------+-----------+---------+----------------+
10 rows in set (0.00 sec)
*/

## kuvame amet ja isik tabeli sisud
-- mysql> 
select*from amet, isik;
/*
+---------+----------------+----+--------+-----------+------------+-----------+
| id-amet | amet           | id | enimi  | pnimi     | synd       | synnikoht |
+---------+----------------+----+--------+-----------+------------+-----------+
|       1 | kirjanik       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |
|       1 | kirjanik       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
|       2 | näitekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |
|       2 | näitekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
|       3 | följetonist    |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |
|       3 | följetonist    |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
|       4 | prosaist       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |
|       4 | prosaist       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
|       5 | lastekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |
|       5 | lastekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |
+---------+----------------+----+--------+-----------+------------+-----------+
10 rows in set (0.00 sec)
*/

## vaatame tabeli isik parameetreid
-- mysql> 
desc isik;
/*
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| id        | int(11)     | NO   | PRI | NULL    |       |
| enimi     | varchar(45) | NO   |     | NULL    |       |
| pnimi     | varchar(45) | NO   |     | NULL    |       |
| synd      | date        | NO   |     | NULL    |       |
| synnikoht | varchar(45) | NO   |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
5 rows in set (2.13 sec)
*/

## kuvame amet, isik ja amet_has_isik tabelite sisud
-- mysql> 
select*from amet, isik, amet_has_isik;
/*
+---------+----------------+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
| id-amet | amet           | id | enimi  | pnimi     | synd       | synnikoht | amet_id-amet1 | isik_id | start      | end        |
+---------+----------------+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
|       1 | kirjanik       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       1 | kirjanik       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       2 | näitekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       2 | näitekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       3 | följetonist    |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       3 | följetonist    |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       4 | prosaist       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       4 | prosaist       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       5 | lastekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       5 | lastekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
|       1 | kirjanik       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       1 | kirjanik       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       2 | näitekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       2 | näitekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       3 | följetonist    |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       3 | följetonist    |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       4 | prosaist       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       4 | prosaist       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       5 | lastekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       5 | lastekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |
|       1 | kirjanik       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       1 | kirjanik       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       2 | näitekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       2 | näitekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       3 | följetonist    |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       3 | följetonist    |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       4 | prosaist       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       4 | prosaist       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       5 | lastekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       5 | lastekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |
|       1 | kirjanik       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       1 | kirjanik       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       2 | näitekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       2 | näitekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       3 | följetonist    |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       3 | följetonist    |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       4 | prosaist       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       4 | prosaist       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       5 | lastekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       5 | lastekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |
|       1 | kirjanik       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       1 | kirjanik       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       2 | näitekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       2 | näitekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       3 | följetonist    |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       3 | följetonist    |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       4 | prosaist       |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       4 | prosaist       |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       5 | lastekirjanik  |  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |             5 |       1 | 1999-02-27 | 2000-02-27 |
|       5 | lastekirjanik  |  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |
+---------+----------------+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
50 rows in set (0.00 sec)
*/

## kuvame tabeli isik tulpa enimi
-- mysql> 
select enimi from isik;
/*
+--------+
| enimi  |
+--------+
| Ott    |
| Andrus |
+--------+
2 rows in set (0.00 sec)
*/

## kuvame tabeli isik tulba enimi id`le 1 vastavat nime
-- mysql> 
select enimi from isik where id="1";
/*
+--------+
| enimi  |
+--------+
| Andrus |
+--------+
1 row in set (0.12 sec)
*/

## kuvame tabeli isik tulba pnimi id`le 1 vastavat nime
-- mysql> 
select pnimi from isik where id="1";
/*
+-----------+
| pnimi     |
+-----------+
| Kivirähk  |
+-----------+
1 row in set (0.00 sec)
*/

## kuvame tabeli isik tulba enimi id`le 1 vastavat nime
-- mysql> 
select enimi from isik where id="1";
/*
+--------+
| enimi  |
+--------+
| Andrus |
+--------+
1 row in set (0.01 sec)
*/

## kuvame tabelitest isik, amet ja amet_has_isik, sorteerimise alus peavõti
-- mysql> 
select*from isik, amet, amet_has_isik  where isik.id=isik_id and amet.`id-amet`=`amet_id-amet1`;
/*
+----+--------+-----------+------------+-----------+---------+----------------+---------------+---------+------------+------------+
| id | enimi  | pnimi     | synd       | synnikoht | id-amet | amet           | amet_id-amet1 | isik_id | start      | end        |
+----+--------+-----------+------------+-----------+---------+----------------+---------------+---------+------------+------------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       1 | kirjanik       |             1 |       1 | 1990-02-27 | 1995-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       2 | näitekirjanik  |             2 |       1 | 1995-02-27 | 1996-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       3 | följetonist    |             3 |       1 | 1996-02-27 | 1997-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       4 | prosaist       |             4 |       1 | 1997-02-27 | 1998-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |       5 | lastekirjanik  |             5 |       1 | 1999-02-27 | 2000-02-27 |
+----+--------+-----------+------------+-----------+---------+----------------+---------------+---------+------------+------------+
5 rows in set (0.00 sec)
*/

## tabeli isik ja amet_has_isik ning amet andmete kuvamine seoseliselt, kasutades peavõtit
-- mysql> 
select*from isik join amet_has_isik on isik.id=isik_id join amet on amet.`id-amet`=`amet_id-amet1`;
/*
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+---------+----------------+
| id | enimi  | pnimi     | synd       | synnikoht | amet_id-amet1 | isik_id | start      | end        | id-amet | amet           |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+---------+----------------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |       1 | kirjanik       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |       2 | näitekirjanik  |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |       3 | följetonist    |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |       4 | prosaist       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |       5 | lastekirjanik  |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+---------+----------------+
5 rows in set (0.00 sec)
*/

## tabeli isik ja amet_has_isik ning amet andmete kuvamine vasakseoseliselt, kasutades peavõtit
-- mysql> 
select*from isik left join amet_has_isik on isik.id=isik_id join amet on amet.`id-amet`=`amet_id-amet1`;
/*
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+---------+----------------+
| id | enimi  | pnimi     | synd       | synnikoht | amet_id-amet1 | isik_id | start      | end        | id-amet | amet           |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+---------+----------------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |       1 | kirjanik       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |       2 | näitekirjanik  |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |       3 | följetonist    |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |       4 | prosaist       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |       5 | lastekirjanik  |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+---------+----------------+
5 rows in set (0.00 sec)
*/

## tabeli isik ja amet_has_isik vasakseose kuvamine peavõtme abil
-- mysql> 
select*from isik left join amet_has_isik on isik.id=isik_id;
/*
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
| id | enimi  | pnimi     | synd       | synnikoht | amet_id-amet1 | isik_id | start      | end        |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
|  0 | Ott    | Sepp      | 0000-00-00 | Tartu     |          NULL |    NULL | NULL       | NULL       |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             2 |       1 | 1995-02-27 | 1996-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             3 |       1 | 1996-02-27 | 1997-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             4 |       1 | 1997-02-27 | 1998-02-27 |
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             5 |       1 | 1999-02-27 | 2000-02-27 |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
6 rows in set (0.00 sec)
*/

## tabeli isik ja amet vasakseose kuvamine peavõtme abil tulbdest id, enimi, isik_id
-- mysql> 
select id, enimi, isik_id from isik left join amet_has_isik on isik.id=isik_id;
/*
+----+--------+---------+
| id | enimi  | isik_id |
+----+--------+---------+
|  0 | Ott    |    NULL |
|  1 | Andrus |       1 |
|  1 | Andrus |       1 |
|  1 | Andrus |       1 |
|  1 | Andrus |       1 |
|  1 | Andrus |       1 |
+----+--------+---------+
6 rows in set (0.00 sec)
*/

## tabeli isik ja amet_has_isik vasakseose kuvamine peavõtme abil tulpadest id, enimi, isik_id, amet_id-amet1
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1` from isik left join amet_has_isik on isik.id=isik_id;
/*
+----+--------+---------+---------------+
| id | enimi  | isik_id | amet_id-amet1 |
+----+--------+---------+---------------+
|  0 | Ott    |    NULL |          NULL |
|  1 | Andrus |       1 |             1 |
|  1 | Andrus |       1 |             2 |
|  1 | Andrus |       1 |             3 |
|  1 | Andrus |       1 |             4 |
|  1 | Andrus |       1 |             5 |
+----+--------+---------+---------------+
6 rows in set (0.00 sec)
*/
## tabelite isik ja amet_has_isik vasakseose ning tabeli amet paremseose kuvamine peavõtme abil tulpadest id, enimi, isik_id, amet_id-amet1
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1` from isik left join amet_has_isik on isik.id=isik_id right join amet on `amet_id-amet1`=amet.`id-amet`;
/*
+------+--------+---------+---------------+
| id   | enimi  | isik_id | amet_id-amet1 |
+------+--------+---------+---------------+
|    1 | Andrus |       1 |             1 |
|    1 | Andrus |       1 |             2 |
|    1 | Andrus |       1 |             3 |
|    1 | Andrus |       1 |             4 |
|    1 | Andrus |       1 |             5 |
+------+--------+---------+---------------+
5 rows in set (0.00 sec)
*/
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1` from isik left join amet_has_isik on isik.id=isik_id left join amet on `amet_id-amet1`=amet.`id-amet`;
/*
+----+--------+---------+---------------+
| id | enimi  | isik_id | amet_id-amet1 |
+----+--------+---------+---------------+
|  0 | Ott    |    NULL |          NULL |
|  1 | Andrus |       1 |             1 |
|  1 | Andrus |       1 |             2 |
|  1 | Andrus |       1 |             3 |
|  1 | Andrus |       1 |             4 |
|  1 | Andrus |       1 |             5 |
+----+--------+---------+---------------+
6 rows in set (0.00 sec)
*/
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1`, amet from isik left join amet_has_isik on isik.id=isik_id left join amet on `amet_id-amet1`=amet.`id-amet`;
/*
+----+--------+---------+---------------+----------------+
| id | enimi  | isik_id | amet_id-amet1 | amet           |
+----+--------+---------+---------------+----------------+
|  0 | Ott    |    NULL |          NULL | NULL           |
|  1 | Andrus |       1 |             1 | kirjanik       |
|  1 | Andrus |       1 |             2 | näitekirjanik  |
|  1 | Andrus |       1 |             3 | följetonist    |
|  1 | Andrus |       1 |             4 | prosaist       |
|  1 | Andrus |       1 |             5 | lastekirjanik  |
+----+--------+---------+---------------+----------------+
6 rows in set (0.01 sec)
*/
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1` from isik left join amet_has_isik on isik.id=isik_id left join amet on amet.`id-amet`=`amet_id-amet1`;
/*
+----+--------+---------+---------------+
| id | enimi  | isik_id | amet_id-amet1 |
+----+--------+---------+---------------+
|  0 | Ott    |    NULL |          NULL |
|  1 | Andrus |       1 |             1 |
|  1 | Andrus |       1 |             2 |
|  1 | Andrus |       1 |             3 |
|  1 | Andrus |       1 |             4 |
|  1 | Andrus |       1 |             5 |
+----+--------+---------+---------------+
6 rows in set (0.00 sec)
*/
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1` from isik left join amet_has_isik on isik.id=isik_id right join amet on amet.`id-amet`=`amet_id-amet1`;
/*
+------+--------+---------+---------------+
| id   | enimi  | isik_id | amet_id-amet1 |
+------+--------+---------+---------------+
|    1 | Andrus |       1 |             1 |
|    1 | Andrus |       1 |             2 |
|    1 | Andrus |       1 |             3 |
|    1 | Andrus |       1 |             4 |
|    1 | Andrus |       1 |             5 |
+------+--------+---------+---------------+
5 rows in set (0.00 sec)
*/
-- mysql> 
select id, enimi, isik_id, `amet_id-amet1` from isik left join amet_has_isik on isik.id=isik_id right join amet on amet_has_isik.`amet_id-amet1`=`id-amet`;
/*
+------+--------+---------+---------------+
| id   | enimi  | isik_id | amet_id-amet1 |
+------+--------+---------+---------------+
|    1 | Andrus |       1 |             1 |
|    1 | Andrus |       1 |             2 |
|    1 | Andrus |       1 |             3 |
|    1 | Andrus |       1 |             4 |
|    1 | Andrus |       1 |             5 |
+------+--------+---------+---------------+
5 rows in set (0.00 sec)
*/

## tabeli amet tulba amet kuvamine sorteerides tähestikulises järjekorras tagant poolt
-- mysql> 
select amet from amet order by amet desc; 
/*
+----------------+
| amet           |
+----------------+
| prosaist       |
| näitekirjanik  |
| lastekirjanik  |
| kirjanik       |
| följetonist    |
+----------------+
5 rows in set (0.00 sec)
*/
-- mysql> 
select*from isik join amet_has_isik on isik.id=`amet_id-amet1`;
/*
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
| id | enimi  | pnimi     | synd       | synnikoht | amet_id-amet1 | isik_id | start      | end        |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
|  1 | Andrus | Kivirähk  | 1970-08-17 | Tallinn   |             1 |       1 | 1990-02-27 | 1995-02-27 |
+----+--------+-----------+------------+-----------+---------------+---------+------------+------------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi from isik  join amet_has_isik on isik.id=`amet_id-amet1`;
/*
+--------+
| enimi  |
+--------+
| Andrus |
+--------+
1 row in set (0.00 sec)
*/

## tabelite isik ja amet_has_isik seoseloomine kasutades peavõtit ning kuvatakse tulbad enimi ja tabelis amet_has_isik kõik seotud andmed grupeeritult enime tulba järgi
-- mysql> 
select enimi, amet_has_isik.* from isik  join amet_has_isik on isik.id=`amet_id-amet1` group by enimi;
/*
+--------+---------------+---------+------------+------------+
| enimi  | amet_id-amet1 | isik_id | start      | end        |
+--------+---------------+---------+------------+------------+
| Andrus |             1 |       1 | 1990-02-27 | 1995-02-27 |
+--------+---------------+---------+------------+------------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi, amet_has_isik.* from isik  join amet_has_isik on isik.id=isik_id group by enimi;
/*
+--------+---------------+---------+------------+------------+
| enimi  | amet_id-amet1 | isik_id | start      | end        |
+--------+---------------+---------+------------+------------+
| Andrus |             1 |       1 | 1990-02-27 | 1995-02-27 |
+--------+---------------+---------+------------+------------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi, amet_has_isik.* from isik  join amet_has_isik on isik.id=isik_id;
/*
+--------+---------------+---------+------------+------------+
| enimi  | amet_id-amet1 | isik_id | start      | end        |
+--------+---------------+---------+------------+------------+
| Andrus |             1 |       1 | 1990-02-27 | 1995-02-27 |
| Andrus |             2 |       1 | 1995-02-27 | 1996-02-27 |
| Andrus |             3 |       1 | 1996-02-27 | 1997-02-27 |
| Andrus |             4 |       1 | 1997-02-27 | 1998-02-27 |
| Andrus |             5 |       1 | 1999-02-27 | 2000-02-27 |
+--------+---------------+---------+------------+------------+
5 rows in set (0.00 sec)
*/
-- mysql> 
select enimi, count(`amet_id-amet1`) from isik  join amet_has_isik on isik.id=isik_id group by enimi;
/*
+--------+------------------------+
| enimi  | count(`amet_id-amet1`) |
+--------+------------------------+
| Andrus |                      5 |
+--------+------------------------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi, count(`amet_id-amet1`) as ametid from isik  join amet_has_isik on isik.id=isik_id group by enimi;
/*
+--------+--------+
| enimi  | ametid |
+--------+--------+
| Andrus |      5 |
+--------+--------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi, count(`amet_id-amet1`) as ametid from isik left join amet_has_isik on isik.id=isik_id group by enimi;
/*
+--------+--------+
| enimi  | ametid |
+--------+--------+
| Andrus |      5 |
| Ott    |      0 |
+--------+--------+
2 rows in set (0.00 sec)
*/

## tabelite isik ja amet_has_isik vasakseose kuvamine kasutades tulpasid enimi ja amet_id-amet1 mittetühjade väljde seosga null andmed, nimetades ümber tulp amet_id-ameat1 >> ametid
-- mysql> 
select enimi, count(`amet_id-amet1`) as ametid from isik left join amet_has_isik on isik.id=isik_id where `amet_id-amet1` is NULL;
/*
+-------+--------+
| enimi | ametid |
+-------+--------+
| Ott   |      0 |
+-------+--------+
1 row in set (0.00 sec)
*/
## tabelite isik ja amet_has_isik vasakseose kuvamine kasutades tulpasid enimi ja amet_id-amet1 mittetühjad väljad grupeerides enimi tabeli alusel ja vähem võrdne 1, nimetades ümber tulp amet_id-ameat1 >> ametid
-- mysql> 
select enimi, count(`amet_id-amet1`) as ametid from isik left join amet_has_isik on isik.id=isik_id group by enimi having ametid<=1;
/*
+-------+--------+
| enimi | ametid |
+-------+--------+
| Ott   |      0 |
+-------+--------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi, count(`amet_id-amet1`) as ametid from isik left join amet_has_isik on isik.id=isik_id group by enimi having ametid>=1;
/*
+--------+--------+
| enimi  | ametid |
+--------+--------+
| Andrus |      5 |
+--------+--------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi, count(`amet_id-amet1`) as ametid from isik left join amet_has_isik on isik.id=isik_id group by enimi having ametid>0; 
/*
+--------+--------+
| enimi  | ametid |
+--------+--------+
| Andrus |      5 |
+--------+--------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi from isik  join amet_has_isik on isik.id=isik_id; 
/*
+--------+
| enimi  |
+--------+
| Andrus |
| Andrus |
| Andrus |
| Andrus |
| Andrus |
+--------+
5 rows in set (0.00 sec)
*/
-- mysql> 
select distinct enimi from isik  join amet_has_isik on isik.id=isik_id;
/*
+--------+
| enimi  |
+--------+
| Andrus |
+--------+
1 row in set (0.00 sec)
*/
## kuvame tabelite isik ja amet ning seome tabeli sisud ühte tabelisse
-- mysql> 
select enimi from isik union select amet from amet;
/*
+----------------+
| enimi          |
+----------------+
| Ott            |
| Andrus         |
| kirjanik       |
| näitekirjanik  |
| följetonist    |
| prosaist       |
| lastekirjanik  |
+----------------+
7 rows in set (0.00 sec)
*/
-- mysql> 
select enimi as nimed from isik union select amet from amet;
/*
+----------------+
| nimed          |
+----------------+
| Ott            |
| Andrus         |
| kirjanik       |
| näitekirjanik  |
| följetonist    |
| prosaist       |
| lastekirjanik  |
+----------------+
7 rows in set (0.00 sec)
*/
-- mysql> 
## kuvame tabeli amet_has_isik start ja end andmed
select start, end from amet_has_isik join amet on `amet_id-amet1`=`id-amet`;
/*
+------------+------------+
| start      | end        |
+------------+------------+
| 1990-02-27 | 1995-02-27 |
| 1995-02-27 | 1996-02-27 |
| 1996-02-27 | 1997-02-27 |
| 1997-02-27 | 1998-02-27 |
| 1999-02-27 | 2000-02-27 |
+------------+------------+
5 rows in set (0.00 sec)
*/
## kuvame tamelite amet_has_isik andmed alates 1995-01-01 ja lõpetades 1997-12-31 kasutades peavõtit
-- mysql> 
select start, end from amet_has_isik join amet on `amet_id-amet1`=`id-amet` where start>="1995-01-01" and end<="1997-12-31";
/*
+------------+------------+
| start      | end        |
+------------+------------+
| 1995-02-27 | 1996-02-27 |
| 1996-02-27 | 1997-02-27 |
+------------+------------+
2 rows in set (0.01 sec)
*/
-- mysql> 
select start, end from amet_has_isik join amet on `amet_id-amet1`=`id-amet` where start>="1995-01-01" and start<="1997-12-31";
/*
+------------+------------+
| start      | end        |
+------------+------------+
| 1995-02-27 | 1996-02-27 |
| 1996-02-27 | 1997-02-27 |
| 1997-02-27 | 1998-02-27 |
+------------+------------+
3 rows in set (0.01 sec)
*/
-- mysql> 
select start, end from amet_has_isik join amet on `amet_id-amet1`=`id-amet` where start between "1995-01-01" and "1997-12-31";
/*
+------------+------------+
| start      | end        |
+------------+------------+
| 1995-02-27 | 1996-02-27 |
| 1996-02-27 | 1997-02-27 |
| 1997-02-27 | 1998-02-27 |
+------------+------------+
3 rows in set (0.00 sec)
*/
-- mysql> 
select `id-amet`, amet from amet where `id-amet`="2"; 
/*
+---------+----------------+
| id-amet | amet           |
+---------+----------------+
|       2 | näitekirjanik  |
+---------+----------------+
1 row in set (0.00 sec)
*/
-- mysql> 
select `id-amet` from amet where `id-amet`="2" union select amet from amet where amet="prosaist"; 
/*
+----------+
| id-amet  |
+----------+
| 2        |
| prosaist |
+----------+
2 rows in set (0.00 sec)
*/
-- mysql> 
select `id-amet`, amet from amet where `id-amet`="2" union select `id-amet`, amet from amet where amet="prosaist";
/*
+---------+----------------+
| id-amet | amet           |
+---------+----------------+
|       2 | näitekirjanik  |
|       4 | prosaist       |
+---------+----------------+
2 rows in set (0.01 sec)
*/
-- mysql> 
select `id-amet`, amet from amet where `id-amet`="2" or amet="prosaist";
/*
+---------+----------------+
| id-amet | amet           |
+---------+----------------+
|       2 | näitekirjanik  |
|       4 | prosaist       |
+---------+----------------+
2 rows in set (0.00 sec)
*/
## kuvame andmed kirjanik tabelist amet tulbast amet
-- mysql> 
select amet from amet where amet like "kirjanik";
/*
+----------+
| amet     |
+----------+
| kirjanik |
+----------+
1 row in set (0.00 sec)
*/
## kuvame andmed sisaldades sõna kirjanik
-- mysql> 
select amet from amet where amet like "%kirjanik%";
/*
+----------------+
| amet           |
+----------------+
| kirjanik       |
| näitekirjanik  |
| lastekirjanik  |
+----------------+
3 rows in set (0.00 sec)
*/
## ei tea, kas on nimi Andrus või Andres
-- mysql> 
select enimi from isik where enimi like "Andr_s";
/*
+--------+
| enimi  |
+--------+
| Andrus |
+--------+
1 row in set (0.00 sec)
*/
-- mysql> 
select enimi from isik where enimi like "andr_s";
/*
+--------+
| enimi  |
+--------+
| Andrus |
+--------+
1 row in set (0.00 sec)
*/
## kuva kirjed tabelis amet tulbas amet 2-4
-- mysql> 
select amet from amet limit 1, 3;
/*
+----------------+
| amet           |
+----------------+
| näitekirjanik  |
| följetonist    |
| prosaist       |
+----------------+
3 rows in set (0.00 sec)
*/
## kuva kirjed tabelis amet tulbas amet 1-3
-- mysql> 
select amet from amet limit 0, 3;
/*
+----------------+
| amet           |
+----------------+
| kirjanik       |
| näitekirjanik  |
| följetonist    |
+----------------+
3 rows in set (0.00 sec)
*/