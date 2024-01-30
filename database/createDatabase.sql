CREATE DATABASE zoologicoALR;
USE zoologicoALR;

CREATE USER 'userZooALR'@'localhost' IDENTIFIED BY 'cXrpJBft5i';
GRANT ALL PRIVILEGES ON zoologicoArtachoLuciaRodrigo.* TO 'userZooALR'@'localhost';
FLUSH PRIVILEGES;