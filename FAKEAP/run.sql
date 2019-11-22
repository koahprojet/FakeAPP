CREATE DATABASE FAKEAP; // creation de la base de donnees 


//  creation de la table admin
CREATE TABLE `FAKEAP`.`admin` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `passcode` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));


//ajout d'un utilisateur
INSERT INTO `FAKEAP`.`admin` (`username`, `passcode`) VALUES ('mika', 'toto');


