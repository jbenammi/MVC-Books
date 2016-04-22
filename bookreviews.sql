-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema books
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema books
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8 ;
USE `books` ;

-- -----------------------------------------------------
-- Table `books`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NULL,
  `alias` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(100) NULL,
  `created_on` DATETIME NULL,
  `updated_on` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books`.`authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books`.`authors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `auth_name` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books`.`books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books`.`books` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `created_on` DATETIME NULL,
  `updated_on` DATETIME NULL,
  `authors_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_books_authors1_idx` (`authors_id` ASC),
  CONSTRAINT `fk_books_authors1`
    FOREIGN KEY (`authors_id`)
    REFERENCES `books`.`authors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `books`.`reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books`.`reviews` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `review` VARCHAR(255) NULL,
  `rating` INT(1) NULL,
  `users_id` INT NOT NULL,
  `books_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reviews_users_idx` (`users_id` ASC),
  INDEX `fk_reviews_books1_idx` (`books_id` ASC),
  CONSTRAINT `fk_reviews_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `books`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_books1`
    FOREIGN KEY (`books_id`)
    REFERENCES `books`.`books` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
