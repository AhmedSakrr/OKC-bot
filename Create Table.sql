CREATE  TABLE `profiles_OKC`.`chicks2` (
  `number` INT NOT NULL AUTO_INCREMENT ,
  `profile_id` VARCHAR(45) NOT NULL ,
  `match_percentage` VARCHAR(45) NULL ,
  `number_of_visits` INT NULL ,
  `first_visited` TIMESTAMP NULL ,
  `last_visited` TIMESTAMP NULL ,
  PRIMARY KEY (`number`, `profile_id`) ,
  UNIQUE INDEX `number_UNIQUE` (`number` ASC) ,
  UNIQUE INDEX `profile_id_UNIQUE` (`profile_id` ASC) );
