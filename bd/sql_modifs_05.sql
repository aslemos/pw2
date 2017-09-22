
-- Table Usagers : Ajouter des Champs manquants
ALTER TABLE `usagers` ADD `DateNaissance` DATE NOT NULL AFTER `nom`, ADD `sexe` VARCHAR(255) NOT NULL AFTER `DateNaissance`;
ALTER TABLE `usagers` ADD `adresse2` VARCHAR(255) NOT NULL AFTER `adresse`, ADD `arr_id` INT NOT NULL AFTER `adresse2`;
ALTER TABLE `usagers` CHANGE `username` `username` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `usagers` ADD UNIQUE( `username`);

-- Table Usagers: Update info dans la base de donnée
UPDATE `usagers` SET `DateNaissance` = '1962-09-22' WHERE `usagers`.`user_id` = 1;
UPDATE `usagers` SET `DateNaissance` = '1982-03-04' WHERE `usagers`.`user_id` = 2;
UPDATE `usagers` SET `DateNaissance` = '1972-09-12' WHERE `usagers`.`user_id` = 3;
UPDATE `usagers` SET `DateNaissance` = '1982-10-15' WHERE `usagers`.`user_id` = 4;
UPDATE `usagers` SET `DateNaissance` = '1992-02-01' WHERE `usagers`.`user_id` = 5;
UPDATE `usagers` SET `DateNaissance` = '2000-06-05' WHERE `usagers`.`user_id` = 6;

--
UPDATE `usagers` SET `arr_id` = '5' WHERE `usagers`.`user_id` = 1;
UPDATE `usagers` SET `arr_id` = '6' WHERE `usagers`.`user_id` = 2;
UPDATE `usagers` SET `arr_id` = '1' WHERE `usagers`.`user_id` = 3;
UPDATE `usagers` SET `arr_id` = '2' WHERE `usagers`.`user_id` = 4;
UPDATE `usagers` SET `arr_id` = '3' WHERE `usagers`.`user_id` = 5;
UPDATE `usagers` SET `arr_id` = '4' WHERE `usagers`.`user_id` = 6;