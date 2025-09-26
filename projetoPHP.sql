-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projetoPHP
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetoPHP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetoPHP` DEFAULT CHARACTER SET utf8 ;
USE `projetoPHP` ;

-- -----------------------------------------------------
-- Table `projetoPHP`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoPHP`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoPHP`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoPHP`.`Categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoPHP`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoPHP`.`Produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Produto_Categoria_idx` (`idCategoria` ASC),
  CONSTRAINT `fk_Produto_Categoria`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `projetoPHP`.`Categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
