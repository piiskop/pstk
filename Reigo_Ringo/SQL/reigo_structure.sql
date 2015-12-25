
CREATE TABLE structure (
  id INT UNSIGNED NOT NULL PRIMARY KEY
);

ALTER TABLE structure ADD the_end varchar(50);

-- indeksi loomine
CREATE INDEX H_index ON structure (the_end);

ALTER TABLE structure ADD the_beginning varchar(50);

-- unikaalne indeks
CREATE UNIQUE INDEX unikaalne ON structure(the_beginning);

ALTER TABLE structure ADD stop varchar(50) AFTER the_end;

-- drop primary key
ALTER TABLE structure DROP PRIMARY KEY;

-- primary key lisamine
ALTER TABLE structure ADD PRIMARY KEY (id);

-- tabeli ümbernmetamine
RENAME TABLE structure TO struktuur;

-- data type of a column
ALTER TABLE struktuur MODIFY COLUMN the_end INT;

-- change column name and type
ALTER TABLE struktuur CHANGE the_beginning beginning INT;

-- default value
ALTER TABLE struktuur ALTER beginning SET DEFAULT 9;

ALTER TABLE struktuur ALTER beginning DROP DEFAULT;

-- drop index
ALTER TABLE struktuur DROP INDEX H_index;

-- drop column
ALTER TABLE struktuur DROP the_end;

-- välisühendus
ALTER TABLE structure ADD CONSTRAINT takistus
FOREIGN KEY (t_id)
REFERENCES types(id);




