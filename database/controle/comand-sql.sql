-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_nstore0001001
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_nstore0001001
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_nstore0001001` DEFAULT CHARACTER SET utf8 ;
USE `db_nstore0001001` ;

-- -----------------------------------------------------
-- Table `db_nstore0001001`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`marcas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`fornecedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`fornecedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `contato` VARCHAR(45) NOT NULL,
  `registro` VARCHAR(45) NOT NULL,
  `endereco` INT NOT NULL,
  `origem` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(100) NOT NULL,
  `code` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `quantidade` INT NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `cor` CHAR(1) NOT NULL,
  `date_cad` DATETIME NOT NULL,
  `user_cad` VARCHAR(45) NOT NULL,
  `id_marca` INT NOT NULL,
  `id_categoria` INT NOT NULL,
  `id_fornecedor` INT NOT NULL,
  `id_status` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_1_idx` (`id_marca` ASC),
  INDEX `fk_produtos_2_idx` (`id_categoria` ASC),
  INDEX `fk_produtos_3_idx` (`id_fornecedor` ASC),
  INDEX `fk_produtos_4_idx` (`id_status` ASC),
  CONSTRAINT `fk_produtos_1`
    FOREIGN KEY (`id_marca`)
    REFERENCES `db_nstore0001001`.`marcas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_2`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `db_nstore0001001`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_3`
    FOREIGN KEY (`id_fornecedor`)
    REFERENCES `db_nstore0001001`.`fornecedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_4`
    FOREIGN KEY (`id_status`)
    REFERENCES `db_nstore0001001`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(25) NOT NULL,
  `sobre_nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`enderecos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(30) NOT NULL,
  `bairro` VARCHAR(20) NOT NULL,
  `cidade` VARCHAR(20) NOT NULL,
  `estado` VARCHAR(20) NOT NULL,
  `id_fornecedor` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_enderecos_1_idx` (`id_fornecedor` ASC),
  INDEX `fk_enderecos_2_idx` (`id_user` ASC),
  CONSTRAINT `fk_enderecos_1`
    FOREIGN KEY (`id_fornecedor`)
    REFERENCES `db_nstore0001001`.`fornecedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  --   ,
  -- CONSTRAINT `fk_enderecos_2`
  --   FOREIGN KEY (`id_user`)
  --   REFERENCES `db_nstore0001001`.`usuarios` (`id`)
  --   ON DELETE NO ACTION
  --   ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`notificacaos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`notificacaos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acao` VARCHAR(45) NOT NULL,
  `data` VARCHAR(45) NOT NULL,
  `user` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`contatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`contatos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contato` VARCHAR(30) NOT NULL,
  `id_user` INT NOT NULL,
  `id_fornecedor` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_1_idx` (`id_fornecedor` ASC),
  INDEX `fk_usuarios_2_idx` (`id_user` ASC),
  CONSTRAINT `fk_usuarios_1`
    FOREIGN KEY (`id_fornecedor`)
    REFERENCES `db_nstore0001001`.`fornecedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  --   ,
  -- CONSTRAINT `fk_usuarios_2`
  --   FOREIGN KEY (`id_user`)
  --   REFERENCES `db_nstore0001001`.`usuarios` (`id`)
  --   ON DELETE NO ACTION
  --   ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`notas_fiscais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`notas_fiscais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `tipo_nota` VARCHAR(25) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `forma_pagamento` VARCHAR(40) NOT NULL,
  `troco` DECIMAL(8,2) NOT NULL,
  `total` DECIMAL(8,2) NOT NULL,
  `valor_pago` DECIMAL(8,2) NOT NULL,
  `total_itens` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notas_fiscais_1_idx` (`id_user` ASC),
  CONSTRAINT `fk_notas_fiscais_1`
    FOREIGN KEY (`id_user`)
    REFERENCES `db_nstore0001001`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_nstore0001001`.`produtos_notas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_nstore0001001`.`produtos_notas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_nota` INT NOT NULL,
  `id_produto` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `sub_total` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_notas_1_idx` (`id_nota` ASC),
  INDEX `fk_produtos_notas_2_idx` (`id_produto` ASC),
  CONSTRAINT `fk_produtos_notas_1`
    FOREIGN KEY (`id_nota`)
    REFERENCES `db_nstore0001001`.`notas_fiscais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_notas_2`
    FOREIGN KEY (`id_produto`)
    REFERENCES `db_nstore0001001`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
