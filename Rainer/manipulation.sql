mysql> SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| andmebaas          |
| car_demolishment   |
| d20843sd22462      |
| databases          |
| ice-design         |
| kuca               |
| mydb               |
| mysql              |
| np46540_EKTeL      |
| olympiaad          |
| performance_schema |
| phpmyadmin         |
| sentence           |
| signatures         |
| sooduskaart        |
| stratee_web2       |
| tennis             |
| tennis24           |
| test               |
| tlvideo            |
| tvSeries           |
| web2_cms           |
| wo                 |
| xcart              |
+--------------------+
25 rows in set (0.07 sec)

mysql> use sentence;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+---------------------+
| Tables_in_sentence  |
+---------------------+
| Inimene             |
| amet                |
| amet_has_isik       |
| asukoht             |
| inimene             |
| inimene_has_asukoht |
| isik                |
+---------------------+
7 rows in set (0.00 sec)

mysql> quit;
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -h -u databases -p </data/projektid/pstk/databases/Rainer/sentence.sql
[sudo] password for kalmer: 
Enter password: 
ERROR 2005 (HY000): Unknown MySQL server host '-u' (2)
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u databases -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1054 (42S22) at line 21: Unknown column 'dateOfBirth' in 'field list'
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -p
Enter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u sentence -p
Enter password: 
ERROR 1045 (28000): Access denied for user 'sentence'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -p
Enter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 940
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show tables
    -> ;
+---------------------+
| Tables_in_sentence  |
+---------------------+
| Inimene             |
| amet                |
| amet_has_isik       |
| asukoht             |
| inimene             |
| inimene_has_asukoht |
| isik                |
+---------------------+
7 rows in set (0.00 sec)

mysql> desc inimene;
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| idinimene | int(11)     | NO   | PRI | NULL    | auto_increment |
| eesnimi   | varchar(45) | YES  |     | NULL    |                |
| perenimi  | varchar(45) | YES  |     | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
3 rows in set (0.85 sec)

mysql> desc Inimene;
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| idInimene  | int(11)     | NO   | PRI | NULL    |       |
| Eesnimi    | varchar(45) | NO   |     | NULL    |       |
| Perenimi   | varchar(45) | NO   |     | NULL    |       |
| Sünniaeg   | datetime    | YES  |     | NULL    |       |
| Sünnikoht  | varchar(45) | YES  |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+
5 rows in set (1.04 sec)

mysql> quit
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -p
Enter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1064 (42000) at line 57: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'idRoll=1, IdInimene = 1' at line 1
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1062 (23000) at line 21: Duplicate entry '1' for key 'PRIMARY'
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 944
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> select * from Roll_has_Inimene
    -> ;
Empty set (0.01 sec)

mysql> select * from Inimene
    -> ;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Rainer  | Vakra    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> truncate table Inimene;
ERROR 1701 (42000): Cannot truncate a table referenced in a foreign key constraint (`sentence`.`Roll_has_Inimene`, CONSTRAINT `fk_Roll_has_Inimene_Inimene1` FOREIGN KEY (`Inimene_idInimene`) REFERENCES `sentence`.`Inimene` (`idInimene`))
mysql> delete from Inimene;
Query OK, 1 row affected (0.50 sec)

mysql> quit
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1062 (23000) at line 33: Duplicate entry '1' for key 'PRIMARY'
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 946
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> Begin;
Query OK, 0 rows affected (0.00 sec)

mysql> delete from Inimene, Roll;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1
mysql> delete Inimene, Roll from Inimene, Roll;
Query OK, 4 rows affected (0.04 sec)

mysql> quit
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1062 (23000) at line 21: Duplicate entry '1' for key 'PRIMARY'
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 948
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> delete Inimene, Roll from Inimene, Roll;
Query OK, 4 rows affected (0.04 sec)

mysql> select 
    -> * from inimene;
+-----------+---------+----------+
| idinimene | eesnimi | perenimi |
+-----------+---------+----------+
|         1 | Tambet  | Song     |
|         2 | Jüri    | Pikmaa   |
|         3 | Jüri    | Ild      |
+-----------+---------+----------+
3 rows in set (0.00 sec)

mysql> select * from Inimene;
Empty set (0.00 sec)

mysql> 
mysql> select * from Roll;
Empty set (0.00 sec)

mysql> Insert into sentence.`Inimene` SET idInimene = 1, Eesnimi = 'Rainer', Perenimi= 'Vakra', `Sünniaeg` = '1981-03-10' , Sünnikoht = 'Tallinn';
Query OK, 1 row affected (1.01 sec)

mysql> delete Inimene, Roll from Inimene, Roll;
Query OK, 0 rows affected (0.00 sec)

mysql> select * from Inimene;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Rainer  | Vakra    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> select  * from inimene;
+-----------+---------+----------+
| idinimene | eesnimi | perenimi |
+-----------+---------+----------+
|         1 | Tambet  | Song     |
|         2 | Jüri    | Pikmaa   |
|         3 | Jüri    | Ild      |
+-----------+---------+----------+
3 rows in set (0.00 sec)

mysql> delete Inimene, Roll from Inimene, Roll;
Query OK, 0 rows affected (0.00 sec)

mysql> delete Inimene, from Inimene;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from Inimene' at line 1
mysql> delete Inimene from Inimene;
Query OK, 1 row affected (0.03 sec)

mysql> quit
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
ERROR 1054 (42S22) at line 57: Unknown column 'idRoll' in 'field list'
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 950
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> delete Inimene, Roll from Inimene, Roll;
Query OK, 4 rows affected (0.70 sec)

mysql> quit
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p </data/projektid/pstk/databases/Rainer/sentence.sql
Enter password: 
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 952
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> select * from Inimene;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Rainer  | Vakra    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> select * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  | Nõmme   |        0 |
|      2 | riigikogu liige | Tallinn |        1 |
|      3 | poliitik        | Tallinn |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+
| Roll_idRoll | Inimene_idInimene |
+-------------+-------------------+
|           1 |                 1 |
|           2 |                 1 |
|           3 |                 1 |
+-------------+-------------------+
3 rows in set (0.00 sec)

mysql> begin;
Query OK, 0 rows affected (0.00 sec)

mysql> delete from Inimene where idInimene=1;
Query OK, 1 row affected (0.04 sec)

mysql> select * from Inimene;
Empty set (0.00 sec)

mysql> rollback;
Query OK, 0 rows affected (0.04 sec)

mysql> select * from Inimene;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Rainer  | Vakra    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> show create table Roll_has_Inimene;
+------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table            | Create Table                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         |
+------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Roll_has_Inimene | CREATE TABLE `Roll_has_Inimene` (
  `Roll_idRoll` int(11) NOT NULL,
  `Inimene_idInimene` int(11) NOT NULL,
  PRIMARY KEY (`Roll_idRoll`,`Inimene_idInimene`),
  KEY `fk_Roll_has_Inimene_Inimene1_idx` (`Inimene_idInimene`),
  KEY `fk_Roll_has_Inimene_Roll_idx` (`Roll_idRoll`),
  CONSTRAINT `fk_Roll_has_Inimene_Roll` FOREIGN KEY (`Roll_idRoll`) REFERENCES `Roll` (`idRoll`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Roll_has_Inimene_Inimene1` FOREIGN KEY (`Inimene_idInimene`) REFERENCES `Inimene` (`idInimene`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 |
+------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.01 sec)

mysql> ALTER TABLE fk_Roll_has_Inimene_Roll DROP FOREIGN KEY from fk_Roll_has_Inimene_Roll;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fk_Roll_has_Inimene_Roll' at line 1
mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY from Roll_has_Inimene;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from Roll_has_Inimene' at line 1
mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY from fk_Roll_has_Inimene_Inimene1;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from fk_Roll_has_Inimene_Inimene1' at line 1
mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY fk_Roll_has_Inimene_Inimene1;
Query OK, 3 rows affected (0.51 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE Roll_has_Inimene ADD CONSTRAINT fromInimeneToRoll_has_Inimene FOREIGN KEY (Inimene_idInimene) REFERENCES Inimene (idInimene)
    -> ;
Query OK, 3 rows affected (0.29 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY fromInimeneToRolll_has_Inimene;
ERROR 1025 (HY000): Error on rename of './sentence/Roll_has_Inimene' to './sentence/#sql2-506-3b8' (errno: 152)
mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY InimeneToRolll_has_Inimene;
ERROR 1025 (HY000): Error on rename of './sentence/Roll_has_Inimene' to './sentence/#sql2-506-3b8' (errno: 152)
mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY fromInimeneToRolll_has_Inimene;
ERROR 1025 (HY000): Error on rename of './sentence/Roll_has_Inimene' to './sentence/#sql2-506-3b8' (errno: 152)
mysql> quit
Bye
kalmer@kalmer-HP-ProBook-4520s:~$ sudo mysql -u root -p
[sudo] password for kalmer: 
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 953
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use sentence;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show engine InnoDB status;
+--------+------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Type   | Name | Status                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           |
+--------+------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| InnoDB |      | 
=====================================
150221 14:03:17 INNODB MONITOR OUTPUT
=====================================
Per second averages calculated from the last 52 seconds
-----------------
BACKGROUND THREAD
-----------------
srv_master_thread loops: 511 1_second, 510 sleeps, 41 10_second, 125 background, 125 flush
srv_master_thread log flush and writes: 535
----------
SEMAPHORES
----------
OS WAIT ARRAY INFO: reservation count 73, signal count 73
Mutex spin waits 48, rounds 277, OS waits 7
RW-shared spins 64, rounds 1920, OS waits 64
RW-excl spins 0, rounds 73, OS waits 2
Spin rounds per wait: 5.77 mutex, 30.00 RW-shared, 73.00 RW-excl
------------------------
LATEST FOREIGN KEY ERROR
------------------------
150221 14:02:22 Error in dropping of a foreign key constraint of table "sentence"."Roll_has_Inimene",
in SQL command
ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY fromInimeneToRolll_has_Inimene
Cannot find a constraint with the given id "fromInimeneToRolll_has_Inimene".
------------
TRANSACTIONS
------------
Trx id counter 1373A
Purge done for trx's n:o < 1373A undo n:o < 0
History list length 1112
LIST OF TRANSACTIONS FOR EACH SESSION:
---TRANSACTION 0, not started
MySQL thread id 953, OS thread handle 0xa6affb40, query id 3555 localhost root
show engine InnoDB status
--------
FILE I/O
--------
I/O thread 0 state: waiting for completed aio requests (insert buffer thread)
I/O thread 1 state: waiting for completed aio requests (log thread)
I/O thread 2 state: waiting for completed aio requests (read thread)
I/O thread 3 state: waiting for completed aio requests (read thread)
I/O thread 4 state: waiting for completed aio requests (read thread)
I/O thread 5 state: waiting for completed aio requests (read thread)
I/O thread 6 state: waiting for completed aio requests (write thread)
I/O thread 7 state: waiting for completed aio requests (write thread)
I/O thread 8 state: waiting for completed aio requests (write thread)
I/O thread 9 state: waiting for completed aio requests (write thread)
Pending normal aio reads: 0 [0, 0, 0, 0] , aio writes: 0 [0, 0, 0, 0] ,
 ibuf aio reads: 0, log i/o's: 0, sync i/o's: 0
Pending flushes (fsync) log: 0; buffer pool: 0
2804 OS file reads, 1298 OS file writes, 435 OS fsyncs
0.00 reads/s, 0 avg bytes/read, 0.54 writes/s, 0.12 fsyncs/s
-------------------------------------
INSERT BUFFER AND ADAPTIVE HASH INDEX
-------------------------------------
Ibuf: size 1, free list len 5, seg size 7, 0 merges
merged operations:
 insert 0, delete mark 0, delete 0
discarded operations:
 insert 0, delete mark 0, delete 0
Hash table size 553193, node heap has 4 buffer(s)
0.00 hash searches/s, 0.37 non-hash searches/s
---
LOG
---
Log sequence number 1384525690
Log flushed up to   1384525690
Last checkpoint at  1384525690
0 pending log writes, 0 pending chkp writes
279 log i/o's done, 0.04 log i/o's/second
----------------------
BUFFER POOL AND MEMORY
----------------------
Total memory allocated 135987200; in additional pool allocated 0
Dictionary memory allocated 1702659
Buffer pool size   8191
Free buffers       5360
Database pages     2827
Old database pages 1051
Modified db pages  0
Pending reads 0
Pending writes: LRU 0, flush list 0, single page 0
Pages made young 0, not young 0
0.00 youngs/s, 0.00 non-youngs/s
Pages read 2793, created 34, written 944
0.00 reads/s, 0.00 creates/s, 0.46 writes/s
Buffer pool hit rate 1000 / 1000, young-making rate 0 / 1000 not 0 / 1000
Pages read ahead 0.00/s, evicted without access 0.00/s, Random read ahead 0.00/s
LRU len: 2827, unzip_LRU len: 0
I/O sum[0]:cur[0], unzip sum[0]:cur[0]
--------------
ROW OPERATIONS
--------------
0 queries inside InnoDB, 0 queries in queue
1 read views open inside InnoDB
Main thread process no. 1286, id 2792020800, state: waiting for server activity
Number of rows inserted 159, updated 13, deleted 19, read 261
0.00 inserts/s, 0.00 updates/s, 0.00 deletes/s, 0.00 reads/s
----------------------------
END OF INNODB MONITOR OUTPUT
============================
 |
+--------+------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.06 sec)

mysql> ALTER TABLE Roll_has_Inimene DROP FOREIGN KEY fromInimeneToRoll_has_Inimene;
Query OK, 3 rows affected (1.68 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE Roll_has_Inimene ADD CONSTRAINT fromInimeneToRoll_has_Inimene FOREIGN KEY (Inimene_idInimene) REFERENCES Inimene (idInimene) on update cascade;
Query OK, 3 rows affected (0.70 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> begin;
Query OK, 0 rows affected (0.00 sec)

mysql> delete from Inimene where idInimene=1;ERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constraint fails (`sentence`.`Roll_has_Inimene`, CONSTRAINT `fromInimeneToRoll_has_Inimene` FOREIGN KEY (`Inimene_idInimene`) REFERENCES `Inimene` (`idInimene`) ON UPDATE CASCADE)
mysql> rollback
    -> ;
Query OK, 0 rows affected (0.83 sec)

mysql> select * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  | Nõmme   |        0 |
|      2 | riigikogu liige | Tallinn |        1 |
|      3 | poliitik        | Tallinn |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+
| Roll_idRoll | Inimene_idInimene |
+-------------+-------------------+
|           1 |                 1 |
|           2 |                 1 |
|           3 |                 1 |
+-------------+-------------------+
3 rows in set (0.00 sec)

mysql> alter table Roll_has_Inimene add column asukoht tinytext, Praegune tinytext;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Praegune tinytext' at line 1
mysql> alter table Roll_has_Inimene add column asukoht tinytext, Praegune bool;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Praegune bool' at line 1
mysql> alter table Roll_has_Inimene add column asukoht tinytext
    -> ;
Query OK, 3 rows affected (0.30 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> alter table Roll_has_Inimene add column Praegune bool;
Query OK, 3 rows affected (0.69 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> update Roll_has_Inimene join Roll ^Z
[1]+  Peatatud                sudo mysql -u root -p
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -p
Enter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -pEnter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -p
Enter password: 
ERROR 1045 (28000): Access denied for user 'databases'@'localhost' (using password: YES)
kalmer@kalmer-HP-ProBook-4520s:~$ mysql sentence -u databases -p
Enter password: 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 958
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show tables;
+---------------------+
| Tables_in_sentence  |
+---------------------+
| Inimene             |
| Roll                |
| Roll_has_Inimene    |
| amet                |
| amet_has_isik       |
| asukoht             |
| inimene             |
| inimene_has_asukoht |
| isik                |
+---------------------+
9 rows in set (0.00 sec)

mysql> select * Roll
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Roll' at line 1
mysql> select * from Roll*
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '*' at line 1
mysql> select * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  | Nõmme   |        0 |
|      2 | riigikogu liige | Tallinn |        1 |
|      3 | poliitik        | Tallinn |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> select * from Inimene;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Rainer  | Vakra    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> select 
    -> * from idRoll;
ERROR 1146 (42S02): Table 'sentence.idRoll' doesn't exist
mysql> select  * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | NULL    |     NULL |
|           2 |                 1 | NULL    |     NULL |
|           3 |                 1 | NULL    |     NULL |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> update Roll_has_Inimene as RHI join Roll on Roll.idRoll=RHI.Roll_idRoll SET RHI.asukoht=Roll.asukoht;
Query OK, 3 rows affected (0.16 sec)
Rows matched: 3  Changed: 3  Warnings: 0

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |     NULL |
|           2 |                 1 | Tallinn |     NULL |
|           3 |                 1 | Tallinn |     NULL |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> update Roll_has_Inimene as RHI join Roll on Roll.idRoll=RHI.Roll_idRoll SET RHI.Praegune=Roll.Praegune;
Query OK, 3 rows affected (0.04 sec)
Rows matched: 3  Changed: 3  Warnings: 0

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |        0 |
|           2 |                 1 | Tallinn |        1 |
|           3 |                 1 | Tallinn |        1 |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> select * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  | Nõmme   |        0 |
|      2 | riigikogu liige | Tallinn |        1 |
|      3 | poliitik        | Tallinn |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> ALTER TABLE Roll drop column asukoht, Praegu;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Praegu' at line 1
mysql> ALTER TABLE Roll drop column asukoht;
Query OK, 3 rows affected (0.29 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE Roll drop column Praegu;
ERROR 1091 (42000): Can't DROP 'Praegu'; check that column/key exists
mysql> ALTER TABLE Roll drop column Praegune;
Query OK, 3 rows affected (0.28 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> select * from Roll;
+--------+-----------------+
| idRoll | nimetus         |
+--------+-----------------+
|      1 | linnaosa vanem  |
|      2 | riigikogu liige |
|      3 | poliitik        |
+--------+-----------------+
3 rows in set (0.00 sec)

mysql> select 
    -> * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |        0 |
|           2 |                 1 | Tallinn |        1 |
|           3 |                 1 | Tallinn |        1 |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> begin;
Query OK, 0 rows affected (0.00 sec)

mysql> ALTER TABLE Roll add column asukoht tinytext not null;
Query OK, 3 rows affected (1.63 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE Roll add column Praegune bool not null;
Query OK, 3 rows affected (2.25 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> select * Roll;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Roll' at line 1
mysql> select 
    -> * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  |         |        0 |
|      2 | riigikogu liige |         |        0 |
|      3 | poliitik        |         |        0 |
+--------+-----------------+---------+----------+
3 rows in set (0.01 sec)

mysql> update Roll join Roll_has_Inimene as RHI on Roll.idRoll=RHI.Roll_idRoll SET Roll.Praegune=RHI.Praegune;
Query OK, 2 rows affected (2.20 sec)
Rows matched: 3  Changed: 2  Warnings: 0

mysql> select * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  |         |        0 |
|      2 | riigikogu liige |         |        1 |
|      3 | poliitik        |         |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> update Roll join Roll_has_Inimene as RHI on Roll.idRoll=RHI.Roll_idRoll SET Roll.asukoht=RHI.asukoht;
Query OK, 3 rows affected (0.37 sec)
Rows matched: 3  Changed: 3  Warnings: 0

mysql> select * from Roll;
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  | Nõmme   |        0 |
|      2 | riigikogu liige | Tallinn |        1 |
|      3 | poliitik        | Tallinn |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> rollback
    -> ;
Query OK, 0 rows affected (0.00 sec)

mysql> select * from Roll; 
+--------+-----------------+---------+----------+
| idRoll | nimetus         | asukoht | Praegune |
+--------+-----------------+---------+----------+
|      1 | linnaosa vanem  | Nõmme   |        0 |
|      2 | riigikogu liige | Tallinn |        1 |
|      3 | poliitik        | Tallinn |        1 |
+--------+-----------------+---------+----------+
3 rows in set (0.00 sec)

mysql> rollback;
Query OK, 0 rows affected (0.00 sec)

mysql> select * from Roll_has_Inimene; 
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |        0 |
|           2 |                 1 | Tallinn |        1 |
|           3 |                 1 | Tallinn |        1 |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> ALTER TABLE Roll drop column Praegune;
Query OK, 3 rows affected (1.35 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE Roll drop column Asukoht;
Query OK, 3 rows affected (0.82 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> select * from Roll;
+--------+-----------------+
| idRoll | nimetus         |
+--------+-----------------+
|      1 | linnaosa vanem  |
|      2 | riigikogu liige |
|      3 | poliitik        |
+--------+-----------------+
3 rows in set (0.00 sec)

mysql> begin;
Query OK, 0 rows affected (0.00 sec)

mysql> Update  Roll_has_Inimene SET asukoht='Nõmme' WHERE asukoht='Tallinn' limit 1;
Query OK, 1 row affected (0.59 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |        0 |
|           2 |                 1 | Nõmme   |        1 |
|           3 |                 1 | Tallinn |        1 |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> rollback
    -> ;
Query OK, 0 rows affected (0.12 sec)

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |        0 |
|           2 |                 1 | Tallinn |        1 |
|           3 |                 1 | Tallinn |        1 |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> select * from Inimene
    -> ;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Rainer  | Vakra    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> select Inimene.Eesnimi, Inimene.Perenimi, RHI.asukoht from Inimene join Roll_has_Inimene as RHI on Inimene.idInimene=RHI.Inimene_idInimene;
+---------+----------+---------+
| Eesnimi | Perenimi | asukoht |
+---------+----------+---------+
| Rainer  | Vakra    | Nõmme   |
| Rainer  | Vakra    | Tallinn |
| Rainer  | Vakra    | Tallinn |
+---------+----------+---------+
3 rows in set (0.01 sec)

mysql> select * from Roll;
+--------+-----------------+
| idRoll | nimetus         |
+--------+-----------------+
|      1 | linnaosa vanem  |
|      2 | riigikogu liige |
|      3 | poliitik        |
+--------+-----------------+
3 rows in set (0.00 sec)

mysql> select * from Roll_has_Inimene;
+-------------+-------------------+---------+----------+
| Roll_idRoll | Inimene_idInimene | asukoht | Praegune |
+-------------+-------------------+---------+----------+
|           1 |                 1 | Nõmme   |        0 |
|           2 |                 1 | Tallinn |        1 |
|           3 |                 1 | Tallinn |        1 |
+-------------+-------------------+---------+----------+
3 rows in set (0.00 sec)

mysql> select Roll.nimetus, Roll_has_Inimene.asukoht from Roll join Roll_has_Inimene on Roll.idRoll=Roll_has_Inimene.Roll_idRoll;
+-----------------+---------+
| nimetus         | asukoht |
+-----------------+---------+
| linnaosa vanem  | Nõmme   |
| riigikogu liige | Tallinn |
| poliitik        | Tallinn |
+-----------------+---------+
3 rows in set (0.00 sec)

mysql> select Roll.nimetus, Roll_has_Inimene.asukoht from Roll join Roll_has_Inimene on Roll.idRoll=Roll_has_Inimene.Roll_idRoll where Roll.nimetus='poliitik';
+----------+---------+
| nimetus  | asukoht |
+----------+---------+
| poliitik | Tallinn |
+----------+---------+
1 row in set (0.03 sec)

mysql> select Eesnimi, Perenimi, nimetus from Inimene join Roll_has_Inimene on Roll_has_Inimene.Inimene_idInimene=Inimene.idInimene join Roll on Roll.idRoll=Roll_has_Inimene.Roll_idRoll;
+---------+----------+-----------------+
| Eesnimi | Perenimi | nimetus         |
+---------+----------+-----------------+
| Rainer  | Vakra    | linnaosa vanem  |
| Rainer  | Vakra    | riigikogu liige |
| Rainer  | Vakra    | poliitik        |
+---------+----------+-----------------+
3 rows in set (0.00 sec)

mysql> select Eesnimi, Perenimi, nimetus,asukoht from Inimene join Roll_has_Inimene on Roll_has_Inimene.Inimene_idInimene=Inimene.idInimene join Roll on Roll.idRoll=Roll_has_Inimene.Roll_idRoll;
+---------+----------+-----------------+---------+
| Eesnimi | Perenimi | nimetus         | asukoht |
+---------+----------+-----------------+---------+
| Rainer  | Vakra    | linnaosa vanem  | Nõmme   |
| Rainer  | Vakra    | riigikogu liige | Tallinn |
| Rainer  | Vakra    | poliitik        | Tallinn |
+---------+----------+-----------------+---------+
3 rows in set (0.00 sec)

mysql> update Inimene SET Eesnimi='Andrus', Perenimi='Siim
    '> ' limit 1 ;
Query OK, 1 row affected (0.04 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from Inimene;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Andrus  | Siim
    | 1981-03-10 00:00:00 | Tallinn    |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> update Inimene SET Sünnikoht= 'Are vald' WHERE Eesnimi like 'A%';
Query OK, 1 row affected (0.05 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from Inimene;+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Andrus  | Siim
    | 1981-03-10 00:00:00 | Are vald   |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)

mysql> 
mysql> select * from Inimene WHERE Year (Sünniaeg)> 1980;
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Andrus  | Siim
    | 1981-03-10 00:00:00 | Are vald   |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.02 sec)

mysql> Insert into Inimene (2, 'Mari', 'Kadakas', '1931-04-14','Põltsamaa');
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '2, 'Mari', 'Kadakas', '1931-04-14','Põltsamaa')' at line 1
mysql> Insert into Inimene values (2, 'Mari', 'Kadakas', '1931-04-14','Põltsamaa');
Query OK, 1 row affected (0.02 sec)

mysql> select * from Inimene
    -> where Eesnimi in ('Andrus','Mati');
+-----------+---------+----------+---------------------+------------+
| idInimene | Eesnimi | Perenimi | Sünniaeg            | Sünnikoht  |
+-----------+---------+----------+---------------------+------------+
|         1 | Andrus  | Siim
    | 1981-03-10 00:00:00 | Are vald   |
+-----------+---------+----------+---------------------+------------+
1 row in set (0.00 sec)