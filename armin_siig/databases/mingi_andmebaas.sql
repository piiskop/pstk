create database mingi character set utf8 collate utf8_general_ci;
use mingi;
create table asjad(id integer auto_increment primary key, asi char(20), storage tinyint, description text, price decimal (5,2));
insert into asjad set id=1, asi="pen", storage=10, description="brown", price=15.57;
insert into asjad set id=2, asi="mice", storage=14, description="brown", price=15.57;
insert into asjad set id=3, asi="table", storage=1, description="brown", price=15.57;
insert into asjad set id=4, asi="lamp", storage=2, description="brown", price=15.57;
insert into asjad set id=5, asi="monitor", storage=2, description="brown", price=15.57;
