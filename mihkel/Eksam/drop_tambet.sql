/******************************
Tambeti andmebaasi tühjendamine
******************************/
DELETE FROM eksam.plaat_has_Lugu_has_Artist;
DELETE FROM eksam.lugu_has_Artist;
DELETE FROM eksam.lugu;
DELETE FROM eksam.artist;
DELETE FROM eksam.plaat;
-------------------------------------------
DROP TABLE eksam.plaat_has_Lugu_has_Artist;
DROP TABLE eksam.lugu_has_Artist;
DROP TABLE eksam.lugu;
DROP TABLE eksam.artist;
DROP TABLE eksam.plaat;
-------------------------------------------
DROP SCHEMA eksam;