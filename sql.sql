CREATE TABLE `skillgap`.`tbl_skill` (`id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(255) NOT NULL , `name` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `level` VARCHAR(255) NOT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `craeted_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `tbl_skill` ADD `slug` VARCHAR(255) NOT NULL AFTER `name`;
ALTER TABLE `tbl_skill` CHANGE `craeted_on` `created_on` BIGINT(20) NOT NULL;




CREATE TABLE `skillgap`.`tbl_post` (`id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(255) NOT NULL , `skillid` INT NOT NULL , `content` LONGTEXT NOT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `created_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `tbl_about_me` ADD `education` VARCHAR(255) NULL AFTER `occupation`, ADD `link_one` VARCHAR(255) NULL AFTER `education`, ADD `link_two` VARCHAR(255) NULL AFTER `link_one`, ADD `link_three` VARCHAR(255) NULL AFTER `link_two`, ADD `link_four` VARCHAR(255) NULL AFTER `link_three`;