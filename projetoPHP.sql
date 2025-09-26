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
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `emailUsuario` VARCHAR(255) NOT NULL,
  `senhaUsuario` TEXT NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoPHP`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoPHP`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nomeCategoria` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoPHP`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoPHP`.`Produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `valorProduto` DECIMAL(8,2) NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_Produto_Categoria_idx` (`Categoria_idCategoria` ASC),
  CONSTRAINT `fk_Produto_Categoria`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `projetoPHP`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
