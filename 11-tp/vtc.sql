-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vtc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vtc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vtc` DEFAULT CHARACTER SET utf8 ;
USE `vtc` ;

-- -----------------------------------------------------
-- Table `vtc`.`driver`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vtc`.`driver` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vtc`.`vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vtc`.`vehicle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(255) NOT NULL,
  `color` VARCHAR(255) NOT NULL,
  `model` VARCHAR(255) NOT NULL,
  `registration` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `registration_UNIQUE` (`registration` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
