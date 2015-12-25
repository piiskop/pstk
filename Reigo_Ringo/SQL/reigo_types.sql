
CREATE TABLE types (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first VARCHAR(22) NOT NULL,
  second BOOLEAN,
  third FLOAT(4,3),
  fourth DATE,
  fifth ENUM('aaa', 'bbb', 'ccc'),
  sixth TEXT,
  seventh INT NOT NULL,
  eighth TINYINT,
  ninth TIMESTAMP NOT NULL DEFAULT NOW()
);

INSERT INTO types (first, second, third, fourth, fifth, sixth, seventh, eighth)
VALUES ('kakuke', FALSE, 2.001, '1989-01-24', 'bbb', 'why', 666 , 9),
('jajaja', TRUE, 2.001, '1985-01-24', 'aaa', 'why', 666 , 9),
('ja', FALSE, 2.001, '1989-01-24', 'bbb', 'why', 666 , 9),
('jela', TRUE, 2.001, '1959-01-24', 'ccc', 'why', 666 , 9),
('jala', FALSE, 2.001, '1985-01-24', 'bbb', 'why', 666 , 9),
('tule', FALSE, 2.001, '1989-01-24', 'bbb', 'why', 666 , 9),
('mine', TRUE, 2.001, '1985-01-24', 'aaa', 'why', 666 , 9),
('sa', FALSE, 2.001, '1989-01-24', 'bbb', 'why', 666 , 9),
('mine', TRUE, 2.001, '1959-01-24', 'ccc', 'why', 666 , 9),
('tagasi', FALSE, 2.001, '1985-01-24', 'bbb', 'why', 666 , 9);