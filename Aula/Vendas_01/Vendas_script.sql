-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vendas_01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vendas_01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vendas_01` DEFAULT CHARACTER SET utf8 ;
USE `vendas_01` ;

-- -----------------------------------------------------
-- Table `vendas_01`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendas_01`.`Pedidos` (
  `Ped_id` INT NOT NULL,
  `Ped_Prod_id` INT NOT NULL,
  `Ped_Ven_id` INT NOT NULL,
  `Ped_Cli_id` INT NOT NULL,
  `Ped_ValorFrete` DOUBLE NOT NULL,
  PRIMARY KEY (`Ped_id`));


-- -----------------------------------------------------
-- Table `vendas_01`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendas_01`.`Cliente` (
  `Cli_id` INT NOT NULL AUTO_INCREMENT,
  `Cli_Nome` VARCHAR(45) NOT NULL,
  `Cli_SobreNome` VARCHAR(45) NOT NULL,
  `Cli_DatadeNascimento` DATE NOT NULL,
  `Cli_Rg` DOUBLE NOT NULL,
  `Cli_Telefone` DOUBLE NOT NULL,
  `Cli_Email` VARCHAR(45) NOT NULL,
  `Cli_Endereco` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Cli_id`),
  CONSTRAINT `fk_Cliente_Pedidos1`
    FOREIGN KEY (`Cli_id`)
    REFERENCES `vendas_01`.`Pedidos` (`Ped_Cli_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `vendas_01`.`Vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendas_01`.`Vendedores` (
  `Ven_id` INT NOT NULL,
  `Ven_Nome` VARCHAR(45) NOT NULL,
  `Ven_SobreNome` VARCHAR(45) NOT NULL,
  `Ven_DatadeNascimento` DATE NOT NULL,
  `Ven_Rg` DOUBLE NOT NULL,
  `Ven_Cpf` DOUBLE NOT NULL,
  `Ven_Telefone` DOUBLE NOT NULL,
  `Ven_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Ven_id`),
  CONSTRAINT `fk_Vendedores_Pedidos1`
    FOREIGN KEY (`Ven_id`)
    REFERENCES `vendas_01`.`Pedidos` (`Ped_Ven_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `vendas_01`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendas_01`.`Produto` (
  `Prod_id` INT NOT NULL,
  `Prod_Nome` VARCHAR(45) NOT NULL,
  `Prod_quantidadeProdutos` INT NOT NULL,
  `Prod_preco` DOUBLE NOT NULL,
  `Prod_Categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Prod_id`),
  CONSTRAINT `fk_Produto_Pedidos`
    FOREIGN KEY (`Prod_id`)
    REFERENCES `vendas_01`.`Pedidos` (`Ped_Prod_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
