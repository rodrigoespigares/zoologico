CREATE DATABASE zoologicoALR;
USE zoologicoALR;

CREATE USER 'userZooALR'@'localhost' IDENTIFIED BY 'cXrpJBft5i';
GRANT ALL PRIVILEGES ON zoologicoALR.* TO 'userZooALR'@'localhost';
FLUSH PRIVILEGES;