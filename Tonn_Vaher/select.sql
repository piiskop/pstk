show tables;
+---------------------+
| Tables_in_olympiaad |
+---------------------+
| class               |
| results             |
| school              |
| student             |
| teacher             |
+---------------------+

select * from student;
+-----------+-----------+-----------+---------------+-----------------+-------------------+-------------------+
| idStudent | fname     | lname     | class_idClass | school_idSchool | teacher_idTeacher | results_idResults |
+-----------+-----------+-----------+---------------+-----------------+-------------------+-------------------+
|         1 | Sander    | Tamm      |             1 |               1 |                 1 |                 1 |
|         2 | Tõnn      | Vaher     |             1 |               2 |                 2 |                 2 |
|         3 | Kristiina | Ojamets   |             1 |               3 |                 3 |                 3 |
|         4 | Mikk      | Golubtsov |             2 |               4 |                 4 |                 4 |
|         5 | Rei       | Meier     |             2 |               5 |                 5 |                 5 |
|         6 | Anita     | Jaanson   |             2 |               6 |                 6 |                 6 |
|         7 | Edwin     | Lee       |             3 |               6 |                 6 |                 7 |
|         8 | Laura     | Pampa     |             3 |               4 |                 7 |                 8 |
|         9 | Isaac     | Rubin     |             3 |               1 |                 8 |                 9 |
|        10 | Anti      | Bertel    |             2 |               2 |                 2 |                10 |
|        11 | Helen     | Pelju     |             1 |               3 |                 3 |                11 |
|        12 | Kaspar    | Vahter    |             1 |               1 |                 1 |                12 |
|        13 | Joosep    | Raiend    |             3 |               3 |                 9 |                13 |
|        14 | Hedi      | Haas      |             3 |               6 |                 6 |                14 |
|        15 | Mihkel    | Paalberg  |             3 |               3 |                 9 |                15 |
+-----------+-----------+-----------+---------------+-----------------+-------------------+-------------------+

select * from class;
+---------+-------+
| idClass | class |
+---------+-------+
|       1 |    12 |
|       2 |    11 |
|       3 |    10 |
+---------+-------+

select * from teacher;
+-----------+-------+------------+
| idTeacher | fname | lname      |
+-----------+-------+------------+
|         1 | Tiina | Hendrikson |
|         2 | Aino  | Siniväli   |
|         3 | Kai   | Kõks       |
|         4 | Elle  | Kera       |
|         5 | Bella | Aivazova   |
|         6 | Reet  | Ojasoo     |
|         7 | Eve   | Merila     |
|         8 | Tiiu  | Tõnisson   |
|         9 | Kärt  | Jakobson   |
+-----------+-------+------------+

select * from results;
+-----------+-----------+---------------+
| idResults | listening | langStructure |
+-----------+-----------+---------------+
|         1 |     20.00 |         16.00 |
|         2 |     11.00 |          8.00 |
|         3 |     16.00 |         11.00 |
|         4 |     17.00 |         13.00 |
|         5 |     13.00 |          7.50 |
|         6 |     15.00 |          9.00 |
|         7 |     10.00 |         11.00 |
|         8 |     18.00 |         11.00 |
|         9 |     15.50 |         16.00 |
|        10 |     11.00 |         15.00 |
|        11 |     16.50 |         14.50 |
|        12 |     17.50 |         17.00 |
|        13 |     14.00 |         11.00 |
|        14 |     12.50 |          8.00 |
|        15 |     17.50 |          8.50 |
+-----------+-----------+---------------+

select fname from student;
+-----------+
| fname     |
+-----------+
| Sander    |
| Tõnn      |
| Kristiina |
| Mikk      |
| Rei       |
| Anita     |
| Edwin     |
| Laura     |
| Isaac     |
| Anti      |
| Helen     |
| Kaspar    |
| Joosep    |
| Hedi      |
| Mihkel    |
+-----------+

select fname,lname from student;
+-----------+-----------+
| fname     | lname     |
+-----------+-----------+
| Sander    | Tamm      |
| Tõnn      | Vaher     |
| Kristiina | Ojamets   |
| Mikk      | Golubtsov |
| Rei       | Meier     |
| Anita     | Jaanson   |
| Edwin     | Lee       |
| Laura     | Pampa     |
| Isaac     | Rubin     |
| Anti      | Bertel    |
| Helen     | Pelju     |
| Kaspar    | Vahter    |
| Joosep    | Raiend    |
| Hedi      | Haas      |
| Mihkel    | Paalberg  |
+-----------+-----------+

select fname,lname from student JOIN class ON student.class_idClass = class.idClass WHERE class = 12;
+-----------+---------+
| fname     | lname   |
+-----------+---------+
| Sander    | Tamm    |
| Tõnn      | Vaher   |
| Kristiina | Ojamets |
| Helen     | Pelju   |
| Kaspar    | Vahter  |
+-----------+---------+

select class,count(fname) from class JOIN student;
+-------+--------------+
| class | count(fname) |
+-------+--------------+
|    12 |           45 |
+-------+--------------+

select class,count(fname) from class JOIN student ON class.idClass = student.class_idClass;
+-------+--------------+
| class | count(fname) |
+-------+--------------+
|    12 |           15 |
+-------+--------------+

select class,count(fname) from class JOIN student ON class.idClass = student.class_idClass group by class;
+-------+--------------+
| class | count(fname) |
+-------+--------------+
|    10 |            6 |
|    11 |            4 |
|    12 |            5 |
+-------+--------------+

select class,count(fname) from class JOIN student ON class.idClass = student.class_idClass group by class having class = 11 or class = 12;
+-------+--------------+
| class | count(fname) |
+-------+--------------+
|    11 |            4 |
|    12 |            5 |
+-------+--------------+

select class,count(fname) from class JOIN student ON class.idClass = student.class_idClass group by class having class in (11,12);
+-------+--------------+
| class | count(fname) |
+-------+--------------+
|    11 |            4 |
|    12 |            5 |
+-------+--------------+

select class,count(fname) from class JOIN student ON class.idClass = student.class_idClass group by class having class not in (11,12);
+-------+--------------+
| class | count(fname) |
+-------+--------------+
|    10 |            6 |
+-------+--------------+
