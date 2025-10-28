CREATE TABLE `tbl_skill` (`id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(255) NOT NULL , `name` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `level` VARCHAR(255) NOT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `craeted_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `tbl_skill` ADD `slug` VARCHAR(255) NOT NULL AFTER `name`;
ALTER TABLE `tbl_skill` CHANGE `craeted_on` `created_on` BIGINT(20) NOT NULL;




CREATE TABLE `tbl_post` (`id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(255) NOT NULL , `skillid` INT NOT NULL , `content` LONGTEXT NOT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `created_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `tbl_about_me` ADD `education` VARCHAR(255) NULL AFTER `occupation`, ADD `link_one` VARCHAR(255) NULL AFTER `education`, ADD `link_two` VARCHAR(255) NULL AFTER `link_one`, ADD `link_three` VARCHAR(255) NULL AFTER `link_two`, ADD `link_four` VARCHAR(255) NULL AFTER `link_three`;


ALTER TABLE `tbl_post` ADD `skill_slug` VARCHAR(255) NULL AFTER `skillid`;
CREATE TABLE `tbl_love` (`id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(255) NOT NULL , `postid` INT NOT NULL , `love` INT NOT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `created_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `tbl_follow` (`id` INT NOT NULL AUTO_INCREMENT , `follower_id` VARCHAR(255) NOT NULL , `following_id` VARCHAR(255) NOT NULL , `follow` INT NOT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `created_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `tbl_post`
  DROP `skillid`;


CREATE TABLE `tbl_contact_us` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `subject` VARCHAR(255) NOT NULL , `message` LONGTEXT NOT NULL , `created_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tbl_setting` (`id` INT NOT NULL AUTO_INCREMENT , `userid` VARCHAR(255) NOT NULL , `notif_comment` INT NULL , `notif_likes` INT NULL , `notif_monthly` INT NULL , `notif_update` INT NULL , `status` INT NOT NULL , `created_by` INT NOT NULL , `craeted_on` BIGINT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `tbl_setting` CHANGE `craeted_on` `created_on` BIGINT(20) NOT NULL;
ALTER TABLE `tbl_setting` CHANGE `notif_likes` `notif_like` INT(11) NULL DEFAULT NULL;
ALTER TABLE `tbl_setting` ADD `profile_visibility` INT NULL AFTER `notif_update`, ADD `profile_indexing` INT NULL AFTER `profile_visibility`;
ALTER TABLE `tbl_setting` CHANGE `profile_visibility` `profile_visibility` VARCHAR(255) NULL DEFAULT NULL;