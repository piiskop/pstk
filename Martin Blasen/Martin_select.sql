select quantity as stuff from update1 as stuff;
select * from update1 where quantity > 5 order by noise asc;
select * from update1 where quantity !=6 order by quantity desc;
select name from update1 where quantity IS NOT NULL;
select * from update1 where quantity >=5 AND quantity <=7;
select * from update1 where noise LIKE '%loud';
select * from update1 where name NOT LIKE '%e%';
select name from update1 where quantity >= 5 AND noise ="very loud";
select name from update1 where noise= "loud" OR noise="very loud" ;
