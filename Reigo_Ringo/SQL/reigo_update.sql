
CREATE TABLE uuenda (
  mis varchar(100), kus varchar(100), millal varchar(100)
);

INSERT INTO uuenda(mis, kus, millal) VALUES
('madu', 'koolis', 'reede'),
('kass', 'kodus', 'reede'),
('koer', 'ujulas', 'reede'),
('karu', 'koolis', 'reede'),
('maasikas', 'haiglas', 'reede'),
('muri', 'koolis', 'reede'),
('madu', 'koolis', 'reede'),
('madu', 'koolis', 'reede'),
('madu', 'koolis', 'reede'),
('madu', 'koolis', 'reede');

UPDATE uuenda SET millal='pühapäev' WHERE mis='madu' LIMIT 3;
