
--sisenemine
kalmer@kalmer-HP-ProBook-4520s:~$ mysql -u databases -p
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 911
Server version: 5.5.41-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

--näita anamdeid
mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| andmebaas          |
| databases          |
| haide              |
| olympiaad          |
| sentence           |
| tennis             |
| tvSeries           |
+--------------------+
8 rows in set (1.49 sec)

--kasuta andmebaasi haide
mysql> use haide;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+-----------------+
| Tables_in_haide |
+-----------------+
| Autor           |
| Autor_has_Teos  |
| Teos            |
+-----------------+

--vali tabelist Autor;
mysql> select * from Autor;
+---------+---------+---------------+
| idAUtor | Eesnimi | Perekonnanimi |
+---------+---------+---------------+
|       1 | Haide   | Kuivas        |
|       3 | Mihkel  | Siim          |
|       2 | Tambet  | Song          |
|       4 | Tarmo   | Dulinets      |
+---------+---------+---------------+

--vali tabelist Teos;
mysql> select * from Teos;
+------------+--------------------------------------+--------+------------+
| idPealkiri | Pealkiri                             | lk_arv | ilmumisaeg |
+------------+--------------------------------------+--------+------------+
|          1 | Kvaliteet haridusorganisatsioonis    |     49 |       2012 |
|          2 | Metsamüügi käsiraamat                |     30 |       2010 |
|          3 | Tehnikaalased väljakutsed juhtidele  |     70 |       1998 |
|          4 | Kuldmedaliga lõpetajate uuring       |     20 |       2013 |
+------------+--------------------------------------+--------+------------+

--vali tabel Autor_has_Teos;
mysql> select * from Autor_has_Teos;
+---------------+-----------------+
| Autor_idAUtor | Teos_idPealkiri |
+---------------+-----------------+
|             1 |               1 |
|             2 |               2 |
|             3 |               3 |
|             4 |               4 |
+---------------+-----------------+

--muuda ümber tabeli pealkiri
mysql> rename table  Autor_has_Teos to Teos_has_Autor;


---näita tabeli Teose sisu
mysql> describe Teos;
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| idPealkiri | int(11)     | NO   | PRI | NULL    |       |
| Pealkiri   | varchar(45) | NO   | UNI | NULL    |       |
| lk_arv     | int(11)     | NO   |     | NULL    |       |
| ilmumisaeg | year(4)     | YES  |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+

--muuda ümber (begin on vajalik, et sa saaksid hiljem kas commitida ehk kinnitada või rollback-tagasi võtta), et tabelist Teos lk arv,kus idPealkiri=1
mysql> begin;update Teos set lk_arv=50  where idPealkiri=1;

--vali tabelist Teos
mysql> select * from Teos;
+------------+--------------------------------------+--------+------------+
| idPealkiri | Pealkiri                             | lk_arv | ilmumisaeg |
+------------+--------------------------------------+--------+------------+
|          1 | Kvaliteet haridusorganisatsioonis    |     50 |       2012 |
|          2 | Metsamüügi käsiraamat                |     30 |       2010 |
|          3 | Tehnikaalased väljakutsed juhtidele  |     70 |       1998 |
|          4 | Kuldmedaliga lõpetajate uuring       |     20 |       2013 |
+------------+--------------------------------------+--------+------------+

---KINNITA
mysql> commit;

---alusta, kustuta tabelist Autor idAuotr 2
mysql> begin; delete from Autor where idAUtor=2; 

--loo uus tabel Teose_preemia
mysql> create table Teose_preemia (aasta INT);

---täienda tabelit Teose preemia id-ga
mysql> alter table Teose_preemia add column idTeose_preemia INT;

--drop table-KUSTUTAN tabeli Teose_preemia
mysql> drop table Teose_preemia;

--sisesta tabelisse..... määra....
mysql> insert Teos_has_Autor set  Autor_idAUtor=2, Teos_idPealkiri=1; 

---lukusta tabel Teos teiste poolt kirjutamiseks
mysql> lock tables Teos write;

----MUUDA...Määra....KUS
mysql> update Teos set lk_arv=49 where idPealkiri=1;  
Query OK, 1 row affected (2.43 sec)

--vabasta tabel
mysql> unlock tables;

--vali tabel Autor
mysql> select * from Autor;
+---------+---------+---------------+
| idAUtor | Eesnimi | Perekonnanimi |
+---------+---------+---------------+
|       1 | Haide   | Kuivas        |
|       3 | Mihkel  | Siim          |
|       2 | Tambet  | Song          |
|       4 | Tarmo   | Dulinets      |
+---------+---------+---------------+


mysql> select * from Autor ,Teos_has_Autor;
+---------+---------+---------------+---------------+-----------------+
| idAUtor | Eesnimi | Perekonnanimi | Autor_idAUtor | Teos_idPealkiri |
+---------+---------+---------------+---------------+-----------------+
|       1 | Haide   | Kuivas        |             1 |               1 |
|       3 | Mihkel  | Siim          |             1 |               1 |
|       2 | Tambet  | Song          |             1 |               1 |
|       4 | Tarmo   | Dulinets      |             1 |               1 |
|       1 | Haide   | Kuivas        |             2 |               1 |
|       3 | Mihkel  | Siim          |             2 |               1 |
|       2 | Tambet  | Song          |             2 |               1 |
|       4 | Tarmo   | Dulinets      |             2 |               1 |
|       1 | Haide   | Kuivas        |             2 |               2 |
|       3 | Mihkel  | Siim          |             2 |               2 |
|       2 | Tambet  | Song          |             2 |               2 |
|       4 | Tarmo   | Dulinets      |             2 |               2 |
|       1 | Haide   | Kuivas        |             3 |               3 |
|       3 | Mihkel  | Siim          |             3 |               3 |
|       2 | Tambet  | Song          |             3 |               3 |
|       4 | Tarmo   | Dulinets      |             3 |               3 |
|       1 | Haide   | Kuivas        |             4 |               4 |
|       3 | Mihkel  | Siim          |             4 |               4 |
|       2 | Tambet  | Song          |             4 |               4 |
|       4 | Tarmo   | Dulinets      |             4 |               4 |
+---------+---------+---------------+---------------+-----------------+

--Vali* kõik tabelist... SEOSTA tabeliga....
mysql> select * from Autor join Teos_has_Autor;
+---------+---------+---------------+---------------+-----------------+
| idAUtor | Eesnimi | Perekonnanimi | Autor_idAUtor | Teos_idPealkiri |
+---------+---------+---------------+---------------+-----------------+
|       1 | Haide   | Kuivas        |             1 |               1 |
|       3 | Mihkel  | Siim          |             1 |               1 |
|       2 | Tambet  | Song          |             1 |               1 |
|       4 | Tarmo   | Dulinets      |             1 |               1 |
|       1 | Haide   | Kuivas        |             2 |               1 |
|       3 | Mihkel  | Siim          |             2 |               1 |
|       2 | Tambet  | Song          |             2 |               1 |
|       4 | Tarmo   | Dulinets      |             2 |               1 |
|       1 | Haide   | Kuivas        |             2 |               2 |
|       3 | Mihkel  | Siim          |             2 |               2 |
|       2 | Tambet  | Song          |             2 |               2 |
|       4 | Tarmo   | Dulinets      |             2 |               2 |
|       1 | Haide   | Kuivas        |             3 |               3 |
|       3 | Mihkel  | Siim          |             3 |               3 |
|       2 | Tambet  | Song          |             3 |               3 |
|       4 | Tarmo   | Dulinets      |             3 |               3 |
|       1 | Haide   | Kuivas        |             4 |               4 |
|       3 | Mihkel  | Siim          |             4 |               4 |
|       2 | Tambet  | Song          |             4 |               4 |
|       4 | Tarmo   | Dulinets      |             4 |               4 |
+---------+---------+---------------+---------------+-----------------+

---VALI * tabelist....SEOSTA ...selle Teos_has_Autor sellega mille kaudu nad ühendatud on (workbenchis vajuta seose joonele)
mysql> select * from Autor join Teos_has_Autor on Autor_idAUtor=idAutor;
+---------+---------+---------------+---------------+-----------------+
| idAUtor | Eesnimi | Perekonnanimi | Autor_idAUtor | Teos_idPealkiri |
+---------+---------+---------------+---------------+-----------------+
|       1 | Haide   | Kuivas        |             1 |               1 |
|       3 | Mihkel  | Siim          |             3 |               3 |
|       2 | Tambet  | Song          |             2 |               1 |
|       2 | Tambet  | Song          |             2 |               2 |
|       4 | Tarmo   | Dulinets      |             4 |               4 |
+---------+---------+---------------+---------------+-----------------+


--alusta (et kogu materjali ära ei rikuks)
mysql> begin;

---KUSTUTA tabelitest ära inimene kelle Autor_idAUtor=4-ga
mysql> delete Autor, Teos_has_Autor from Autor join Teos_has_Autor on Autor_idAUtor=idAutor where Teos_idPealkiri=4;
Query OK, 2 rows affected (0.00 sec)

mysql> select * from Autor join Teos_has_Autor on Autor_idAUtor=idAutor;
+---------+---------+---------------+---------------+-----------------+
| idAUtor | Eesnimi | Perekonnanimi | Autor_idAUtor | Teos_idPealkiri |
+---------+---------+---------------+---------------+-----------------+
|       1 | Haide   | Kuivas        |             1 |               1 |
|       3 | Mihkel  | Siim          |             3 |               3 |
|       2 | Tambet  | Song          |             2 |               1 |
|       2 | Tambet  | Song          |             2 |               2 |
+---------+---------+---------------+---------------+-----------------+

--võta tagasi
mysql> rollback;

--näita.......? (segane!)
mysql> select * from Autor join Teos_has_Autor on Autor_idAUtor=idAutor;
+---------+---------+---------------+---------------+-----------------+
| idAUtor | Eesnimi | Perekonnanimi | Autor_idAUtor | Teos_idPealkiri |
+---------+---------+---------------+---------------+-----------------+
|       1 | Haide   | Kuivas        |             1 |               1 |
|       3 | Mihkel  | Siim          |             3 |               3 |
|       2 | Tambet  | Song          |             2 |               1 |
|       2 | Tambet  | Song          |             2 |               2 |
|       4 | Tarmo   | Dulinets      |             4 |               4 |
+---------+---------+---------------+---------------+-----------------+


mysql> 
